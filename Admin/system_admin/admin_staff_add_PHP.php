<?php
include_once 'auth_check.php'; ?>

<?php
require_once "../../config.php";

//الكود الخاص بعملية ادخال الموظفين الى النظام

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo->beginTransaction();
        if (isset($_POST['save'])) {
            $full_name = trim($_POST['full_name']);
            $role = trim($_POST['role']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

          
                $sql = "INSERT INTO staff_users (username,password,full_name,role)
                 values (:username,:password,:full_name,:role)";
                $sql_prepare = $pdo->prepare($sql);
                $data = [
                    ':username' => $username,
                    ':password' => $hashed_password,
                    ':full_name' => $full_name,
                    ':role' => $role,
                ];
                $sql_executed = $sql_prepare->execute($data);
            
        }
        $massag = "تم حفظ البيانات بنجاح";
        $massag_type = "success";
        $pdo->commit();
    } catch (PDOException $e) {
        $pdo->rollback();
        $massag = "فشل في حفظ البيانات" . $e->getMessage();
        $massag_type = "danger";
    }
}
