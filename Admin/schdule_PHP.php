<?php include_once 'auth_check.php'; ?>

<?php
require_once "../config.php";

// الكود الخاص بعرض الاطباء ذات المواعيد
try {
    // الاستعلام مع ربط الجداول
    $sql_doc_appointments = "SELECT DISTINCT 
                d.id, 
                d.name AS doctor_name, 
                d.specialization, 
                dep.name AS department_name
            FROM doctors d
             JOIN departments dep ON d.department_id = dep.id
             JOIN appointments a ON d.id = a.doctor_id
            ORDER BY d.name ASC";

    $stmt = $pdo->prepare($sql_doc_appointments);
    $stmt->execute();


    $doctors_with_appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "خطأ في جلب الاطباء ذات المواعيد: " . $e->getMessage();
}?>