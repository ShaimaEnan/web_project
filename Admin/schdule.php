<?php include 'header_dashboard.php';
       include "schdule_PHP.php";  ?>

<body class="bg-light">

    <main class="container py-5">
        <div class="row g-4 mb-4">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">قائمة مواعيد الأطباء </h4>
        </div>

        <div class="card shadow-sm border-0 overflow-hidden">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 30%;">الاسم</th>
                        <th style="width: 20%;">القسم</th>
                        <th style="width: 30%;">التخصص</th>
                        <th style="width: 20%;">المواعيد</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctors_with_appointments as $doctor): ?>
                        <tr>
                            <td class="fw-bold"><?php echo htmlspecialchars($doctor['doctor_name']);   ?> </td>
                            <td><span class="badge bg-info text-dark"><?php echo htmlspecialchars($doctor['department_name']);  ?> </span> </td>
                            <td><?php echo htmlspecialchars($doctor['specialization']); ?></td>
                            <td>
                                <a href="Show_schdule.php?id=<?php echo $doctor['id']; ?>" class="btn btn-sm btn-outline-primary mx-1">عرض المواعيد</a>
                                
                            </td>
                        </tr>
                    <?php endforeach; ?>






                    </tr>



                    
                </tbody>
            </table>
        </div>
    </main>
    

</body>

</html>