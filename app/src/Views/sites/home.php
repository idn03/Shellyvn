<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
    p {color: #333 !important; margin: 4px;}

    #home__info-card {
        background-color: #fff;
        justify-content: space-between;

        padding: 24px;
        margin-top: 24px;

        border-radius: var(--bo-l);
        box-shadow: 0px 4px 4px var(--shadow-color);
        position: relative;
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
        
        .edit-btn {
            background-color: #D2E0FB;
            margin-top: 0px;

            border-radius: 0px 0px var(--bo-m) var(--bo-m);
        }
        .edit-btn i { transition: 0.5s all; }
        .edit-btn:hover,
        .edit-btn:hover i {
            color: #D2E0FB;
        }

        .edit-btn i { color: #333; }
        
    #calendar {

    }

        .styled-calendar-container {
            height: 699.1px;

            margin: 24px 0px;

            border-radius: var(--bo-l);
            box-shadow: 0px 4px 4px var(--shadow-color);
        }
</style>
<body id="top">
    <?php require __DIR__ . '/../partials/header.php'; ?>

    <?php require __DIR__ . '/../partials/spinner.php'; ?>
    <main id="home-page">
        <h1 class="text-center">
            Welcome to Shelly
        </h1>

        <section id="home__info-card" class="row">
            <div class="col-lg-7 info-card__container">
                <div class="d-flex">
                    <div class="text-center">
                        <img class="container__avatar" src="/imgs/avatars/<?= htmlEscape($user['avatar']) ?>" height="120px" alt="">
                    </div>
                    <div class="container__content">
                        <h4><?= htmlEscape($user['hoten']) ?></h4>
                        <div>
                            <p>
                                Gender: &nbsp; <?php 
                                    if($user['gioitinh'] == 1) 
                                    echo '<i class="fa-solid fa-mars" style="color: #333;"></i> Male'; 
                                    else echo '<i class="fa-solid fa-venus" style="color: #333;"></i> Female';
                                ?>
                            </p>
                            <p>Birth: &nbsp; <?= htmlEscape(formatDate($user['ngaysinh'])) ?></p>
                            <p>Major: &nbsp; <?= htmlEscape($user['chuyennganh']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <img class="container__thumbnail" src="/imgs/thumbnails/info-card-thumbnail.png" height="160px" alt="">
            </div>
        </section>
        <a href="/profile" class="text-center" style="display: block;">
            <button class="edit-btn"><i class="fa-solid fa-user-pen"></i> Edit Profile</button>
        </a>

        <section id="calendar" class="text-center space-top">
            <h1><i class="fa-regular fa-calendar"></i> Calendar & Schedule</h1>
            <iframe src="https://embed.styledcalendar.com/#XsXh7FddP0Q5jLKweBGw" 
                title="Styled Calendar" 
                class="styled-calendar-container" 
                style="width: 100%; border: none;" 
                data-cy="calendar-embed-iframe">
            </iframe>
        </section>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>

</html>