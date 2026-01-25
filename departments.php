<?php
include 'departments_logic.php';
include 'header.php';
?>

<section class="py-5 departments-section">
    <div class="container text-center">
        <h2 class="fw-bold mb-2 section-main-title">أقسامنا الطبية</h2>
        <div class="mx-auto mb-5 header-line"></div>
        <div class=" row g-4 text-end">
            <?php foreach ($all_departments as $dept) :  ?>
                <div class="col-lg-3 col-md-6">
                    <div class="dept-card">
                        <div class="dept-icon-wrapper">
                            <i class="bi bi-<?= htmlspecialchars($dept['icon']); ?>"></i>
                        </div>
                        <h4 class="dept-title"><?= htmlspecialchars($dept['name']); ?></h4>
                        <p class="dept-description"> <?= htmlspecialchars($dept['description']); ?></p>

                        <a href="doctors.php?dept_id=<?= $dept['id']; ?>" class="btn-dept-link">
                            <span>عرض الأطباء</span>
                            <i class="bi bi-arrow-left ms-2"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
</section>
<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="script.js"></script>