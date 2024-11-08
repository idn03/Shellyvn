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
</style>
<body>
    <?php require __DIR__ . '/../../partials/header.php'; ?>

    <?php require __DIR__ . '/../../partials/spinner.php'; ?>
    
    <main id="top">
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/employees" class="nav-link tab"><i class="fa-solid fa-person"></i> Human Resource</a>
            <a href="/employees/add" class="nav-link tab-2"><i class="fa-solid fa-plus"></i> Add Employee</a>
        </section>

        <section class="text-center">
            <h1><i class="fa-solid fa-plus"></i> Add Employee</h1>
        </section>

        <div class="row justify-content-center space-top">
            <section class="col-lg-6">
                <form action="/employees/add" method="post" class="profile-form" enctype="multipart/form-data">
                    <div class="input-group--customize mt-4">
                        <label for="fullname">Full Name</label>
                        <input type="text" name="hoten" id="fullname" class="form__input" value="<?= $_SESSION['form']['hoten'] ?? '' ?>">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="birthday">Birthday</label>
                        <input type="date" name="ngaysinh" id="birthday" class="form__input">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="major">Major</label>
                        <input type="text" name="chuyennganh" id="major" class="form__input" value="<?= $_SESSION['form']['chuyennganh'] ?? '' ?>">
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
                                >
                                <label for="gender--male">Male</label>
                            </div>
    
                            <div class="form__radio-box">
                                <input 
                                    type="radio" 
                                    id="gender--female" 
                                    name="gioitinh" value="0"
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
                                >
                                <label for="role--admin">Adminsator</label>
                            </div>
    
                            <div class="form__radio-box">
                                <input 
                                    type="radio" 
                                    id="role--lecturer" 
                                    name="loaitk" 
                                    value="giangvien"
                                >
                                <label for="role--lecturer">Lecturer</label>
                            </div>
                        </div>
                    </div>

                    <hr class="mt-4">

                    <div class="input-group--customize mt-4 username-field">
                        <label for="username">Username</label>
                        <input type="text" name="taikhoan" id="username" class="form__input" value="<?= $_SESSION['form']['taikhoan'] ?? '' ?>">
                        <button class="check-username" type="submit">
                            <i class="fa-solid fa-feather"></i>
                        </button>
                        <p class="form__message">You should use [ <i class="fa-solid fa-feather"></i> Check Username ] before submit</p>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="password">Password</label>
                        <input type="password" name="matkhau" id="password" class="form__input">
                        <p class="form__message">Password must be at least 8 characters</p>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="confirm-password"><i class="fa-solid fa-key"></i> Confirm Password</label>
                        <input type="password" name="xn-matkhau" id="confirm-password" class="form__input">
                    </div>

                    <div class="text-center">
                        <button type="submit">Add User</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    
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
removeFromSession('form');
?>