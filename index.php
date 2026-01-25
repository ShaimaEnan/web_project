<?php include 'header.php' ?>

    <section class="hero py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-up">
                    <h1 class="display-3 fw-bold text-dark mb-4">رعاية صحية أفضل لك</h1>
                    <p class="lead text-muted mb-4">فريق الرعاية الصحية المخصص لدينا سيكون دائماً أولويتنا، لذا نتبع أفضل الممارسات للنظافة ورعاية المرضى.</p>
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="departments.php" class="btn btn-primary btn-lg shadow-hover">عرض خدماتنا </a>


                     <a href="javascript:void(0);" onclick="sendEmergencyWithLocation()" class="btn btn-outline-primary btn-lg shadow-hover">
    <i class="bi bi-whatsapp me-2"></i>
   طوارئ  واتساب
</a>


                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="hero-image-wrapper position-relative">
                        <img src="images/Gdoctor.jpeg" alt="أطباء محترفون" class="img-fluid float-animation">
                </div>
            </div>
        </div>
    </section>
<section class="about-standalone-page vh-100 d-flex flex-column justify-content-center" id='about_us'>
    <div class="container " >
        <div class="about-card-modern text-center" data-aos="fade-up" data-aos-duration="1200" >
            <h3 class="section-title-ultra text-white" >من نحن</h3>
            <div class="divider-line mx-auto" style="width: 50px; height: 3px; background: rgba(255,255,255,0.3); margin-bottom: 25px;"></div>
            <p class="main-description-ultra text-white">
                في <span class="fw-bold">مركز الرؤية الطبي</span>، أنت لست مجرد مراجع، بل أنت محور اهتمامنا. فريقنا من أمهر الأطباء والاستشاريين مكرس بالكامل لرعايتك، نؤمن بأن الابتسامة والراحة النفسية هي الخطوة الأولى نحو الشفاء، لذا صممنا نظامنا ليرافقك بذكاء في كل خطوة.
            </p>
        </div>

        <div class="contact-bar-elegant" data-aos="fade-up" data-aos-delay="500">
            <div class="row align-items-center justify-content-center g-4">
                <div class="col-lg-3">
                    <div class="contact-box">
                        <i class="bi bi-telephone-outbound"></i>
                        <div>
                            <small class="d-block">اتصل بنا</small>
                            <span dir="ltr">+967 777 000 000</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="contact-box border-center px-lg-4">
                        <i class="bi bi-geo-alt"></i>
                        <div>
                            <small class="d-block">موقعنا</small>
                            <span>صنعاء - المدينة السكنية</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="contact-box">
                        <i class="bi bi-envelope-at"></i>
                        <div>
                            <small class="d-block">البريد الإلكتروني</small>
                            <span>info@vision-medical.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php' ?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>

</html>