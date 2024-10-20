<?php
    $showToast = 'd-none';
    if (isset($_SESSION['status']) && ($_SESSION['status'] === 'failed')) {
        $showToast = '';
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
        display: flex;
        background: #fff;
        
        margin: 8px 0;
        border-left: 4px solid;
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
        color: #888;

        padding: 0 16px;
    }
    .toast__text h3 { 
        color: #333; 
        text-shadow: none;
    }


    .toast--error {
        border-color: #FF6464;
    }
</style>

<div id="toast" class="<?= $showToast; ?>">
    <div class="d-flex toast-container toast--error">
        <div class="toast__text">
            <h3>Error!!!</h3>
            <?= htmlEscape($_SESSION['message']) ?>
        </div>
        <div class="toast__close">
            <i onclick="closeToast" class="fa-solid fa-xmark"></i>
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