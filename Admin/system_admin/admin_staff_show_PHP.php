<?php
include 'auth_check.php'; ?>
<?php
require_once "../../config.php";

//الاستعلام الخاص بعرض الاطباء في صفحه الموظفين
try {
    $sql_staff = "SELECT * FROM  staff_users ";
    $pre = $pdo->prepare($sql_staff);
    $pre->execute();
    $all_staff = $pre->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "خطأ في عرض الموظفين" . $e->getMessage();
}
?>























