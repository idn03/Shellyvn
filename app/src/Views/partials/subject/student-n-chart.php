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

    .empty-chart-message {
        width: 240px;
        text-align: center;
    }
    .empty-chart-message i {color: #333;}
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
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr data-bs-toggle="modal" data-bs-target="#editStudent">
                        <td 
                            data-value="<?= htmlEscape($student['tenhocvien']); ?>"
                        ><?= htmlEscape($student['tenhocvien']); ?></td>
                        <td 
                            data-value="<?= htmlEscape($student['sdt_hocvien']); ?>"
                        ><?= htmlEscape($student['sdt_hocvien']); ?></td>
                        <td 
                            data-value="<?= $student['gioitinh_hocvien'] ?>"
                        ><?= $student['gioitinh_hocvien'] == 1 ? 'Male' : 'Female'; ?></td>
                        <td 
                            data-value="<?= htmlEscape($student['trinhdo_hocvien']); ?>"
                        ><?= htmlEscape($student['trinhdo_hocvien']); ?></td>
                        <td 
                            class="text-center" 
                            data-value="<?= $student['diem']; ?>"
                        ><?= $student['diem']; ?> / 10</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if (count($students) == 0): ?>
            <?php require __DIR__ . '/../../partials/empty-state.php'; ?>
        <?php endif ?>

        <button class="add-student-btn" data-bs-toggle="modal" data-bs-target="#addStudent"><i class="fa-solid fa-plus"></i> Add student</button>
    </div>

    <div class="col-lg-4 d-flex" style="align-items: center; justify-content: end;">
        <canvas id="myDoughnutChart" class="<?= $emptyChart ?>" width="400" height="400"></canvas>
        <?= $emptyChartMessage ?>
    </div>
</div>

<script>
    const students = <?= json_encode($students); ?>;
    const ranges = {
        '0 - 4': students.filter(student => student.diem >= 0 && student.diem < 4),
        '4 - 7': students.filter(student => student.diem >= 4 && student.diem < 7),
        '7 - 10': students.filter(student => student.diem >= 7 && student.diem <= 10)
    };

    const labels = Object.keys(ranges);
    const data = labels.map(range => ranges[range].length);

    const backgroundColors = [
        'rgb(248, 122, 83)',
        'rgb(249, 243, 204)',
        'rgb(215, 229, 202)',
    ];

    const ctx = document.getElementById('myDoughnutChart').getContext('2d');
    const myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of students according to mark points',
                data: data,
                backgroundColor: backgroundColors,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#333',
                        font: {
                            size: 16,
                        },
                        boxWidth: 20,
                        boxHeight: 20,
                        padding: 18,
                    },
                },
                tooltip: {
                    titleFont: {
                        size: 18
                    },
                    padding: 10,
                    callbacks: {
                        label: function(context) {
                            const range = context.label;
                            const studentsInRange = ranges[range].map(student => student.tenhocvien);
                            return `${range}: ${studentsInRange.join(', ')}`;
                        }
                    }
                }
            }
        }
    });
</script>