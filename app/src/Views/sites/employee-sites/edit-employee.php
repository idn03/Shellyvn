<?php
$disableBtn = 'disabled';
$messageA = 'Cannot delete Adminsator';
$messageB = '';

if ($user['loaitk'] != 'quantri') {
    $messageA = '';
    $disableBtn = '';
}

if ($user['taikhoan'] == $_SESSION['user']['taikhoan']) {
    $messageB = 'Cannot delete your Account';
    $disableBtn = 'disabled';
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../partials/head.php' ?>

<style>
    .form__message {
        font-size: 14px;
        color: #33333380;
        
        margin-left: 12px;

    }
    .form__message i {margin: 0px;}
    .container__avatar {
        background-color: #D2E0FB;

        padding: 8px 8px 2px 8px;

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

        .profile-form__radio {
            display: flex;
            flex-direction: row;
            justify-content: start;

            padding: 0px 24px;
        }

        .username-field {
            position: relative;
        }
            .check-username {
                background: none;
                font-size: 24px;

                position: absolute;
                right: 12px;
                top: 44px;

                margin: 0;
                padding: 0;
                box-shadow: none;

                cursor: pointer;
            }
            .check-username:hover {
                background: none;
                opacity: 0.8;
            }

    /* Sub Info */
    .delete-user-container {
        display: flex;
        background-color: #FFF;

        padding: 16px;

        border-radius: var(--bo-m);
        box-shadow: 0px 4px 4px var(--shadow-color);
    }
        .delete-user-container p {
            align-self: center;
            text-align: start;
            margin-bottom: 0;
        }
        .btn--delete {
            margin: 16px 0px;
        }
        .btn--delete i {margin: 0;}
</style>
<body>
    <?php require __DIR__ . '/../../partials/header.php'; ?>

    <?php require __DIR__ . '/../../partials/spinner.php'; ?>
    
    <main id="top">
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/employees" class="nav-link tab"><i class="fa-solid fa-person"></i> Human Resource</a>
            <a href="/employees/<?= $user['taikhoan'] ?>" class="nav-link tab-2">
                <i class="fa-solid fa-user-pen"></i> Edit Profile: 
                <br>
                <?= htmlEscape($user['taikhoan']); ?>
            </a>
        </section>

        <section class="text-center">
            <h1><i class="fa-solid fa-user-pen"></i> Edit Employee</h1>
        </section>

        <div class="row justify-content-center space-top">
            <section class="col-lg-6">
                <form action="/employees/<?= htmlEscape($user['taikhoan']); ?>" method="post" class="profile-form" enctype="multipart/form-data">
                    <div class="d-flex">
                        <img class="container__avatar"  src="/imgs/avatars/<?= htmlEscape($user['avatar']) ?>" height="100px" alt="">

                        <div class="profile-form__title">
                            <h4>Username:</h4>
                            <p><i><?= htmlEscape($user['taikhoan']) ?></i></p>
                            <input type="hidden" name="avatar" value="<?= htmlEscape($user['avatar']);?>">
                            <div class="input-group--customize mt-4">
                                <label for="avatar_file" class="form-label form-label--file"><i class="fa-solid fa-image"></i> Upload new avatar</label>
                            </div>
                        </div>    
                    </div>

                    <div class="input-group--customize mt-4">
                        <input type="file" id="avatar_file" name="avatar_file" class="form-control">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="hoten" id="fullname" class="form__input" value="<?= htmlEscape($user['hoten']) ?>">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="ngaysinh" id="birthday" class="form__input" value="<?= htmlEscape($user['ngaysinh']) ?>">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="major">Major</label>
                        <input type="text" name="chuyennganh" id="major" class="form__input" value="<?= htmlEscape($user['chuyennganh']) ?>">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="gender">Gender:</label>
                        <div class="profile-form__radio">
                            <div class="form__radio-box">
                                <input 
                                    type="radio" 
                                    id="gender--male" 
                                    name="gioitinh" 
                                    value="1"
                                    <?= $user['gioitinh'] == 1 ? 'checked' : '' ?>
                                >
                                <label for="gender--male">Male</label>
                            </div>
    
                            <div class="form__radio-box">
                                <input 
                                    type="radio" 
                                    id="gender--female" 
                                    name="gioitinh" value="0"
                                    <?= $user['gioitinh'] == 0 ? 'checked' : '' ?>
                                >
                                <label for="gender--female">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="role">Account Type:</label>
                        <div class="profile-form__radio">
                            <div class="form__radio-box">
                                <input 
                                    type="radio" 
                                    id="role--admin" 
                                    name="loaitk" 
                                    value="quantri"
                                    <?= $user['loaitk'] == 'quantri' ? 'checked' : '' ?> 
                                >
                                <label for="role--admin">Adminsator</label>
                            </div>
    
                            <div class="form__radio-box">
                                <input 
                                    type="radio" 
                                    id="role--lecturer" 
                                    name="loaitk" 
                                    value="giangvien"
                                    <?= $user['loaitk'] == 'giangvien' ? 'checked' : '' ?> 
                                >
                                <label for="role--lecturer">Lecturer</label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="taikhoan" value="<?= htmlEscape($user['taikhoan']) ?>">

                    <div class="text-center">
                        <button type="submit"><i class="fa-solid fa-floppy-disk"></i> SAVE</button>
                    </div>
                </form>
            </section>

            <section class="col-lg-4">
                <div class="text-center">
                    <div class="space-top"></div>
                    <img src="/imgs/icons/bookshelf.png" height="80px" alt="">
                    <h3 class="title-number mt-2"><?= count($subjects); ?></h3>
                    <h5>Subjects</h5>

                    <div class="space-top"></div>
                    <img src="/imgs/icons/trophy.png" height="80px" alt="">
                    <h3 class="title-number mt-2"><?= count($achieves); ?></h3>
                    <h5>Achievements</h5>

                    <div class="space-top"></div>
                    <div class="delete-user-container">
                        <button 
                            class="btn--delete" 
                            <?= $disableBtn; ?>
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteUser"
                        ><i class="fa-solid fa-trash-can"></i></button>
                        <p class="form__message">
                            Caution: If this User is terminated, all associated data elements will be deleted.
                        </p>
                    </div>

                    <div class="mt-2" style="text-align: start; margin-left: 24px;"><?= $messageA ?></div>
                    <div class="mt-2" style="text-align: start; margin-left: 24px;"><?= $messageB ?></div>
                </div>
            </section>
        </div>
    </main>
    <?php require __DIR__ . '/../../modals/delete-user.php'; ?>
    
    <?php require __DIR__ . '/../../partials/toast.php'; ?>
    <?php require __DIR__ . '/../../partials/footer.php'; ?>
</body>

<script>
    // Input Radio Effect
    const radioButtons = document.querySelectorAll('input[type="radio"]');

    function updateRadioBoxStyle() {
    document.querySelectorAll('.form__radio-box').forEach(box => {
        box.classList.remove('radio-checked');
    });

    radioButtons.forEach(radio => {
        if (radio.checked) {
        radio.closest('.form__radio-box').classList.add('radio-checked');
        }
    });
    }

    radioButtons.forEach(radio => {
    radio.addEventListener('change', updateRadioBoxStyle);
    });
</script>
</html>

<?php 
removeFromSession('status'); 
?>