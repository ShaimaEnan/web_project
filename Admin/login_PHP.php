<?php
session_start();
include '../config.php'; 

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try {
        // 1. محاولة البحث في جدول الموظفين (staff_users)
        $stmt = $pdo->prepare("SELECT * FROM staff_users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // إذا وجدنا المستخدم في جدول الموظفين وصحت كلمة المرور
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id']   = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            $_SESSION['role']      = $user['role']; // هنا نأخذ الرول (admin أو staff)

            // التوجيه بناءً على الرتبة داخل جدول الموظفين
            if ($user['role'] =='admin') {
                header("Location: system_admin/admin_doctor_show.php");
            } else {
                header("Location: staff-dashboard.php");
            }
            exit();
        }

        // 2. إذا لم نجد المستخدم في الجدول الأول، نبحث في جدول الأطباء (doctors)
        $stmt_doc = $pdo->prepare("SELECT * FROM doctors WHERE username = :username");
        $stmt_doc->execute(['username' => $username]);
        $doctor = $stmt_doc->fetch();

        if ($doctor && password_verify($password, $doctor['password'])) {
            $_SESSION['user_id']   = $doctor['id'];
            $_SESSION['user_name'] = $doctor['username'];
            $_SESSION['role']      = 'doctor'; // رتبة ثابتة لأنهم في جدول الأطباء
            
            header("Location: doctor-dashboard.php");
            exit();
        }

        // 3. إذا لم يتطابق في كلا الجدولين
        echo "<script>alert('اسم المستخدم أو كلمة المرور غير صحيحة'); window.location='login.php';</script>";

    } catch (PDOException $e) {
        die("خطأ في قاعدة البيانات: " . $e->getMessage());
    }
}
?>