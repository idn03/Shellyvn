<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
    h3 {
        color: #F9F3CC;
        text-shadow: 2px 4px var(--shadow-color);
    }

    .container__avatar {
        background-color: #D2E0FB;

        border-radius: var(--bo-m);
        box-shadow: 0px 4px 4px var(--shadow-color);
    }

    /* Profile Form */
    .profile-form {
        padding: 32px;

        border-radius: var(--bo-m);
        box-shadow: inset 0px 2px 10px var(--shadow-color);
    }
    .profile-form i {
        color: #333;
    }

        .profile-form__title {
            margin-left: 12px;
            align-self: center;
        }
</style>

<body id="top">
    <?php require __DIR__ . '/../partials/header.php'; ?>

    <?php require __DIR__ . '/../partials/spinner.php'; ?>

    <main>
        <h1 class="text-center profile-title"><i class="fa-solid fa-user-pen"></i> PROFILE</h1>

        <div class="row space-top">
            <section class="col-lg-6">
                <h3 class="text-center">Infomation</h3>
                <form action="/profile/edit-info" method="post" class="profile-form">
                    <div class="d-flex">
                        <img class="container__avatar" src="/imgs/avatars/<?= htmlEscape($user['avatar']) ?>" height="120px" alt="">
                        <div class="profile-form__title">
                            <h4>Username:</h4>
                            <p><i><?= htmlEscape($user['taikhoan']) ?></i></p>
                        </div>    
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="hoten" id="fullname" class="form__input" value="<?= htmlEscape($user['hoten']) ?>">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="ngaysinh" id="birthday" class="form__input">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="major">Major</label>
                        <input type="text" name="chuyennganh" id="major" class="form__input" value="<?= htmlEscape($user['chuyennganh']) ?>">
                    </div>

                    <div class="text-center">
                        <button type="submit">SAVE CHANGE</button>
                    </div>
                </form>

                <h3 class="text-center space-top">Password</h3>
                <form action="/profile/change-password" method="post" class="profile-form">
                    <div class="input-group--customize mt-4">
                        <label for="new-password"><i class="fa-solid fa-key"></i> New Password</label>
                        <input type="password"confirm- id="new-password" class="form__input">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="confirm-password"><i class="fa-solid fa-key"></i> Confirm Password</label>
                        <input type="password" name="matkhau" id="confirm-password" class="form__input">
                    </div>

                    <div class="text-center">
                        <button type="submit">SAVE CHANGE</button>
                    </div>
                </form>
            </section>

            <section class="col-lg-6">
                <h3 class="text-center">Archivements</h3>
            </section>
        </div>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>