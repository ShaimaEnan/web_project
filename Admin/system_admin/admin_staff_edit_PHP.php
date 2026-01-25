<?php
include_once 'auth_check.php'; ?>

<?php
require_once "../../config.php";

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_edit = "SELECT * FROM staff_users WHERE id=:id";
        $sql_edit_pre = $pdo->prepare($sql_edit);
        $data = [':id' => $id];
        $sql_edit_pre->execute($data);
        $row = $sql_edit_pre->fetch(PDO::FETCH_ASSOC);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['save'])) {
                $full_name = trim($_POST['full_name']);
                $role      = trim($_POST['role']);
                $username  = trim($_POST['username']);
                $password  = trim($_POST['password']);

                // --- الشرط الجديد لمعالجة كلمة المرور ---
                if (empty($password)) {
                    // إذا كان الحقل فارغاً، نأخذ كلمة المرور القديمة من قاعدة البيانات
                    $hashed_password = $row['password'];
                } else {
                    // إذا كتب كلمة مرور جديدة، نقوم بتشفيرها
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                }
                // ---------------------------------------

                $sql_update = "UPDATE staff_users SET username=:username, password=:password, 
                               full_name=:full_name, role=:role WHERE id=:id";
                
                $sql_uopdate_pre = $pdo->prepare($sql_update);
                $data2 = [
                    ':username'  => $username,
                    ':password'  => $hashed_password,
                    ':full_name' => $full_name,
                    ':role'      => $role,
                    ':id'        => $id
                ];
                
                $sql_uopdate_pre->execute($data2);

                header("Location: admin_staff_show.php?success=updated");
                exit();
            }
        }
    }
} catch (PDOException $e) {
    // تصحيح بسيط: error_log لا تقبل دمج النص بـ الـ dot خارج القوس بشكل فعال هنا
    error_log("خطأ في التعديل: " . $e->getMessage());
}
?>