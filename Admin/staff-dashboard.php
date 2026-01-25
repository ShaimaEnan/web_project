<?php include 'header_dashboard.php';
       include_once 'staff-PHP.php'; 
       ?>

<body class="bg-light">

    <main class="container py-5">
        <div class="row g-4 mb-4">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">قائمة الأطباء الحاليين</h4>
        </div>
      

        <div class="card shadow-sm border-0 overflow-hidden">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>القسم</th>
                        <th>التخصص</th>
                        <th>سنوات الخبرة</th>
                        <th>سعر المعاينة</th>
                        <th>اسم المستخدم</th>
                        <th>التقييم</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_doctors as $doctor): ?>
                        <tr>
                            <td><img src="../uploads/<?php echo $doctor['image_url']; ?>" class="rounded-circle" style="width:45px; height:45px; object-fit:cover;"></td>
                            <td class="fw-bold"><?php echo htmlspecialchars($doctor['name']);   ?> </td>
                            <td><span class="badge bg-info text-dark"><?php echo htmlspecialchars($doctor['department_name']);  ?> </span> </td>
                            <td><?php echo htmlspecialchars($doctor['specialization']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['experience']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['price']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['username']); ?></td>
                            <td><?php echo htmlspecialchars($doctor['rating']); ?></td>
                          
                        </tr>
                    <?php endforeach; ?>






                    </tr>



                    
                </tbody>
            </table>
        </div>
    </main>
    

</body>

</html>