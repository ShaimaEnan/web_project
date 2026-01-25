<?php require_once "config.php" ?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <!--viewport Responsive تجعل الموقع يمكن فتحه بسهوله على الهاتف  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مركز الرؤية الطبي | حجز المواعيد الطبية</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
      <!-- يراقب حركة المستخدم (Scroll). -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
        <script src="script.js" defer></script> 
    <link rel="stylesheet" href="stayl.css">
</head>

<body>

    <header class="header shadow-sm bg-white text-primary ">
        <div class="container-fluid px-4">
            <nav class="navbar navbar-expand-lg">
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img src="images/medicalLogo2.png" alt="شعار مركز الرؤية الطبي" class="logo-image me-3" data-aos="fade-left">
                    <span class="logo-text" data-aos="fade-right">مركز الرؤية الطبي</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" href="index.php">الرئيسية</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#about_us">من نحن</a></li>
                        <li class="nav-item"><a class="nav-link" href="departments.php">الأقسام</a></li>
                        <li class="nav-item"><a class="nav-link" href="doctors.php"> الأطباء</a></li>
                    </ul>
                    <a href="departments.php" class="btn btn-primary pulse-btn">
                        <i class="bi bi-calendar-check me-2"></i>احجز موعد
                    </a>
                    
                </div>
            </nav>
        </div>
    </header> 
    

