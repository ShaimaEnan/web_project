<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
require_once 'config.php';

if (!isset($_SESSION['booking_data'])) {
    header("Location: booking.php");
    exit();
}

$data = $_SESSION['booking_data'];
$doctor_id = $data['doctor_id'];

try {
    // 1. جلب آخر موعد محجوز لهذا الطبيب في تاريخ اليوم أو المستقبل
    $stmtCheck = $pdo->prepare("SELECT appointment_date, appointment_time FROM appointments 
                                WHERE doctor_id = ? AND appointment_date >= CURDATE() 
                                ORDER BY appointment_date DESC, appointment_time DESC LIMIT 1");
    $stmtCheck->execute([$doctor_id]);
    $last_appt = $stmtCheck->fetch();

    if ($last_appt) {
        // إذا وجد موعد سابق، أضف 30 دقيقة عليه
        $last_time = strtotime($last_appt['appointment_date'] . ' ' . $last_appt['appointment_time']);
        $new_time_stamp = strtotime('+30 minutes', $last_time);
    
        $appt_date = date('Y-m-d', $new_time_stamp);
        $appt_time = date('H:i:s', $new_time_stamp);
} else {
        // إذا لم يوجد حجز سابق، ابدأ من غداً الساعة 8 صباحاً
    $appt_date = date('Y-m-d', strtotime('+1 day'));
        $appt_time = "08:00:00";
}

    // 2. إدخال البيانات الجديدة بالوقت المتغير
    $sql = "INSERT INTO appointments (
                doctor_id, patient_name, patient_age, phone_number, 
                appointment_date, appointment_time, period,
                status, payment_status, created_at
            ) VALUES (
                :doc_id, :name, :age, :phone, 
                :a_date, :a_time, :period,
                'confirmed', 'paid', NOW()
            )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':doc_id' => $doctor_id,
        ':name'   => $data['patient_name'],
        ':age'    => $data['patient_age'],
        ':phone'  => $data['phone_number'],
        ':a_date' => $appt_date,
        ':a_time' => $appt_time,
        ':period' => (date('H', strtotime($appt_time)) < 12) ? 'AM' : 'PM'
    ]);

    $last_id = $pdo->lastInsertId();
    unset($_SESSION['booking_data']);

    header("Location: booking_confirm.php?id=" . $last_id);
    exit();

} catch (Exception $e) {
    die("خطأ في توزيع المواعيد: " . $e->getMessage());
}
?>