<?php
require_once '../config.php';
session_start();

// 1. مسح جميع متغيرات الجلسة
$_SESSION = array();

// 2. إذا كنت تستخدم الكوكيز للجلسة (وهذا الافتراضي)، فقم بحذفها من المتصفح
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. تدمير الجلسة نهائياً على السيرفر
session_destroy();

// 4. توجيه المستخدم لصفحة تسجيل الدخول
header("Location: login.php");
exit();
?>