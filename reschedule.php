<?php
require_once 'config.php';
include 'reschedule_PHP.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// جلب الموعد الحالي للتأكد
$stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = ?");
$stmt->execute([$id]);
$appt = $stmt->fetch();

if (!$appt) die("الموعد غير موجود.");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل موعدك</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="reschedule.css">
</head>
<body>

<div class="reschedule-container">
    <div class="head-title">
        <i class="fa-solid fa-clock-rotate-left"></i>
        <h2>تعديل وقت الزيارة</h2>
    </div>

    <form action="reschedule_PHP.php" method="POST">
        <input type="hidden" name="appointment_id" value="<?php echo $appt['id']; ?>">
        
        <div class="input-box">
            <label><i class="fa-solid fa-calendar-day"></i> التاريخ الجديد</label>
            <input type="date" name="new_date" class="custom-input" value="<?php echo $appt['appointment_date']; ?>" required>
        </div>

        <div class="input-box">
            <label><i class="fa-solid fa-sun"></i> الفترة</label>
            <select name="new_period" class="custom-input">
                <option value="AM" <?php echo ($appt['period'] == 'AM') ? 'selected' : ''; ?>>الصباحية</option>
                <option value="PM" <?php echo ($appt['period'] == 'PM') ? 'selected' : ''; ?>>المسائية</option>
            </select>
        </div>

        <div class="input-box">
            <label><i class="fa-solid fa-stopwatch"></i> الساعة</label>
            <input type="time" name="new_time" class="custom-input" value="<?php echo $appt['appointment_time']; ?>" required>
        </div>

        <button type="submit" class="btn-update">تحديث الموعد الآن</button>
        <a href="booking_confirm.php?id=<?php echo $appt['id']; ?>" class="btn-cancel">تراجع عن التغيير</a>
    </form>
</div>

</body>
</html>