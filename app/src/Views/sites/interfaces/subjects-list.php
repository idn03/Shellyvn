<?php foreach ($subjects as $subject): ?>
    <?php
        $currentDate = new DateTime('now');
        $startDate = DateTime::createFromFormat('Y-m-d', $subject['ngaybd']);
        $endDate = DateTime::createFromFormat('Y-m-d', $subject['ngaykt']);
        $subjectStatus = '';

        if ($currentDate < $startDate) {
            $subjectStatus = 'Not started';
        } elseif ($currentDate >= $startDate && $currentDate <= $endDate) {
            $subjectStatus = 'In progress';
        } else {
            $subjectStatus = 'Completed';
        }
    ?>
    <section class="col-lg-5 card subject-card">
        <i class="fa-solid fa-bookmark marked-icon <?= $subject['ghim'] != 1 ? 'd-none' : '' ?>"></i>
        <img src="/imgs/covers/<?= htmlEscape($subject['cover']) ?>" class="card-img-top" alt="...">
        <div class="card-title">
            <h3><?= htmlEscape($subject['tenmon']); ?></h3>
            <span class="card-title__status"><?= $subjectStatus ?></span>
        </div>
        <div class="card-body">
            <h5>ID: <?= htmlEscape($subject['ma_mon']) ?> - <?= htmlEscape($subject['taikhoan']) ?></h5>
            <div class="d-flex" style="justify-content: space-between;">
                <div>
                    <p class="card-text"><i class="fa-solid fa-user"></i> Students: <?= $_SESSION[(String)$subject['ma_mon']]['student'] ?></p>
                    <p class="card-text"><i class="fa-solid fa-clock"></i> Started at: <?=htmlEscape(formatDate($subject['ngaybd'])) ?></p>
                    <p class="card-text"><i class="fa-solid fa-note-sticky"></i> Notes: 
                        <?= $_SESSION[(String)$subject['ma_mon']]['note'] ?>
                    </p>
                </div>
                <a href="/subjects/<?= htmlEscape($subject['ma_mon']) ?>"><button class="card__btn"><i class="fa-solid fa-angles-right"></i></button></a>
            </div>
        </div>
    </section>
<?php endforeach; ?>  