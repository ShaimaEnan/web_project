<?php include_once 'header_dashboard.php';
       include_once 'Show_schdule_PHP.php'; ?>


<<body class="bg-light">

    <main class="container py-5">
        <div class="row g-4 mb-4">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">
                قائمة مواعيد الطبيب:
                <?php
                if (!empty($all_appointments)) {
                    echo $all_appointments[0]['doctor_name'];
                } else {
                    echo "غير معروف";
                }
                ?>
            </h4>
        </div>

        <div class="card shadow-sm border-0 overflow-hidden">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 30%;"> اسم المريض</th>
                        <th style="width: 20%;">رقم الهاتف</th>
                        <th style="width: 30%;">تاريخ الموعد</th>
                        <th style="width: 20%;">وقت الموعد</th>
                        <th style="width: 20%;">الفترة</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $all_appointments  as $appointment): ?>
                        <tr>
                            <td class="fw-bold"><?php echo htmlspecialchars($appointment['patient_name']);   ?> </td>
                            <td><span class="badge bg-info text-dark"><?php echo htmlspecialchars($appointment['phone_number']);  ?> </span> </td>
                            <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['appointment_time']); ?></td>
                            <td><?php echo htmlspecialchars($appointment['period']); ?></td>
                        </tr>
                    <?php endforeach; ?>






                    </tr>




                </tbody>
            </table>
        </div>
    </main>


    </body>

    </html>