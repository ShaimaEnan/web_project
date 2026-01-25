<?php include 'header_admin.php';
include_once 'admin_staff_show_PHP.php';  ?>

<body class="bg-light">

    <main class="container py-5">
        <div class="row g-4 mb-4">
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold">قائمة الموظفين الحاليين</h4>
            <a href="admin_staff_add.php" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-plus-lg me-2"></i> إضافة موظف جديد
            </a>
        </div>

        <div class="card shadow-sm border-0 overflow-hidden">
            <table class="table table-hover align-middle mb-0 text-center">
                <thead class="table-dark">
                    <tr>
                        <th>اسم الموظف</th>
                        <th>الدور</th>
                        <th>إجراءات</th>


                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_staff as $staff): ?>
                        <tr>
                            <td class="fw-bold"><?php echo htmlspecialchars($staff['full_name']);   ?> </td>
                            <td><?php echo htmlspecialchars($staff['role']); ?></td>

                            <td>
                                <a href="admin_staff_edit.php?id=<?php echo $staff['id']; ?>" class="btn btn-sm btn-outline-warning mx-1"><i class="bi bi-pencil"></i></a>
                                <a href="admin_staff-delet.php?id=<?php echo $staff['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('هل أنت متأكد من حذف الموظف: <?php echo htmlspecialchars($staff['full_name']); ?>؟')">
                                    <i class="bi bi-trash"></i>
                                </a>
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