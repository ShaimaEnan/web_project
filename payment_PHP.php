<?php
// 1. بدء الجلسة لاستعادة البيانات المخزنة
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';

// 2. التحقق من وجود بيانات حجز في الجلسة
if (!isset($_SESSION['booking_data'])) {
    // إذا لم تكن هناك بيانات، فهذا يعني أن المستخدم دخل الصفحة مباشرة
    // لذا نعيده لصفحة الحجز
    header("Location: booking.php");
    exit();
}

// 3. استخراج البيانات من الجلسة
// داخل payment.php أو payment_PHP.php
$doctor_id = $_SESSION['booking_data']['doctor_id'];

$stmt = $pdo->prepare("SELECT * FROM doctors WHERE id = ?");
$stmt->execute([$doctor_id]);
$doctor = $stmt->fetch();

if (!$doctor) {
    // هذا السطر سيساعدك في معرفة أي ID يبحث عنه الكود حالياً
    die("خطأ: الطبيب ذو الرقم (#" . $doctor_id . ") غير موجود في جدول الأطباء.");
}

// التحقق من وجود الطبيب وحساب نصف المبلغ
$half_price = 0;
if ($doctor) {
    $half_price = $doctor['price'] / 2;
} else {
    // إذا لم يوجد الدكتور في قاعدة البيانات
    die("خطأ: الطبيب المختار غير موجود.");
}
?>