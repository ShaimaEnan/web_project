<?php include 'header_admin.php';
include_once 'admin_doctor_edit_PHP.php'; ?>
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow border-0">
                <div class="card-header   text-white py-3">
                    <h5 class="mb-0"><i class="bi bi-person-fill me-2"></i> تعديل بيانات الطبيب </h5>
                </div>
                <div class="card-body p-4">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="add">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">اسم الطبيب</label>
                                <input type="text" name="name" class="form-control" placeholder="أدخل الاسم الكامل" value="<?php echo $row['name'] ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">التخصص</label>
                                <input type="text" name="specialization" class="form-control" placeholder=" استشاري عيون" value="<?php echo $row['specialization'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">القسم</label>
                                <select name="department_id" class="form-select fas fa-angle-down" required>
                                    <option value="">اختر القسم...</option>
                                    <?php foreach ($all_departments as $dept): ?>
                                        <option value="<?php echo $dept['id']; ?>"
                                            <?php
                                            // إذا كان id القسم في الحلقة يساوي رقم قسم الطبيب المخزن في قاعدة البيانات
                                            if ($dept['id'] == $doctor['department_id']) {
                                                echo 'selected';
                                            }
                                            ?>>
                                            <?php echo htmlspecialchars($dept['name']); ?>
                                        </option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"> تقييم الطبيب</label>
                                <input type="text" name="rating" class="form-control" placeholder="4.0" value="<?php echo $row['rating'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">سعر المعاينة </label>
                                <input type="text" name="price" class="form-control" placeholder=" 3000 ريال" value="<?php echo $row['price'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">سنوات الخبرة</label>
                                <input type="text" name="experience" class="form-control" placeholder=" 10 سنوات" value="<?php echo $row['experience'] ?>" required>
                            </div>



                            <div class="col-12 d-flex align-items-center mb-3">
                                <div class="mb-3 flex-grow-1 me-3">
                                    <label class="form-label fw-bold">صورة الطبيب الشخصية</label>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="flex-grow-1">
                                            <input type="file" name="doctor_image" id="doctor_image" class="form-control" accept="image/*">
                                            <input type="hidden" value="<?php echo $row['image_url'] ?>" name="h_doctor_image">
                                            <p id="errorMessage" style="color: red;"></p>

                                        </div>

                                        <div class="flex-shrink-0">
                                            <img class="img-fluid rounded-circle border shadow-sm"
                                                src="../../uploads/<?php echo $row['image_url'] ?>"
                                                style="width: 100px; height: 100px; object-fit: cover;"
                                                alt="صورة الطبيب" />
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 d-flex gap-2">
                                        <button type="submit" class="btn btn-primary px-5 fw-bold" name="save">حفظ البيانات</button>
                                        <a href="admin_doctor_show.php" class="btn btn-light border px-4">رجوع للوحة التحكم</a>
                                    </div>
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