//خاصه ب صفحة index
document.addEventListener('DOMContentLoaded', function() {
    // تشغيل مكتبة الحركات AOS
    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });

  
});
// خاصه ب صفحه payment
  function openConfirmation() {
        const amount = document.getElementById('inputAmount').value;
        document.getElementById('displayAmount').innerText = amount;
        if(!amount || amount <= 0) {
            alert("يرجى إدخال مبلغ صحيح");
            return;
        }
        document.getElementById('displayAmount').innerText = amount;
        var myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        myModal.show();
    }
    
    function goToPaymentPage() {
  
    window.location.href = "payment.php"; 
}
// دالة لإرسال رسالة واتساب مع الموقع الحالي
function sendEmergencyWithLocation() {
    const phoneNumber = "967780320206";
    const defaultMessage = "حالة طوارئ طبية تحتاج إلى مساعدة عاجلة!";

    // التحقق مما إذا كان المتصفح يدعم خاصية تحديد الموقع
    if (navigator.geolocation) {
        // إظهار رسالة انتظار بسيطة للمستخدم
        console.log("جاري تحديد موقعك...");
        
        navigator.geolocation.getCurrentPosition(
            function(position) {
                // نجاح الحصول على الموقع
                let lat = position.coords.latitude;
                let lng = position.coords.longitude;
                let googleMapsLink = `https://www.google.com/maps?q=${lat},${lng}`;
                
                let fullMessage = `${defaultMessage}%0A📍 موقعي الحالي: ${googleMapsLink}`;
                window.open(`https://wa.me/${phoneNumber}?text=${fullMessage}`, '_blank');
            },
            function(error) {
                // في حال رفض المستخدم إعطاء الإذن أو حدث خطأ
                console.error("تعذر الحصول على الموقع", error);
                let fallbackMessage = `${defaultMessage} (ملاحظة: لم يتم إرسال الموقع تلقائياً، يرجى إرساله يدوياً)`;
                window.open(`https://wa.me/${phoneNumber}?text=${encodeURIComponent(fallbackMessage)}`, '_blank');
            },
            { enableHighAccuracy: true, timeout: 10000 } // إعدادات الدقة العالية
        );
    } else {
        // المتصفح لا يدعم تحديد الموقع
        window.open(`https://wa.me/${phoneNumber}?text=${encodeURIComponent(defaultMessage)}`, '_blank');
    }
}

const fileInput = document.getElementById('doctor_image');
const errorMessage = document.getElementById('errorMessage');

fileInput.addEventListener('change', function() {
    const file = this.files[0];
    const maxSizeInBytes = 2 * 1024 * 1024; // 2 ميجابايت

    if (file) {
        // 1. فحص النوع (يجب أن يبدأ بـ image)
        if (!file.type.startsWith('image/')) {
            errorMessage.textContent = "عذراً، الملف يجب أن يكون صورة فقط!";
            this.value = ""; 
            return;
        }

        // 2. فحص الحجم (يجب أن يكون أقل من 2MB)
        if (file.size > maxSizeInBytes) {
            errorMessage.textContent = "الصورة كبيرة جداً! الحد الأقصى هو 2 ميجابايت.";
            this.value = ""; 
            return;
        }

    }
});
