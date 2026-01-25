<?php include_once 'auth_check.php'; ?>

<?php
require_once "../config.php";

//الكود الخاص بعرض مواعيد كل طبيب على حسيب مواعيدة  

try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql_appointments = "SELECT a.id, a.patient_name, a.phone_number, 
                                   a.appointment_date, a.appointment_time, a.period,
                                   d.name AS doctor_name
                            FROM appointments a
                            JOIN doctors d ON a.doctor_id = d.id
                            WHERE d.id = :id";

        $pre = $pdo->prepare($sql_appointments);
        $pre->bindParam(':id', $id);
        $pre->execute();
        $all_appointments = $pre->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "خطأ في جلب المواعيد: " . $e->getMessage();
}?>