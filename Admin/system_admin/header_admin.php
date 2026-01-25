<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - العرض</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../../stayl.css">
</head>
<header class="header shadow-sm bg-white py-2">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between">
            <a href="admin_doctor_show.php" class="navbar-brand d-flex align-items-center">
                <img src="../../images/medicalLogo2.png" alt="شعار" height="60" class="me-2">
                <span class="logo-text ms-2">لوحة تحكم المدير</span>
            </a>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="admin_doctor_show.php">عرض الاطباء</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin_staff_show.php">عرض الموظفين</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin_doctor_add.php">اضافه طبيب</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin_staff_add.php">اضافه موظف</a></li>

                </ul>
                <a href="../logout.php" class="btn btn-primary ">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    <span>تسجيل الخروج</span> </a>
        </nav>
    </div>
</header>