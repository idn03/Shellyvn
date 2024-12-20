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
            justify-content: space-evenly;
        }

    /* Achievements */
    .achieves-container {
        padding: 32px;
    }

    .add-achieve-icon {
        background-color: #D2E0FB80;

        display: flex;
        justify-content: center;

        padding: 16px;

        border-radius: var(--bo-s);
        box-shadow: 0px 4px 4px var(--shadow-color);

        text-decoration: none;
    }
    .add-achieve-icon:hover {
        cursor: pointer;
    }

    .add-achieve-icon i {
        align-self: center;
        
        font-size: 24px;

        margin: 0;
    }

    .add-achieve-content {
        margin: 18px 0px 0px 18px;
    }
    .achievement-container p, 
    .add-achieve-content p {color: #33333380;}

    .achievement-container {
        align-items: center;
        margin: 32px 0px;
    }

    .achievement-container i {
        position: absolute;
        left: 21.5px;
        bottom: -12px;

        margin-right: 0;

        color: #333;
        font-size: 24px;
        opacity: 0;
        transition: all 0.5s;
    }
    .achievement-container:hover i {opacity: 1;}

        .achievement__icon {
            background-color: #55679C80;
            
            margin-right: 16px;
            padding: 8px;

            border-radius: var(--bo-m);
            box-shadow: 0px 4px 4px var(--shadow-color);
            cursor: pointer;
        }


</style>

<body id="top">
    <?php require __DIR__ . '/../partials/header.php'; ?>

    <?php require __DIR__ . '/../partials/spinner.php'; ?>

    <main>
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/profile" class="nav-link tab"><i class="fa-solid fa-user-pen"></i> Profile</a>
        </section>

        <h1 class="text-center profile-title"><i class="fa-solid fa-user-pen"></i> PROFILE</h1>

        <div class="row space-top">
            <section class="col-lg-6">
                <h3 class="text-center">Infomation</h3>
                <form action="/profile/edit-info" method="post" class="profile-form" enctype="multipart/form-data">
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
                        <input type="date" name="ngaysinh" id="birthday" class="form__input" value="<?= htmlEscape($user['ngaysinh']); ?>">
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
                    
                    <input type="hidden" name="taikhoan" value="<?= htmlEscape($user['taikhoan']);?>">
                    <input type="hidden" name="loaitk" value="<?= htmlEscape($user['loaitk']); ?>">

                    <div class="text-center">
                        <button type="submit"><i class="fa-solid fa-floppy-disk"></i> SAVE</button>
                    </div>
                </form>

                <h3 class="text-center space-top">Password</h3>
                <form action="/profile/change-password" method="post" class="profile-form">
                    <div class="input-group--customize mt-4">
                        <label for="new-password"><i class="fa-solid fa-key"></i> New Password</label>
                        <input type="password" name="matkhau" id="new-password" class="form__input">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="confirm-password"><i class="fa-solid fa-key"></i> Confirm Password</label>
                        <input type="password" name="xn-matkhau" id="confirm-password" class="form__input">
                    </div>

                    <input type="hidden" name="taikhoan" value="<?= htmlEscape($user['taikhoan']);?>">

                    <div class="text-center">
                        <button type="submit"><i class="fa-solid fa-floppy-disk"></i> SAVE</button>
                    </div>
                </form>
            </section>

            <section class="col-lg-6">
                <h3 class="text-center">Achievements</h3>
                <div class="achieves-container">
                    <div class="d-flex mb-4">
                        <div class="add-achieve-icon" data-bs-toggle="modal" data-bs-target="#addAchievement">
                            <i class="fa-solid fa-plus"></i>
                        </div>

                        <div class="add-achieve-content">
                            <h5>Add New Achievement</h5>
                            <p class="tab">Achievements can be awards, certificates, your products or projects, etc.</p>
                        </div>
                    </div>

                    <hr>

                    <?php foreach ($achievements as $achievement): ?>
                        <div 
                            class="d-flex achievement-container" 
                            data-value="<?= $achievement['stt_thanhtuu']; ?>" 
                            onclick="setAchieveSeq(this)"
                            data-bs-toggle="modal" data-bs-target="#deleteAchievement"
                        >
                            <div style="position: relative; align-self: flex-start;">
                                <img 
                                    src="/imgs/icons/arch-icons/<?= htmlEscape($achievement['icon']) ?>" 
                                    height="64px" 
                                    class="achievement__icon" 
                                    alt=""
                                >
                                <i class="fa-solid fa-trash-can"></i>
                            </div>
                            
                            <div class="achievement__content">
                                <h5><?= htmlEscape($achievement['tenthanhtuu']) ?></h5>
                                <p class="tab"><?= htmlEscape($achievement['mota']) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
        <?php require __DIR__ . '/../partials/toast.php' ?>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>

    <?php require __DIR__ . '/../modals/add-achievement.php'; ?>
    <?php require __DIR__ . '/../modals/delete-achievement.php'; ?>
</body>

<script>
    function setAchieveSeq(element) {
        var achieveValue = element.getAttribute('data-value');

        document.getElementById('achieveSeq').value = achieveValue;
    }
</script>
</html>

<?php removeFromSession('status'); ?>