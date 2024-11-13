<style>
    .subject-list {
        justify-content: center;
    }
</style>

<section class="col-lg-5 card subject-card">
    <i class="fa-solid fa-bookmark marked-icon <?= $subjects['ghim'] != 1 ? 'd-none' : '' ?>"></i>
    <img src="/imgs/covers/<?= htmlEscape($subjects['cover']) ?>" class="card-img-top" alt="...">
    <h3 class="card-title"><?= htmlEscape($subjects['tenmon']); ?></h3>
    <div class="card-body">
        <h5>ID: <?= htmlEscape($subjects['ma_mon']) ?> - <?= htmlEscape($subjects['taikhoan']) ?></h5>
        <div class="d-flex" style="justify-content: space-between;">
            <div>
                <p class="card-text"><i class="fa-solid fa-user"></i> Students: <?= $_SESSION[(String)$subjects['ma_mon']]['student'] ?></p>
                <p class="card-text"><i class="fa-solid fa-clock"></i> Started at: <?=htmlEscape(formatDate($subjects['ngaybd'])) ?></p>
                <p class="card-text"><i class="fa-solid fa-note-sticky"></i> Notes: 
                    <?= $_SESSION[(String)$subjects['ma_mon']]['note'] ?>
                </p>
            </div>
            <a href="/subjects/<?= htmlEscape($subjects['ma_mon']) ?>"><button class="card__btn"><i class="fa-solid fa-angles-right"></i></button></a>
        </div>
    </div>
</secti>