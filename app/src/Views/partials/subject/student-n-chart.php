<style>
    thead th {font-size: 18px;}

    tbody tr {
        cursor: pointer;
        transition: 0.5s all;
    }
    tbody tr:hover {
        font-size: 18px;
        opacity: 0.8;
    }

    .add-student-btn {margin: 8px 0px;}
    .add-student-btn i {
        color: #333;
        transition: 0.5s all;
    }
    .add-student-btn:hover i {color: #D7E5CA;}
</style>

<div class="row">
    <div class="d-flex space-top" style="justify-content: space-between;">
        <h1>STUDENTS</h1>
        <h1>CHART</h1>
    </div>
    
    <div class="col-lg-8">
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Educational level</th>
                    <th class="text-center">Score</th>
                </tr>
            </thead>
            <?php foreach ($students as $student): ?>
                <tbody>
                    <tr data-bs-toggle="modal" data-bs-target="#editStudent">
                        <td><?= htmlEscape($student['tenhocvien']); ?></td>
                        <td><?= htmlEscape($student['sdt_hocvien']); ?></td>
                        <td><?= $student['gioitinh_hocvien'] == 1 ? 'Male' : 'Female'; ?></td>
                        <td><?= htmlEscape($student['trinhdo_hocvien']) ?></td>
                        <td class="text-center"><?= $student['diem']; ?> / 10</td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
        <?php if (count($students) == 0): ?>
            <?php require __DIR__ . '/../../partials/empty-state.php'; ?>
        <?php endif ?>

        <button class="add-student-btn" data-bs-toggle="modal" data-bs-target="#addStudent"><i class="fa-solid fa-plus"></i> Add student</button>
    </div>
</div>