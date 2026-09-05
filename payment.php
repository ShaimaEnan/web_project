<?php include 'payment_PHP.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدفع لتأكيد الحجز - مركز الرؤية الطبي</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="payment.css">
</head>

<body>

    <div class="container">
        <div class="payment-card">
            <div class="company-logo">
                <img src="images/JIP.jpg" alt="شعار مركز الرؤية">
            </div>

            <div class="header-title">
                <h5 class="m-0 fw-bold">دفع المشتريات</h5>
            </div>

            <div class="nav-tabs-custom">
                <div class="active">جيب</div>
                <div>Wenet Pay</div>
            </div>

            <label class="form-label-custom">حساب المحفظة</label>
            <div class="input-group mb-4">
                <button class="input-group-text"></button>
                <select class="form-select">
                    <option>ريال يمني | # # # # #</option>
                </select>
            </div>

            <label class="form-label-custom">رقم نقطة البيع</label>
            <div class="input-group">
                <button class="input-group-text"></button>
                <input type="text" class="form-control" value="5523789" readonly>
                <button class="input-group-text"></button>
            </div>
            <div class="static-name">مركز الرؤية الطبي</div>

            <div class="mt-4">
                <label class="form-label-custom">المبلغ</label>
                <input type="number" id="inputAmount" class="form-control" value="<?php echo $half_price; ?>" readonly>
                <div class="small text-muted mt-2">ريال يمني</div>
            </div>

            <div class="mt-3 mb-4">
                <label class="form-label-custom">ملاحظات</label>
                <input type="text" id="inputNote" class="form-control" placeholder="أضف ملاحظة (اختياري)">
            </div>

            <button class="btn btn-continue" onclick="openConfirmation()">استمرار</button>
        </div>
    </div>

    <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title w-100 text-center fw-bold">بيانات الحركة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="amount-box">
                        <span id="displayAmount">0</span> <small style="font-size: 16px; font-weight: normal;">ريال يمني</small>
                    </div>

                    <div class="detail-item">
                        <span class="text-muted">العملية</span>
                        <span class="fw-bold">تأكيد حجز موعد</span>
                    </div>
                    <div class="detail-item border-0">
                        <span class="text-muted">المستلم</span>
                        <div class="text-start">
                            <div class="fw-bold">مركز الرؤية الطبي</div>
                            <div class="small text-muted text-start">5523789</div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <a href="booking_process_PHP.php" class="btn btn-danger flex-fill py-3 fw-bold">تنفيذ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>