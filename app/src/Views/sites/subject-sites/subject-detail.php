<?php
    $toolBox = '';
    $disableBtn = '';
    
    $isMarked = '';
    $isMarkedMessage = 'Unmark from important';
    $isMarkedNav = 'unmark';
    
    $canAddNote = '';
    $canDeleteNote = 'data-bs-toggle="modal" data-bs-target="#deleteNote"';

    if (isAdmin()) {
        $toolBox = '
            <button class="tools__delete" data-bs-toggle="modal" data-bs-target="#deleteSubject">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        ';
        $canAddNote = 'd-none';
        $canDeleteNote = '';

        require __DIR__ . '/../../modals/delete-subject.php';
    }
    else {
        $toolBox = '<a href="/contact"><button class="tools__debug"><i class="fa-solid fa-bug"></i></button></a>';
    }

    if ($subject['ghim'] != 1) {
        $isMarked = 'd-none';
        $isMarkedMessage = 'Mark as important';
        $isMarkedNav = 'mark';
    }

    if (isFull(3, count($notes))) $disableBtn = 'disabled';
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../partials/head.php'; ?>

<style>
    h1 {
        margin: 24px 60px;
    }

    .hidden {display: none;}
    .fa-arrow-turn-up {transform: rotate(90deg);}

    .container__cover {
        position: relative;

        border-radius: var(--bo-l) 4px 4px var(--bo-l);
        box-shadow: 0px 4px 4px var(--shadow-color);
    }

    .marked-icon {
        font-size: 40px;
        text-shadow: 0px 4px 4px var(--shadow-color);
        
        position: absolute;
        top: -4px;
        left: 48px;
        z-index: 1;
    }

    .btn--mark {
        margin: 0px;

        border-radius: 0px 0px var(--bo-m) var(--bo-m);

        background-color: #F9F3CC;
        color: #333;
    }
    .btn--mark:hover, .btn--mark:hover i {color: #F9F3CC;}

    .subject-info {
        background-color: #fff;
        height: 440px;
        width: calc(100% - 48px);
        position: relative;

        padding: 12px;

        border-radius: 4px var(--bo-l) var(--bo-l) 4px;
        box-shadow: 0px 4px 4px var(--shadow-color);
    }
        .subject-info h3 {margin: 24px 8px;}
        .subject-info p, .subject-info i {color: #333;}
</style>

<body id="top">
    <?php require __DIR__ . '/../../partials/header.php'; ?>

    <?php require __DIR__ . '/../../partials/spinner.php'; ?>
    
    <main id="subject-detail-page">
        <h1><?= htmlEscape($subject['ma_mon']) ?></h1>
        <!-- PATH TREE -->
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/subjects" class="nav-link tab"><i class="fa-solid fa-list"></i> Subjects List</a>
            <a href="/subjects/<?= $subject['ma_mon'] ?>" class="nav-link tab-2">
                <i class="fa-solid fa-arrow-turn-up"></i> <?= $subject['ma_mon'] ?>
            </a>
        </section>

        <!-- SUBJECT INFO -->
        <section class="row justify-content-center space-bot">
        <div class="col-lg-6" style="position: relative;">
                <i class="fa-solid fa-bookmark marked-icon <?= $isMarked ?>"></i>
                <img class="container__cover" src="/imgs/covers/<?= htmlEscape($subject['cover']); ?>" height="440px" width="100%" alt="">
                <center>
                    <button 
                        class="btn--mark"
                        data-bs-toggle="modal" 
                        data-bs-target="#<?= $isMarkedNav ?>Important"
                    >
                        <i class="fa-regular fa-bookmark"></i> <?= $isMarkedMessage; ?>
                    </button>
                </center>
            </div>

            <div class="col-lg-5">
                <div class="d-flex">
                    <div class="subject-info">
                        <h3><?= htmlEscape($subject['tenmon']); ?></h3>

                        <p class="tab">Teacher: <?=htmlEscape($subject['taikhoan']) ?></p>

                        <p class="tab" style="margin-bottom: 8px;">
                            <i class="fa-solid fa-clock"></i> 
                            Start: <?=htmlEscape(formatDate($subject['ngaybd'])) ?>
                        </p>
                            <p class="tab-2">
                                > End: <?=htmlEscape(formatDate($subject['ngaykt'])) ?> 
                            </p>

                        <p class="tab"><i class="fa-solid fa-user"></i> Students: <?= count($students) ?></p>

                        <p class="tab"><i class="fa-solid fa-note-sticky"></i> Notes: <?= count($notes) ?></p>
                    </div>

                    <div class="tools">
                        <a href="/subjects/<?= htmlEscape($subject['ma_mon']) ?>/edit"><button class="tools__edit"><i class="fa-solid fa-file-pen"></i></button></a>
                        <?= $toolBox; ?>
                    </div>
                </div>

            </div>
        </section>

        <!-- NOTES -->
        <section class="space-bot">
            <?php require __DIR__ . '/../../partials/subject/notes.php'; ?>
        </section>

        <!-- STUDENTS AND CHART -->
        <section>
            <?php require __DIR__ . '/../../partials/subject/student-n-chart.php'; ?>
        </section>
    </main>

    <?php require __DIR__ . '/../../partials/toast.php'; ?>

    <?php require __DIR__ . '/../../partials/footer.php'; ?>

    <?php require __DIR__ . '/../../modals/mark-subject.php'; ?>
    <?php require __DIR__ . '/../../modals/unmark-subject.php'; ?>
    
    <?php require __DIR__ . '/../../modals/note.php'; ?>

    <?php require __DIR__ . '/../../modals/student.php'; ?>
</body>

<script>
    function setNoteSeq(element) {
        var noteValue = element.getAttribute('data-value');
        document.getElementById('delete_noteSeq').setAttribute('value', noteValue);
    }

    document.querySelectorAll('tr[data-bs-toggle="modal"]').forEach(row => {
        row.addEventListener('click', () => {
            var studentName = row.cells[0].getAttribute('data-value');
            var phoneNumber = row.cells[1].getAttribute('data-value');
            var gender = row.cells[2].getAttribute('data-value');
            var educationLevel = row.cells[3].getAttribute('data-value');
            var score = row.cells[4].getAttribute('data-value');

            document.getElementById('edit_name').value = studentName;
            document.getElementById('edit_phone').value = phoneNumber;
            document.getElementById('edit_level').value = educationLevel;

            document.getElementById('edit_gender--male').checked = (gender === '1');
            document.getElementById('edit_gender--female').checked = (gender === '0');
        });
    });

    const listItems = document.querySelectorAll('.score-list li');
    const iconInput = document.querySelector('input[name="diem"]');

    listItems.forEach(item => {
        item.addEventListener('click', () => {
            listItems.forEach(li => li.classList.remove('selected'));
            item.classList.add('selected');

            const value = item.getAttribute('data-value');
            iconInput.value = value;
        });
    });
</script>
</html>

<?php removeFromSession('status'); ?>