<?php
include_once '../auth_check.php'; ?>

<?php
require_once '../../config.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // نحظر الصور من اجل حذفها من الملف ليقل الضغط على المشروع
    $select = "SELECT image_url FROM doctors WHERE id = :id";
    $stmt = $pdo->prepare($select);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($doctor) {
        $old_image = $doctor['image_url'];

        try {
            
            $del_quer = "DELETE FROM doctors WHERE id = ?";
            $delet = $pdo->prepare($del_quer);
            $delet->execute([$id]);

            if ($old_image && file_exists("uploads/$old_image")) {
                unlink("../../uploads/$old_image");
            }
//هذا خاص حتى بعد الانتهاء من عمليه الحذف ينتقل الى الصفحه الذي تحتوي على العرض ولا يعرض صفحه فارغه
            header("Location: admin_doctor_show.php?success=deleted");
            exit();

        } catch (PDOException $e) {
            die("خطأ في الحذف: " . $e->getMessage());
        }
    } else {
        die("الطبيب غير موجود.");
    }
}
?>

