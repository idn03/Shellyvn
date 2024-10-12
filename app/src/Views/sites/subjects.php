<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
    /* Search Engine */
    .search-engine {
        display: flex;
        width: 600px;

        margin-top: 24px;
    }

        .search-engine__input {
            width: 90%;
            height: 60px;
            
            border: none;
            padding: 8px 16px;
            align-self: center;

            border-radius: 30px 0px 0px 30px;
        }
            .search-engine__input:focus { outline: none; }

        .search-engine__btn {
            height: 60px;
            background-color: #fff;
            
            border: none;
            padding: 8px 24px;

            border-radius: 0px 30px 30px 0px;
            box-shadow: none;
        }
            .search-engine__btn i { color: #333; }
    
    /* Subject Card */
    .subject-card {
        margin: 16px;
        border: none;
        padding: 0;

        border-radius: var(--bo-l);
        box-shadow: 0px 4px 4px var(--shadow-color);
    }
    .subject-card .card-img-top { border-radius: var(--bo-l) var(--bo-l) 0px 0px;}

        .card-title {
            position: absolute;
            top: 240px;
            left: 16px;
            font-weight: var(--text-bold);
        }
        
        .card-body { padding: 24px; }
        
        .card-text, .card-text i {color: #333;}
        
        .card__btn {
            height: 48px;
            width: 48px;

            padding: 0;

            border-radius: 50%;
        }
        .card__btn i { 
            color: #333; 
            margin: 0;
            transition: 0.5s all;
        }
        .card__btn:hover i {
            color: #D7E5CA;
        }

</style>

<body id="top">
    <?php require __DIR__ . '/../partials/header.php'; ?>
    <main>
        <section id="subject-list" class="text-center space-top">
            <h1><i class="fa-solid fa-list"></i> Subject List</h1>
        </section>

        <form action="/subjects" method="get" class="d-flex justify-content-center">
            <div class="search-engine">
                <input type="text" class="search-engine__input" name="search-engine" placeholder="Type Subject Code here...">
                <button class="search-engine__btn" type="submit" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>

        <section class="row">
            <?php foreach ($subjects as $subject): ?>
                <div class="col-lg-4 card subject-card">
                    <img src="/imgs/covers/<?= htmlEscape($subject['cover']) ?>" class="card-img-top" alt="...">
                    <h3 class="card-title"><?= htmlEscape($subject['tenmon']); ?></h3>
                    <div class="card-body">
                        <h5><?= htmlEscape($subject['ma_mon']) ?></h5>
                        <div class="d-flex" style="justify-content: space-between;">
                            <div>
                                <p class="card-text"><i class="fa-solid fa-user"></i> Students: ...</p>
                                <p class="card-text"><i class="fa-solid fa-clock"></i> Started at: <?=htmlEscape(formatDate($subject['ngaybd'])) ?></p>
                                <p class="card-text"><i class="fa-solid fa-note-sticky"></i> Notes: ...</p>
                            </div>
                            <a href="/subjects/<?= htmlEscape($subject['ma_mon']) ?>"><button class="card__btn"><i class="fa-solid fa-angles-right"></i></button></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>   
        </section>
    </main>
    
    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>