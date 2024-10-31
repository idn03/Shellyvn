<?php

$contactPath = 'contact-teacher.php';
if (isAdmin()) { $contactPath = 'contact-admin.php'; }

?>
<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../partials/head.php'; ?>

<style>
    .user-info__detail {
        text-align: start;
    }
    .user-info__detail p {
        color: #333;
    }
</style>

<body>
    <?php require __DIR__ . '/../partials/header.php'; ?>

    <?php require __DIR__ . '/../partials/spinner.php'; ?>
    <main>
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/contact" class="nav-link tab"><i class="fa-solid fa-address-book"></i> Contact</a>
        </section>

        <h1 class="text-center"><i class="fa-solid fa-address-book"></i> Contact</h1>

        <section class="text-center user-info">
            
            <div class="row justify-content-center space-top">
                <h4 class="col-lg-3" style="align-content: center;"><?= htmlEscape($user['hoten']) ?></h4>
                <div class="col-lg-3 user-info__detail">
                    <p>Gender: &nbsp; 
                        <?php 
                            if($user['gioitinh'] == 1) echo '<i class="fa-solid fa-mars" style="color: #333;"></i> Male'; 
                            else echo '<i class="fa-solid fa-venus" style="color: #333;"></i> Female';
                        ?>
                    </p>
                    <p>Birth: &nbsp; <?= htmlEscape(formatDate($user['ngaysinh'])) ?></p>
                    <p>Major: &nbsp; <?= htmlEscape($user['chuyennganh']) ?></p>
                </div>
            </div>
        </section>

        <?php require __DIR__ . '/interfaces/' . $contactPath; ?>
    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>
</body>
</html>