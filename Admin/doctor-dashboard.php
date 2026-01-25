<?php
include_once 'auth_check.php'; ?>
<?php
include 'doctor-dashboard_PHP.php';
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم الطبيب - مركز الرؤية الطبي</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../stayl.css">
</head>

<body>

    <header class="header shadow-sm bg-white py-2">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
                <a href="doctor-dashboard.php" class="navbar-brand d-flex align-items-center">
                    <img src="../images/medicalLogo2.png" alt="شعار" height="60" class="me-2">
                    <span class="logo-text ms-2">لوحة تحكم الطبيب</span>
                </a>
                <a href="logout.php" class="btn btn-primary ">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <span>تسجيل الخروج</span> </a>


            </nav>
        </div>
    </header>

    <main class="container py-4">

        <div class="row g-4 mb-5" data-aos="fade-up">
            <div class="col-md-4">
                <div class="card shadow-sm border-0 border-start border-info border-4 py-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-muted small fw-bold text-uppercase mb-1">إجمالي المواعيد</div>
                                <div class="h3 mb-0 fw-bold text-dark"><?php echo $data['stats']['total_appointments']; ?></div>
                            </div>
                            <div class="bg-info bg-opacity-10 rounded-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-clock-history text-info fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 border-start border-success border-4 py-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-muted small fw-bold text-uppercase mb-1">الأطباء في النظام</div>
                                <div class="h3 mb-0 fw-bold text-dark"><?php echo $data['stats']['total_doctors']; ?></div>
                            </div>
                            <div class="bg-success bg-opacity-10 rounded-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-people text-success fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 border-start border-primary border-4 py-2">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <div class="text-muted small fw-bold text-uppercase mb-1">مواعيد الطبيب المختار</div>
                                <div class="h3 mb-0 fw-bold text-dark"><?php echo count($data['appointments']); ?></div>
                            </div>
                            <div class="bg-primary bg-opacity-10 rounded-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                <i class="bi bi-calendar-check text-primary fs-3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0 mb-5 overflow-hidden rounded-4" data-aos="fade-up">
            <div class="card-header text-white py-3 d-flex justify-content-between align-items-center" style="background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);">
                <h5 class="mb-0 fw-bold"><i class="bi bi-person-circle me-2"></i> اختر طبيب</h5>
            </div>
            <div class="card-body p-4 bg-light">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <label class="form-label fw-bold text-secondary mb-3 fs-5">اختر طبيب لعرض مواعيده</label>
                        <form method="POST" action="doctor-dashboard.php">
                            <select name="doctor_id" class="form-select form-select-lg shadow-sm border-primary" onchange="this.form.submit()" style="border-radius: 12px; cursor: pointer;">
                                <option value="">إختر طبيب</option>
                                <?php foreach ($data['all_doctors'] as $doc): ?>
                                    <option value="<?php echo $doc['id']; ?>" <?php echo ($select_doctor_id == $doc['id']) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($doc['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php if (!empty($select_doctor_id)): ?>
            <div class="card shadow-sm border-0 mb-5 rounded-4 overflow-hidden" data-aos="fade-up">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3"
                    style="background: linear-gradient(45deg, #4db8ac, #2c5f6f);">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-calendar3 me-2"></i> المواعيد</h5>
                    <span class="badge bg-white text-dark rounded-pill px-3 py-2 fw-bold">
                        <?php echo count($data['appointments']); ?> موعد مجدول
                    </span>
                </div>

                <div class="card-body p-0">
                    <?php if (empty($data['appointments'])): ?>
                        <div class="text-center p-5">
                            <div class="mb-3">
                                <i class="bi bi-calendar-x text-muted" style="font-size: 3.5rem;"></i>
                            </div>
                            <h5 class="text-secondary fw-bold">لا توجد مواعيد مجدولة حالياً</h5>
                            <p class="text-muted">هذا الطبيب ليس لديه أي مواعيد مسجلة في قاعدة البيانات.</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($data['appointments'] as $appointment): ?>
                            <div class="appointment-item bg-white m-4 p-4 rounded-4 shadow-sm border-start border-4 
                        <?php
                            if ($appointment['status'] == 'confirmed') echo 'border-info';
                            elseif ($appointment['status'] == 'completed') echo 'border-success';
                            else echo 'border-warning';
                        ?>">

                                <div class="row align-items-center g-3">
                                    <div class="col-md-3 text-center">
                                        <div class="text-primary small fw-bold">اسم المريض</div>
                                        <div class="fs-5 fw-bold text-secondary"><?php echo htmlspecialchars($appointment['patient_name']); ?></div>
                                        <div class="mt-2">
                                            <span class="badge rounded-pill bg-light text-dark border">
                                                الحالة: <?php
                                                        $st_map = ['confirmed' => 'جاري المعاينة', 'completed' => 'تمت المعاينة', 'cancelled' => 'ملغي'];
                                                        echo $st_map[$appointment['status']] ?? 'انتظار';
                                                        ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-3 text-center border-start border-end">
                                        <div class="text-success small fw-bold">رقم الهاتف</div>
                                        <div class="fw-bold" dir="ltr"><?php echo htmlspecialchars($appointment['phone_number']); ?></div>
                                    </div>

                                    <div class="col-md-3 text-center border-end">
                                        <div class="text-secondary small fw-bold mb-2">تحديث حالة المريض</div>
                                        <form method="POST" action="doctor-dashboard.php">
                                            <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
                                            <input type="hidden" name="doctor_id" value="<?php echo $select_doctor_id; ?>">
                                            <input type="hidden" name="update_status" value="1">

                                            <div class="btn-group btn-group-sm">
                                                <button type="submit" name="status" value="confirmed"
                                                    class="btn btn-outline-info <?php echo ($appointment['status'] == 'confirmed') ? 'active' : ''; ?>">
                                                    معاينة
                                                </button>
                                                <button type="submit" name="status" value="completed"
                                                    class="btn btn-outline-success <?php echo ($appointment['status'] == 'completed') ? 'active' : ''; ?>">
                                                    تمت
                                                </button>
                                                <button type="submit" name="status" value="cancelled"
                                                    class="btn btn-outline-danger" onclick="return confirm('هل تريد حذف هذا الموعد نهائياً؟')">
                                                    إلغاء
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-md-3 text-center">
                                        <div class="text-muted small fw-bold">وقت الموعد</div>
                                        <div class="fw-bold text-dark">
                                            <?php echo formatDateTime($appointment['appointment_date'], $appointment['appointment_time'], $appointment['period']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>