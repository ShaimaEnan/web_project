<?php
include_once 'auth_check.php'; ?>

<?php
require_once "../../config.php";
//الاستعلام الخاص بالقائم المنسدله للاقسام

try {
    $sql_dept = "SELECT * FROM departments ORDER BY name";
    $stmt = $pdo->prepare($sql_dept);
    $stmt->execute();
    $all_dept = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "خطأ في جلب الأقسام: " . $e->getMessage();
}
//الكود الخاص بعملية ادخال الاطباء الى النظام

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo->beginTransaction();
        if (isset($_POST['save'])) {
            $name = trim($_POST['name']);
            $specialization = trim($_POST['specialization']);
            $department_id = intval($_POST['department_id']);
            $experience = trim($_POST['experience']);
            $price = trim($_POST['price']);
            $rating = trim($_POST['rating']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $doctor_image = $_FILES['doctor_image']['name'];
            $path_from = $_FILES['doctor_image']['tmp_name'];
            $path_to = "../../uploads/" . $doctor_image;
            if (move_uploaded_file($path_from, $path_to)) {
                $sql = "INSERT INTO doctors (name,specialization,department_id,experience,rating,price,image_url,username,password)
                 values (:name,:specialization,:department_id,:experience,:rating,:price,:doctor_image,:username,:password)";
                $sql_prepare = $pdo->prepare($sql);
                $data = [
                    ':name' => $name,
                    ':specialization' => $specialization,
                    ':department_id' => $department_id,
                    ':experience' => $experience,
                    ':rating' => $rating,
                    ':price' => $price,

                    ':doctor_image' => $doctor_image,
                    ':username' => $username,
                    ':password' => $hashed_password



                ];
                $sql_executed = $sql_prepare->execute($data);
            }
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
