<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
    h1 {color: #F9F3CC;}
    p {color: #333 !important; margin: 4px;}
    #home-page {
        margin: 60px 8%;
    }

    #home__info-card {
        background-color: #fff;
        justify-content: space-between;

        padding: 24px;
        margin-top: 24px;

        border-radius: var(--bo-l);
        box-shadow: 0px 4px 4px var(--shadow-color);
    }

        .info-card__container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
            .container__avatar {
                background-color: #D2E0FB;

                border-radius: var(--bo-m);
                box-shadow: 0px 4px 4px var(--shadow-color);
            }
            .container__content {
                margin-left: 24px;
            }

            .container__thumbnail {
                opacity: 0.75;
            }
</style>
<body id="top">
    <?php require __DIR__ . '/../partials/header.php'; ?>
    <main id="home-page">
        <h1 class="text-center">
            Welcome to Shelly
        </h1>

        <section id="home__info-card" class="row">
            <div class="col-lg-7 info-card__container">
                <div class="d-flex">
                    <div class="text-center">
                        <img class="container__avatar" src="https://i.pinimg.com/236x/86/f0/1b/86f01b2d26eaf5cd20250c9966d0da58.jpg" height="120px" alt="">
                    </div>
                    <div class="container__content">
                        <h4>Full name</h4>
                        <div>
                            <p>Gender: ...</p>
                            <p>Birth:: ../../....</p>
                            <p>Major: ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <img class="container__thumbnail" src="/imgs/info-card-thumbnail.png" height="160px" alt="">
            </div>
        </section>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>