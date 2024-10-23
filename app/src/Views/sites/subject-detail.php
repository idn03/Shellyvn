<?php
    $toolBox = '';

    if (isAdmin()) {
        $toolBox = '<button class="tools__delete"><i class="fa-solid fa-trash-can"></i></button>';
    }
    else {
        $toolBox = '<a href="/contact"><button class="tools__debug"><i class="fa-solid fa-bug"></i></button></a>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../partials/head.php'; ?>

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

    .tools {
        display: flex;
        flex-direction: column;
    }
    .tools button {
        padding: 16px;
        margin: 0px;
        margin-top: 32px;

        border-radius: 0px 30px 30px 0px;
    }

    .btn--add-note i,
    .btn--mark i,
    .tools i {
        color: #333;
        transition: all 0.5s;
    }

        .tools__edit {            
            background-color: #D2E0FB;
        }
        .tools__edit:hover {background-color: #333;}
        .tools__edit:hover i {color: #D2E0FB;}

        .tools__delete {            
            background-color: #F87A53;
        }
        .tools__delete:hover {background-color: #333;}
        .tools__delete:hover i {color: #F87A53;}

        .tools__debug {
            background-color: #7E60BF;
        }
        .tools__debug:hover {background-color: #333;}
        .tools__debug:hover i {color: #7E60BF;}

    .btn--add-note {
        margin: 24px 60px;
    }
    .btn--add-note:hover i {color: #D7E5CA;}

    #notes {
        margin: 12px 24px;
        padding: 24px;

        border-radius: var(--bo-l);
        box-shadow: inset 0px 4px 4px var(--shadow-color);
    }

        .img--clip {
            position: absolute;
            right: 12px;
            top: -20px;

            transition: transform 0.8s ease-out, opacity 0.8s ease-out;
        }

        .container--note {
            position: relative;
            min-height: 120px;
            background-color: #fff;

            padding: 8px;
            margin: 12px 24px;

            border-radius: var(--bo-m);
            box-shadow: 0px 4px 4px var(--shadow-color);

            transition: transform 1s ease-out, opacity 1s ease-out;
        }
        
        .container--note.float-out {
            transform: translateY(100px);
            opacity: 0;
        }

        .img--clip.float-out {
            transform: translateY(-30px);
            opacity: 0;
        }

            .note__circles {
                height: 24px;
                width: 24px;
                background-color: #8EACCD;

                margin: 24px 4px;

                border-radius: 50%;
                box-shadow: inset 0px 4px 4px var(--shadow-color);
            }

            .note__content {
                max-width: 240px;

                padding: 16px;
            }
            .note__content p {color: #333; font-size: 18px;}

</style>

<body id="top">
    <?php require __DIR__ . '/../partials/header.php'; ?>

    <?php require __DIR__ . '/../partials/spinner.php'; ?>
    
    <main id="subject-detail-page">
        <h1><?= htmlEscape($subject['ma_mon']) ?></h1>
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/subjects" class="nav-link tab"><i class="fa-solid fa-list"></i> Subjects List</a>
            <a href="/subjects/<?= $subject['ma_mon'] ?>" class="nav-link tab-2"><i class="fa-solid fa-arrow-turn-up"></i> <?= $subject['ma_mon'] ?></a>
        </section>

        <section class="row justify-content-center space-bot">
            <div class="col-lg-6" style="position: relative;">
                <i class="fa-solid fa-bookmark marked-icon"></i>
                <img class="container__cover" src="/imgs/covers/<?= htmlEscape($subject['cover']); ?>" height="440px" width="100%" alt="">
                <center>
                    <button class="btn--mark"><i class="fa-regular fa-bookmark"></i> Mark as important</button>
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

                        <p class="tab"><i class="fa-solid fa-user"></i> Students: ...</p>

                        <p class="tab"><i class="fa-solid fa-note-sticky"></i> Notes: <?= htmlEscape(count($notes)) ?></p>
                    </div>

                    <div class="tools">
                        <button class="tools__edit"><i class="fa-solid fa-file-pen"></i></button>
                        <?= $toolBox; ?>
                    </div>
                </div>

            </div>
        </section>

        <section class="space-bot">
            <div class="d-flex space-top" style="justify-content: space-between;">
                <h1>NOTES (0/3)</h1>
                <button class="btn--add-note"><i class="fa-solid fa-plus"></i> Add note</button>
            </div>

            <?php if (count($notes) > 0): ?>
                <div id="notes" class="d-flex">
                    <?php foreach ($notes as $note): ?>
                    <div class="container--note">
                        <img src="/imgs/icons/clip.png" class="img--clip" height="48px" alt="">
                        <div class="d-flex">
                            <div>
                                <div class="note__circles"></div>
                                <div class="note__circles"></div>
                                <div class="note__circles"></div>
                                <div class="note__circles"></div>
                            </div>

                            <div class="note__content">
                                <p><?= htmlEscape($note['noidung_ghichu']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            <?php endif ?>
            
            <?php if (count($notes) == 0): ?>
                <center id="notes">
                    <?php require __DIR__ . '/../partials/empty.php'; ?>
                </center>
            <?php endif ?>
        </section>

        <section>
            <div class="row">
                <h1>Students & Chart</h1>
                <div class="col-lg-8">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>

<script>
    const notes = document.querySelectorAll('.container--note');
    const clips = document.querySelectorAll('.img--clip');

    notes.forEach((note, index) => {
    note.addEventListener('click', function() {
        note.classList.add('float-out');
        clips[index].classList.add('float-out');

        setTimeout(function() {
            note.classList.add('hidden');
            clips[index].classList.add('hidden');
        }, 1000);
    });
});
</script>
</html>