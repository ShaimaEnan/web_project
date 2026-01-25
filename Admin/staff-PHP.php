<?php
include_once 'auth_check.php'; ?>
<?php
require_once "../config.php";

//الاستعلام الخاص بعرض الاطباء في صفحه الموظفين
try {
    $sql_doc = "SELECT d.*, dep.name as department_name FROM doctors d JOIN departments dep ON d.department_id = dep.id ORDER BY d.id DESC";
    $pre = $pdo->prepare($sql_doc);
    $pre->execute();
    $all_doctors = $pre->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "خطأ في عرض الاطباء" . $e->getMessage();
}
?>























