<?php
    $showToast = 'd-none';
    $status = '';
    $title = '';
    if (isset($_SESSION['status'])) {
        $showToast = '';

        if ($_SESSION['status'] == 'success') {
            $status = 'success';
            $title = 'Great';
        }

        if ($_SESSION['status'] == 'failed') {
            $status = 'error';
            $title = 'Error';
        }
    }
?>

<style>
    #toast {
        position: fixed;
        bottom: 8px;
        right: 24px;

        z-index: 1;
    }

    .toast-container {
        min-width: 240px;
        max-width: 300px;
        display: flex;
        background: #fff;
        
        margin: 8px 0;
        border-left: 6px solid;
        padding: 8px;
        
        border-radius: 4px;
        box-shadow: 2px 0 4px rgb(0 0 0 / 40%);
        transform: translateX(calc(100% + 8px));
        animation: slideInLeft 0.5s forwards;
    }
    @keyframes slideInLeft {
        form {
            transform: translateX(calc(100% + 8px));
        }
        to {
            transform: translateX(0);
        }
    }
    @keyframes fadeOut {
        to {
            opacity: 0;
        }
    }
    .toast i {
        font-size: 18px;
        align-self: center;
        padding: 0 12px;
    }

    .toast__close:hover {
        cursor: pointer;
        opacity: 0.5;
    }

    .toast__text {
        flex-grow: 1;
        color: var(--normal-color);

        padding: 0 16px;
    }
    .toast__text h3 { 
        color: var(--normal-color); 
        text-shadow: none;
    }


    .toast--error {
        border-color: #FF6464;
    }

    .toast--success {
        border-color: #D7E5CA;
    }
</style>

<div id="toast" class="<?= $showToast; ?>">
    <div class="d-flex toast-container toast--<?= $status ?>">
        <div class="toast__text">
            <h3><?= $title ?>!</h3>
            <?= htmlEscape($_SESSION['message']) ?>
        </div>
        <div class="toast__close">
            <i onclick="closeToast()" class="fa-solid fa-xmark" style="color: #333;"></i>
        </div>
    </div>
</div>

<script>
    function closeToast() {
        const toast = document.getElementById('toast');
        toast.style.animation = 'fadeOut 0.5s forwards';

        toast.onclick = function(event) {
            if (event.target.closest('.toast__close')) {
                main.removeChild(toast);
                clearTimeout(autoRemove);
            }
        };

        setTimeout(() => {
            toast.remove();
        }, 500);
    }

    const autoRemove = setTimeout(() => {
        closeToast();
    }, 5000);
</script>