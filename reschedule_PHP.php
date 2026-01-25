<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // تم استخدام اسم المتغير $id هنا
    $id = (int)$_POST['appointment_id'];
    $new_date = $_POST['new_date'];
    $new_time = $_POST['new_time'];
    $new_period = $_POST['new_period'];

    // 1. التحقق من التعارض
    $stmtCheck = $pdo->prepare("SELECT id FROM appointments WHERE appointment_date = ? AND appointment_time = ? AND id != ?");
    $stmtCheck->execute([$new_date, $new_time, $id]);

    if ($stmtCheck->fetch()) {
        die("<script>alert('عذراً، هذا الموعد محجوز مسبقاً. اختر وقتاً آخر.'); window.history.back();</script>");
    }

    
    $sql = "UPDATE appointments SET 
            appointment_date = :a_date, 
            appointment_time = :a_time, 
            period = :period 
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':a_date' => $new_date,
        ':a_time' => $new_time,
        ':period' => $new_period,
        ':id'     => $id
    ]);

    if ($result) {
        // التصحيح: استخدمنا $id بدلاً من $appointment_id
        header("Location: booking_confirm.php?id=" . $id . "&msg=updated");
        exit();
    } else {
        echo "حدث خطأ أثناء التحديث.";
    }
}