<?php
    $displayConstraint = 'd-none';
    if (isAdmin()) $displayConstraint = '';
?>
<style>
    /* HEADER */
    #header {
        justify-content: space-between;
        margin: 30px 60px;
    }

    #header a,p,i {
        color: #F9F3CC;
    }
    
    @keyframes slideIn {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(-100%);
            opacity: 0;
        }
    }

    .show {
        animation: slideIn 0.5s forwards;
    }

    .hide {
        animation: slideOut 0.5s forwards;
    }

        /* Header Logo */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-12px);
            }
            60% {
                transform: translateY(-6px);
            }
        }
        #header__logo {
            animation: bounce 2s infinite;
        }

        /* Nav List */
        .nav-list {
            text-shadow: 0px 4px 4px var(--shadow-color);
            justify-content: start;
        }

        /* Extra */
        #header__extra {
            justify-content: space-around;
        }

        .extra__username {
            align-self: center;
        }

        .extra__log-out-btn {
            margin: 0;
        }

</style>

<header id="header" class="row">
    <div class="col-lg-1" style="z-index: 1;">
        <img id="header__logo" src="/imgs/shelly-logo.png" height="48px" alt="">
    </div>
    <nav id="header__nav" class="col-lg-7 show">
        <ul class="nav-list d-flex">
            <li><a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a></li>
            <li><a href="/subjects" class="nav-link"><i class="fa-solid fa-list"></i> Subjects List</a></li>
            <li class="<?= $displayConstraint ?>"><a href="#" class="nav-link"><i class="fa-solid fa-person"></i> Human Resource</a></li>
            <li><a href="/contact" class="nav-link"><i class="fa-solid fa-address-book"></i> Contact</a></li>
        </ul>
    </nav>

    <div id="header__extra" class="col-lg-3 d-flex show">
        <p class="extra__username"><i><?= $_SESSION['user']['taikhoan'] ?></i></p>
        <a href="/logout"><button class="extra__log-out-btn">Log out</button></a>
    </div>
</header>

<script>
    const logo = document.getElementById('header__logo');
    const nav = document.getElementById('header__nav');
    const extra = document.getElementById('header__extra');

    let isVisible = true;

    logo.addEventListener('click', () => {
        if (isVisible) {
            nav.classList.remove('show');
            nav.classList.add('hide');
            extra.classList.remove('show');
            extra.classList.add('hide');
        } else {
            nav.classList.remove('hide');
            nav.classList.add('show');
            extra.classList.remove('hide');
            extra.classList.add('show');
        }
        isVisible = !isVisible;
    });
</script>