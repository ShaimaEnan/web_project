<?php

include 'booking_PHP.php';
include 'header.php';


?>

<div class="booking-wrapper">
    <div class="container">
        <div class="booking-container mx-auto">

            <p>
            <h1 class="page-title">احجز موعدك</h1>
            <span class="sub-title text-uppercase">مركز الرؤية الطبي | VISION MEDICAL CENTER</span>
            </p>

            <form action="" method="POST">
                <input type="hidden" name="doctor_id" value="<?php echo $_GET['doctor_id'] ?? ''; ?>">
                <div class="input-block">
                    <label>الاسم الكامل</label>
                    <input type="text" class="custom-input" name="patient_name" placeholder="اكتب اسم المريض الثلاثي..." required>
                    <i class="fa-solid fa-user-check"></i>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="input-block">
                            <label>العمر</label>
                            <input type="number" class="custom-input" name="patient_age" placeholder="سنة" required>
                            <i class="fa-solid fa-calendar-check"></i>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="input-block">
                            <label>رقم التواصل</label>
                            <input type="tel" class="custom-input text-end" name="phone_number" dir="ltr" placeholder="+967" required>
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <button type="submit" class="btn-confirm" name="book_appointment">
                        <span>تأكيد الحجز</span>
                        <i class="fa-solid fa-arrow-left"></i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


<?php include 'footer.php' ?>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>

</html>