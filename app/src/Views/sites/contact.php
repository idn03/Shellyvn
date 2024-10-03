<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
    .user-info__detail {
        text-align: start;
    }
    .user-info__detail p {
        color: #333;
    }

    .form-container__label { margin-top: 40px; }
    #problems,
    #description {
        margin-top: 16px;
        padding: 18px;
        border: none;
        
        border-radius: var(--bo-l);

        transition: 0.5s all;
    }

        .form-select {
            box-shadow: 0px 4px 4px var(--shadow-color);
        }

    #description {
        min-height: 200px;
        border-radius: var(--bo-l) var(--bo-l) 4px var(--bo-l);
        box-shadow: 0px 4px 4px var(--shadow-color);
        transition: 0s;
    }
</style>

<body>
<?php require __DIR__ . '/../partials/header.php'; ?>

<main>
    <h1 class="text-center"><i class="fa-solid fa-address-book"></i> CONTACT</h1>

    <section class="text-center user-info">
        <h4 class="space-top">Full Name</h4>
        
        <div class="row justify-content-center">
            <div class="col-lg-3 user-info__detail">
                <p>Gender: ...</p>
                <p>Birth: ../../....</p>
                <p>Major: ...</p>
            </div>
        </div>
    </section>

    <section class="row justify-content-center form-container">
        <form action="/contact.php" method="post" class="col-lg-6">
            <label for="problems" class="form-container__label">What is your issue of concern?</label>
            <select name="problem" id="problems" class="form-select">
                <option value="bug" <?php $issue = '<i class="fa-solid fa-bug"></i>'; ?>>System error</option>
                <option value="quote" <?php $issue = '<i class="fa-solid fa-question"></i>'; ?>>Question</option>
                <option value="suggest" <?php $issue = '<i class="fa-solid fa-tag"></i>'; ?>>Suggestion</option>
                <option value="other" <?php $issue = '<i class="fa-solid fa-fish"></i>'; ?>>Other</option>
            </select>

            <label for="description" class="form-container__label">Please describe your problem</label>
            <textarea name="des" id="description" placeholder="Type here..." class="form-control"></textarea>

            <div class="text-center">
                <button type="submit">SEND</button>
            </div>
        </form>
    </section>

    <section>

    </section>
</main>

<?php require __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>