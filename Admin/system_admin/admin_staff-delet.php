<?php
include_once 'auth_check.php'; ?>

<?php
require_once '../../config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);


        try {
            
            $del_quer = "DELETE FROM staff_users WHERE id = ?";
            $delet = $pdo->prepare($del_quer);
            $delet->execute([$id]);

        
//هذا خاص حتى بعد الانتهاء من عمليه الحذف ينتقل الى الصفحه الذي تحتوي على العرض ولا يعرض صفحه فارغه
            header("Location: admin_staff_show.php?success=deleted");
            exit();

        } catch (PDOException $e) {
            die("خطأ في الحذف: " . $e->getMessage());
        }}
  
    

?>

