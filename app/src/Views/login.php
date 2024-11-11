<?php
require_once 'E:/NHAT_DUY/Shelly/vendor/autoload.php';
require __DIR__ . '/../../config/google-login.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    var_dump($token);

    if (!isset($token['access_token'])) {
        die('Không thể lấy được token từ Google.');
    }

    $client->setAccessToken($token['access_token']);

    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email = $google_account_info->email;

    $_POST['taikhoan'] = $email;

    $url = 'https://37c5-2402-800-634c-2bd2-9844-a404-f02b-320b.ngrok-free.app/login';

    $data = array(
        'taikhoan' => $_POST['taikhoan'],
        'matkhau' => '',
    );

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    exit();
} else {
    $authUrl = $client->createAuthUrl();
}
?>

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
        transition: none;
    }
    h1 { color: #333;}

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
            height: 738px;
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
        .form-login {
            margin: 0px 48px;
        }

        .submit-btn {
            padding: 16px 60px;
        }
</style>

<body>
    <main id="login-page">
        <div class="row justify-content-center" style="width: 100%;">
            <section class="col-lg-5 space-top login-box hidden">
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

                    <a href="<?= $authUrl; ?>" class="nav-link d-flex justify-content-center">
                        <div>
                            <img src="/imgs/icons/social-icons/gg-icon.png" height="28px" width="28px" alt="">
                        </div>
                        <p style="margin: 2px 0px 0px 12px;">Sign in with Google</p>
                    </a>
                </div>
            </section>
        </div>
        <?php require __DIR__ . '/partials/toast.php' ?>
    </main>
</body>

<script>
    // LOGIN PAGE EFFECT
    document.addEventListener("DOMContentLoaded", function() {
        const loginBox = document.querySelector('.login-box');
        loginBox.classList.add('show');
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Kiểm tra xem email có được truyền trong URL không
        const urlParams = new URLSearchParams(window.location.search);
        const email = urlParams.get('taikhoan');
        
        if (email) {
            // Đặt email làm giá trị của trường taikhoan
            document.getElementById('username').value = email;

            // Tự động gửi biểu mẫu
            document.querySelector('form').submit();
        }
    });
</script>
</html>

<?php 
removeFromSession('status'); 
removeFromSession('form');
?>