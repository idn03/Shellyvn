<!DOCTYPE html>
<!-- Login Page -->
<html lang="en">

<!-- HEAD -->
<?php require __DIR__ . '/partials/head.php'; ?>

<style>
    /* LOGIN PAGE */
    main {
        display: block;
        opacity: 1;
    }
    h1 { color: #333;}

    #login-page {
        margin: 0;
    }

    .landing {
        position: absolute;
        justify-content: center;
        width: 100%; 
        height: 100vh; 
        align-items: center;
    }

    .login {
        position: relative;
        justify-content: end;
        margin-right: 12px;
        align-items: center;
        height: 100vh;
    }

        /* Login Box */
        .login-box {
            background-color: #FFF;
            
            border-radius: var(--bo-l);
            box-shadow: 0px 2px 4px var(--shadow-color);
        }

            .login-box__container {
                margin: 32px;
            }

            .login-box__logo {
                background-color: #8EACCD;
                padding: 8px;
                border-radius: 50%;
            }

            .login-box h1 { margin-top: 12px; }

        /* Form */
        .form-login {
            margin: 0px 48px;
        }

        .submit-btn {
            padding: 16px 60px;
        }
</style>

<body>
    <main id="login-page">
        <div class="row landing">
            <div class="col-lg-4">
                <div class="m-4">
                    <img src="/imgs/logo-text.png" height="60px" alt="">
                </div>
                <p>&nbsp; Shelly is an online platform specifically designed to support educational centers in the field 
                    of information technology in teaching and management. With a user-friendly interface and modern 
                    features, Shelly optimizes the process of managing students, organizing courses, tracking learning
                    progress, and evaluating teaching effectiveness.
                </p>
                <p>&nbsp; We believe Shelly will become your trusted companion on your journey to advancing education!</p>
            </div>
            <div class="col-lg-2"></div>
        </div>
            
        <div class="row login">
            <section class="col-lg-4 space-top login-box">
                <div class="text-center"><img class="login-box__logo" src="/imgs/shelly-logo.png" height="60px" alt=""></div>
                <h1 class="text-center">L O G I N</h1>

                <div class="form-login">
                    <form action="/login" method="post">
                        <div class="input-group--customize space-top">
                            <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                            <input type="text" name="taikhoan" id="username" class="form__input" value="<?= $_SESSION['form']['username'] ?? '' ?>">
                        </div>

                        <div class="input-group--customize space-top">
                            <label for="password"><i class="fa-solid fa-key"></i> Password</label>
                            <input type="password" name="matkhau" id="password" class="form__input">
                            <a href="#" class="nav-link" style="align-self: flex-end;">Forgot your password?</a>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="submit-btn">Sign In</button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <?php require __DIR__ . '/partials/toast.php' ?>
    </main>
</body>
</html>

<?php 
removeFromSession('status'); 
removeFromSession('form');
?>