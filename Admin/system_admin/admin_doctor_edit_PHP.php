<?php
include_once 'auth_check.php'; ?>
<?php
require_once "../../config.php";
//الخاصه باستعلام جلب قسم الطبيب المختار للتعديل
// 1. جلب بيانات الطبيب المختار (بما في ذلك id القسم الذي ينتمي إليه حالياً)
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM doctors WHERE id = ?");
$stmt->execute([$id]);
$doctor = $stmt->fetch();

// 2. جلب قائمة كل الأقسام لعرضها في القائمة المنسدلة
$stmt_dept = $pdo->query("SELECT id, name FROM departments");
$all_departments = $stmt_dept->fetchAll();



try {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql_edit = "SELECT * FROM doctors WHERE id=:id";
        $sql_edit_pre = $pdo->prepare($sql_edit);
        $data = [':id' => $id];
        $sql_edit_pre->execute($data);
        $row = $sql_edit_pre->fetch(PDO::FETCH_ASSOC);



        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['save'])) {
                $name = trim($_POST['name']);
                $specialization = trim($_POST['specialization']);
                $department_id = intval($_POST['department_id']);
                $experience = trim($_POST['experience']);
                $price = trim($_POST['price']);
                $rating = trim($_POST['rating']);

                $doctor_image = $_POST['h_doctor_image'];
                if ($_FILES['doctor_image']['name'] != "") {
                    $path_from = $_FILES['doctor_image']['tmp_name'];
                    $path_to = "../../uploads/" . $_FILES['doctor_image']['name'];
                    $doctor_image = $_FILES['doctor_image']['name'];
                    move_uploaded_file($path_from, $path_to);
                }
                $sql_update = "UPDATE  doctors set name=:name,specialization=:specialization,
                department_id=:department_id,experience=:experience,rating=:rating,price=:price,
                image_url=:doctor_image WHERE id=:id";
                $sql_uopdate_pre=$pdo->prepare($sql_update);
               $data2=[':name'=>$name,':specialization'=>$specialization,':department_id'=>$department_id,':experience'=>$experience,
               ':rating'=>$rating,':price'=>$price,':doctor_image'=>$doctor_image ,':id'=>$id];
               $sql_uopdate_pre->execute($data2);
               
                  header("Location: admin_doctor_show.php?success=updated");
            exit();


            }
        }
    }
} catch (PDOException $e) {
    error_log("خطأ في التعديل") . $e->getMessage();
}
