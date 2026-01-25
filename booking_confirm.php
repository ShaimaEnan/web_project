<?php

require_once 'config.php';

$appointment_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$appointment = null;

if ($appointment_id > 0) {
    $query = "SELECT a.*, d.name as doctor_name 
              FROM appointments a 
              JOIN doctors d ON a.doctor_id = d.id 
              WHERE a.id = :id";

    $stmt = $pdo->prepare($query);
    $stmt->execute([':id' => $appointment_id]);
    $appointment = $stmt->fetch();
}


if (!$appointment) {
    die("<div style='text-align:center; margin-top:50px;'>عذراً، لم يتم العثور على معلومات هذا الحجز. تأكد من إتمام عملية الدفع.</div>");
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد الحجز - مركز الرؤية الطبي</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="booking_con.css">

</head>

<body>

    <div class="info-wrapper">
        <div class="info-content">

            <i class="fa-solid fa-circle-check success-icon"></i>

            <header>
                <h1 class="page-title">تم تأكيد حجزك بنجاح</h1>
                <span class="sub-title">مركز الرؤية الطبي | VISION MEDICAL CENTER</span>
                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'updated'): ?>
                    <div class="alert-success-custom">
                        <i class="fa-solid fa-check-double"></i>
                        <span>تم تحديث موعدك بنجاح!</span>

                    </div>
                <?php endif; ?>
            </header>

            <div class="details-list">
                <div class="detail-row">
                    <span class="detail-label"><i class="fa-solid fa-hashtag"></i> رقم الحجز</span>
                    <span class="detail-value"><?php echo $appointment['id']; ?></span>
                </div>

                <div class="detail-row">
                    <span class="detail-label"><i class="fa-solid fa-user-doctor"></i> الطبيب المختص</span>
                    <span class="detail-value"><?php echo htmlspecialchars($appointment['doctor_name']); ?></span>
                </div>

                <div class="detail-row">
                    <span class="detail-label"><i class="fa-solid fa-user"></i> اسم المريض</span>
                    <span class="detail-value"><?php echo htmlspecialchars($appointment['patient_name']); ?></span>
                </div>

                <div class="detail-row">
                    <span class="detail-label"><i class="fa-solid fa-calendar-day"></i> تاريخ الموعد</span>
                    <span class="detail-value"><?php echo $appointment['appointment_date']; ?></span>
                </div>

                <div class="detail-row">
                    <span class="detail-label"><i class="fa-solid fa-clock"></i> الوقت</span>
                    <span class="detail-value"><?php echo date("h:i A", strtotime($appointment['appointment_time'])); ?></span>
                </div>

                <div class="detail-row">
                    <span class="detail-label"><i class="fa-solid fa-receipt"></i> حالة الدفع</span>
                    <span class="detail-value" style="color: var(--primary-color);">تم سداد العربون</span>
                </div>
            </div>
            <div class="sms-status-box">
                <div class="sms-icon">
                    <i class="fa-solid fa-paper-plane"></i>
                </div>
                <div class="sms-text">
                    <p>سيتم إرسال رسالة <strong>SMS</strong> لتأكيد تفاصيل موعدك على رقم الهاتف المسجل لدينا.</p>
                </div>
            </div>

            <div class="compact-actions">
                <button onclick="window.print()" class="btn-mini btn-primary-mini">
                    <i class="fa-solid fa-print"></i>
                    <span>حفظ وتصدير</span>
                </button>

                <div class="secondary-btns">
                    <a href="reschedule.php?id=<?php echo $appointment['id']; ?>" class="btn-mini btn-warning-mini">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span>تعديل الموعد</span>
                    </a>

                    <a href="index.php" class="btn-mini btn-dark-mini">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span>خروج</span>
                    </a>
                </div>
            </div>


            <p class="mt-4 text-muted small">يرجى الحضور قبل الموعد بـ 15 دقيقة.</p>

        </div>
    </div>

</body>

</html>