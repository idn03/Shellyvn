<?php
    $subjectCode = $subject['ma_mon'];
?>

<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
    .fa-arrow-turn-up {transform: rotate(90deg);}

    .input-group--customize {
        flex-basis: 50%;
    }

    .choose-cover {position: relative;}
    .choose-cover img {
        width: 100%;
        height: 288px;
        margin: 16px 0px;

        border-radius: var(--bo-l);
        box-shadow: 0px 2px 4px var(--shadow-color);
    }
        #loadingText {
            position: absolute;
            top: 32px;
            left: 24px;
            display: none;
        }

    #covers {
        margin-top: 8px;
        border: none;
        padding: 18px;
        
        border-radius: var(--bo-s);
        box-shadow: 0px 2px 4px var(--shadow-color);
    }
</style>

<body id="top">
    <?php require __DIR__ . '/../partials/header.php'; ?>

    <?php require __DIR__ . '/../partials/spinner.php'; ?>

    <main>
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/subjects" class="nav-link tab"><i class="fa-solid fa-list"></i> Subjects List</a>
            <a href="/subjects/<?= htmlEscape($subjectCode) ?>" class="nav-link tab-2"><i class="fa-solid fa-arrow-turn-up"></i> <?= htmlEscape($subjectCode) ?></a>
            <a href="/subjects/<?= htmlEscape($subjectCode) ?>/edit" class="nav-link tab-2"><i class="fa-solid fa-file-pen"></i> Edit Subject</a>
        </section>

        <section id="subject-list" class="text-center">
            <h1><i class="fa-solid fa-file-pen"></i> Edit Subject</h1>
        </section>

        <section class="row justify-content-center form-container">
            
            <form action="/subjects/<?= htmlEscape($subject['ma_mon']) ?>/edit" method="post" class="col-lg-6">
                <div class="input-group--customize mt-4 choose-cover">
                    <img id="coverImage" src="/imgs/covers/coffee.jpg" alt="">
                    <div id="loadingText" class="spinner-border text-secondary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <label for="covers">Choose Cover</label>
                    <select name="cover" id="covers" class="form-select">
                        <option value="coffee.jpg" selected>Coffee</option>
                        <option value="mountain.jpg">Mountain</option>
                        <option value="ocean.jpg">Ocean</option>
                        <option value="plates.jpg">Plates</option>
                        <option value="shapes.jpg">Shapes</option>
                        <option value="silk.jpg">Silk</option>
                        <option value="sky.jpg">Sky</option>
                    </select>
                </div>

                <div class="input-group--customize mt-4">
                    <label for="subjectcode">Subject Code</label>
                    <h5 class="text-center"><?= $subjectCode; ?></h5>
                    <input type="hidden" name="ma_mon" id="subjectcode" class="form__input" value="<?= $subjectCode; ?>" required>
                </div>

                <div class="input-group--customize mt-4">
                    <label for="subjectname">Subject Name</label>
                    <input type="text" name="tenmon" id="subjectname" class="form__input" value="<?= $subject['tenmon']; ?>" required>
                </div>

                <div class="d-flex">
                    <div class="input-group--customize mt-4">
                        <label for="start">Start</label>
                        <input type="date" name="ngaybd" id="start" class="form__input" value="<?= $subject['ngaybd']; ?>" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="end">End</label>
                        <input type="date" name="ngaykt" id="end" class="form__input" value="<?= $subject['ngaykt']; ?>" required>
                    </div>
                </div>

                <div class="input-group--customize mt-4">
                    <label for="teachers">Teacher</label>
                    <h5 class="text-center"><?= $subject['taikhoan']; ?></h5>
                </div>

                <div class="text-center">
                    <button type="submit">SAVE</button>
                </div>
            </form>
        </section>
    </main>

    <?php require __DIR__ . '/../partials/toast.php'; ?>

    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>

<script>
    document.getElementById("covers").addEventListener("change", (event) => {
        const loadingText = document.getElementById("loadingText");
        const coverImage = document.getElementById("coverImage");
        const selectedValue = event.target.value;

        loadingText.style.display = "block";

        setTimeout(() => {
            coverImage.src = `/imgs/covers/${selectedValue}`;
            loadingText.style.display = "none";
        }, 1500);
    });
</script>
</html>

<?php removeFromSession('status'); ?>