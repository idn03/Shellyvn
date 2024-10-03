<style>
    /* HEADER */
    #header {
        justify-content: space-between;
        margin: 30px 60px;
    }

    #header a,p {
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

        /* Nav List */
        .nav-list {
            text-shadow: 0px 4px 4px var(--shadow-color);
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
    <nav id="header__nav" class="col-lg-5 show">
        <ul class="nav-list d-flex">
            <li><a href="#" class="nav-link">Nav Item</a></li>
            <li><a href="#" class="nav-link">Nav Item</a></li>
            <li><a href="#" class="nav-link">Nav Item</a></li>
        </ul>
    </nav>

    <div id="header__extra" class="col-lg-3 d-flex show">
        <p class="extra__username"><i>Username</i></p>
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