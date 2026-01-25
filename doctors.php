<?php 
include 'doctors_logic.php';
include 'header.php'; 
?>

<section class="py-5 doctors-section" style="min-height: 100vh;">
   <div class="d-flex justify-content-end"> 
    <a href="departments.php" class="btn btn-primary rounded-pill px-4 m-4">
        <i class="bi bi-arrow-left ms-2"></i> الاقسام
    </a>
</div>
    <div class="container text-center">
        <h2 class="display-5 fw-bold text-dark">نخبة الكوادر الطبية</h2>
      
        <div class="mx-auto mb-5 header-line"></div>

        <div class="row g-4 text-end">
           <?php if(!empty($doctors)):?>
            <?php foreach($doctors as $doc):?>
                    <div class="col-lg-4 col-md-6">
                        <div class="doctor-modern-card">
                            
                            <div class="doc-img-wrapper">
                               <?php if(!empty($doc['image_url'])):?>
                                <img src="uploads/<?= $doc['image_url']  ; ?>"  alt="لا توجد صورة">
                                
                                <?php else: ?>
                                    <div class="no-image-placeholder">لا توجد صورة</div>
                                <?php endif; ?>
                                
                                <div class="rating-badge">
                                    <i class="bi bi-star-fill"></i> <?= htmlspecialchars($doc['rating']); ?>
                                </div>
                            </div>
                            
                            <div class="p-4">
                                <span class="spec-label"><?= htmlspecialchars($doc['specialization']); ?></span>
                                <h4 class="doc-name"> <?= htmlspecialchars($doc['name']); ?></h4>
                                
                                <div class="mb-4 text-muted small">
                                    <div><i class="bi bi-award me-1"></i> خبرة <?= htmlspecialchars($doc['experience']); ?> سنوات</div>
                                    <div><i class="bi bi-chat-left-dots me-1"></i> <?= htmlspecialchars($doc['price']); ?> سعر المعاينة</div>
                                </div>

                                <a href="booking.php?doctor_id=<?= $doc['id']; ?>" class="btn-book-now-fixed">حجز موعد الآن</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 py-5">
                    <div class="alert alert-light shadow-sm py-4 border-radius-15">
                        <p class="text-muted mb-0">لا يوجد أطباء متاحون في هذا القسم حالياً</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="script.js"></script>

