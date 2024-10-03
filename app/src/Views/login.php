<!DOCTYPE html>
<!-- Login Page -->
<html lang="en">

<!-- HEAD -->
<?php require __DIR__ . '/partials/head.php'; ?>

<style>
    /* LOGIN PAGE */
    #login-page {
        background-image: url('/imgs/login-bg.jpg');
        height: 738px;
        background-size: cover;

        margin: 0;
    }

        /* Login Box */
        .login-box {
            z-index: 1;
            background-color: #FFF;
            padding-top: 16px;
            border-radius: 0 0 var(--bo-l) var(--bo-l);
            box-shadow: 0px 2px 4px var(--shadow-color);
        }

        .login-box__container {
            margin: 32px;
        }
    
        .logo-box {
            background-color: #8EACCD;
            width: fit-content;
            padding: 16px 80px;
            box-shadow: 0px 2px 4px var(--shadow-color);
            border-radius: 0px 0px 18px 18px;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-100px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .hidden {
            opacity: 0;
        }
        
        .show {
            animation: slideDown 0.75s ease-out forwards;
        }

        /* Form */
        .form--login {
            margin: 0px 48px;
        }

        .form--login__username,
        .form--login__password {
            margin: 0px 16px;
            
            display: flex;
            flex-direction: column;
        }

        .input-box--username {
            border-radius: var(--bo-s);
        }

        .submit-btn {
            padding: 16px 60px;
        }
</style>

<body>
    <main id="login-page">
        <div class="row justify-content-center" style="width: 100%;">
            <section class="login-box col-lg-5 hidden">
                <h1 class="text-center">L O G I N</h1>

                <div class="cointainer__customize form--login">
                    <form action="/login" method="post">
                        <div class="form--login__username space-top">
                            <label for="username"><i class="fa-solid fa-user"></i> Username</label>
                            <input type="text" name="taikhoan" id="username" class="input-box input-box--username">
                        </div>

                        <div class="form--login__password space-top">
                            <label for="password"><i class="fa-solid fa-key"></i> Password</label>
                            <input type="password" name="matkhau" id="password" class="input-box input-box--username">
                            <a href="#" class="nav-link" style="align-self: flex-end;">Forgot your password?</a>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="submit-btn">Sign In</button>
                        </div>
                    </form>

                    <div class="row line-cut justify-content-center">
                        <div class="col-lg-5 d-flex justify-content-center">
                            <hr width="90%">
                        </div>
                        <div class="col-lg-1 d-flex justify-content-center">
                            <p>Or</p>
                        </div>
                        <div class="col-lg-5 d-flex justify-content-center">
                            <hr width="90%">
                        </div>
                    </div>

                    <a href="#" class="nav-link d-flex justify-content-center space-bot">
                        <div>
                            <img src="/imgs/icons/social-icons/gg-icon.png" height="28px" width="28px" alt="">
                        </div>
                        <p style="margin: 2px 0px 0px 12px;">Sign in with Google</p>
                    </a>
                </div>
            
            </section>

            <section class="col-lg-8 text-center row justify-content-center">
                <div class="logo-box hidden">
                    <img src="/imgs/logo-text.png" height="40px" alt="logo">
                </div>
            </section>

        </div>
    </main>
</body>

<script>
    // LOGIN PAGE EFFECT
    document.addEventListener("DOMContentLoaded", function() {
        const loginBox = document.querySelector('.login-box');
        const logoBox = document.querySelector('.logo-box');

        loginBox.classList.add('show');
        logoBox.classList.add('show');
    });
</script>
</html>