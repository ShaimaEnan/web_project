<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_appointment'])) {
    
    // تأكد أن الاسم هنا doctor_id كما هو في الـ input المخفي أعلاه
    $doctor_id = $_POST['doctor_id'] ?? ''; 

    if (!empty($doctor_id)) {
        $_SESSION['booking_data'] = [
            'patient_name' => trim($_POST['patient_name']),
            'patient_age'  => trim($_POST['patient_age']),
            'phone_number' => trim($_POST['phone_number']),
            'doctor_id'    => $doctor_id 
        ];
        header("Location:payment.php");
        exit();
    } else {
        // هذه الرسالة التي تظهر لك في الصورة الثالثة
        die("خطأ: لم يتم تحديد طبيب بشكل صحيح. يرجى العودة واختيار طبيب أولاً.");
    }
}