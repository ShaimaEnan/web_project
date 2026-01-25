
<?php
session_start();

// إذا لم يكن هناك جلسة مسجلة (المستخدم لم يسجل دخوله)
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); // وجهه لصفحة الدخول
    exit();
}
?>