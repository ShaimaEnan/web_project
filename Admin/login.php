<?php include_once 'login_PHP.php'?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-card">
        <div class="brand-section">
            <img src="../images/medicalLogo2.png" alt="الشعار" class="brand-logo">
            <h1 class="brand-title">تسجيل الدخول</h1>
        </div>

        <form action="" method="POST">
            <div class="field">
                <label>اسم المستخدم</label>
                <input type="text"  name="username" placeholder="أدخل اسم المستخدم"  autocomplete="off" required>
            </div>
            <div class="field">
                <label>كلمة المرور</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit"  name="login" class="enter-btn">دخول</button>
        </form>

        <div class="bottom-links">
            <a href="#">نسيت كلمة المرور؟</a>
        </div>
    </div>
</body>
</html>