
<?php
require_once '../config.php';
// تهيئة المتغيرات الافتراضية
$select_doctor_id = "";
//عملنا مصفوفة بداخلها عدة مصفوفات للمتغيرات بدل من تعريف كل متغير على حدة لسهولة تمرير البيانات في الصفحة
$data = [
    'stats' => [
        'total_doctors' => 0,
        'total_appointments' => 0,
    ],
    'all_doctors' => [],
    'appointments' => [],
];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $appountment_id = (int)$_POST['appointment_id'];
    $status = $_POST['status'];
    $select_doctor_id = $_POST['doctor_id'];
    try {
        if ($status === 'cancelled') {
            $sql = $pdo->prepare("DELETE FROM appointments WHERE id=?");
            $sql->execute([$appountment_id]);
        } else {
            $sql = $pdo->prepare("UPDATE appointments SET status=? WHERE id=?");
            $sql->execute([$status, $appountment_id]);
        }
    } catch (PDOException $e) {
        // نستخدم error_log لتسجيل الأخطاء بدلاً من عرضها للمستخدم ويخزن السيرفر الأخطاء في ملف .logلتخزين الاخطأ  خاص
        error_log("Database error: " . $e->getMessage());
    }
} elseif (isset($_POST['doctor_id'])) {
    $select_doctor_id = $_POST['doctor_id'];
}

try {
    $data['stats']['total_appointments'] = $pdo->query("SELECT COUNT(*) FROM appointments")->fetchColumn();
    $sql_doctors = $pdo->query("SELECT * FROM doctors");
    $data['all_doctors'] = $sql_doctors->fetchAll(PDO::FETCH_ASSOC);
    $data['stats']['total_doctors'] = count($data['all_doctors']);

    if (!empty($select_doctor_id)) {
        $sql_appointments = $pdo->prepare("SELECT * FROM appointments WHERE doctor_id=? ORDER BY appointment_date ASC");
        $sql_appointments->execute([$select_doctor_id]);
        $data['appointments'] = $sql_appointments->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    error_log("problem with getting appointments: " . $e->getMessage());
}

// دالة لتنسيق التاريخ والوقت للعرض
if (!function_exists('formatDateTime')) {
    function formatDateTime($date, $time, $period)
    {
        return date('Y/m/d', strtotime($date)) . "|" . date('h:i ', strtotime($time)) . " " . $period;
    }
}
?>