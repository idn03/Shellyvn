<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
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
    .search-engine__input:focus {
        outline: none;
    }

    .search-engine__btn {
        height: 60px;
        background-color: #fff;
        
        border: none;
        padding: 8px 24px;

        border-radius: 0px 30px 30px 0px;
        box-shadow: none;
    }
    .search-engine__btn i { color: #333; }

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
    </main>
    
    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>