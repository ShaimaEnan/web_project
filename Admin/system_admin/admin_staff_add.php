<?php include 'header_admin.php';
include_once 'admin_staff_add_PHP.php'; ?>

<?php
$alert = isset($massag) ? "
    <div class='alert alert-$massag_type alert-dismissible fade show' role='alert' style='text-align: right;'>
        <strong>$massag</strong>
        <button type='button' class='btn-close' style='position: absolute; left: 10px; right: auto; top: 15px;' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>"
    : "";

echo $alert;
?>
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header text-white py-3">
                    <h5 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i> إضافة بيانات موظف جديد</h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">اسم الموظف</label>
                                <input type="text" name="full_name" class="form-control" placeholder="أدخل الاسم الكامل" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">الدور</label>
                                <select name="role" class="form-select" required>
                                    <option value="">اختر رتبة الموظف...</option>
                                    <option value="admin">Admin</option>
                                    <option value="staff">Staff</option>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">اسم المستخدم</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">كلمة المرور</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="col-12 mt-4 d-flex gap-2">
                                <button type="submit" class="btn btn-primary px-5 fw-bold" name="save">حفظ البيانات</button>
                                <a href="admin_staff_show.php" class="btn btn-light border px-4">رجوع للوحة التحكم</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="script.js"></script>

</body>

</html>