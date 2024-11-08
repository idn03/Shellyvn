<!DOCTYPE html>
<html lang="en">
<?php require __DIR__ . '/../../partials/head.php' ?>

<style>
    /* Search Engine */
    .search-engine {
        display: flex;
        width: 600px;

        margin-top: 24px;
    }

        .search-engine__input {
            width: 90%;
            height: 60px;
            
            border: none;
            padding: 8px 16px;
            align-self: center;

            border-radius: 30px 0px 0px 30px;
        }

        .search-engine__btn {
            height: 60px;
            background-color: #fff;
            
            border: none;
            padding: 8px 24px;

            border-radius: 0px 30px 30px 0px;
            box-shadow: none;
        }
        .search-engine__btn i { 
            color: #333;
            transition: 0.5s all;
        }
        .search-engine__btn:hover i { color: #fff; }
    
    /* New-Subject Button */
    .add-employee {
        padding: 32px;
    }

        .add-employee__btn {
            background-color: #D2E0FB80;

            display: flex;
            justify-content: center;

            padding: 16px;

            border-radius: var(--bo-s);
            box-shadow: 0px 4px 4px var(--shadow-color);

            text-decoration: none;
        }
        .add-employee__btn:hover {
            cursor: pointer;
        }

        .add-employee__btn i {
            align-self: center;
            
            font-size: 24px;

            margin: 0;
        }

        .add-employee__content {margin: 18px 0px 0px 18px;}
        .add-employee__content p {color: #33333380;}
    
    /* Employees Table */
    thead th {font-size: 18px;}

    tbody tr {
        cursor: pointer;
        transition: 0.5s all;
    }
    tbody tr:hover {
        font-size: 18px;
        opacity: 0.8;
    }

    tr td {align-content: center;}
</style>

<body>
    <?php require __DIR__ . '/../../partials/header.php'; ?>

    <?php require __DIR__ . '/../../partials/spinner.php'; ?>

    <main id="top">
        <section class="path-tree">
            <h3>Path Tree:</h3>
            <a href="/" class="nav-link"><i class="fa-solid fa-house"></i> Home</a>
            <a href="/employees" class="nav-link tab"><i class="fa-solid fa-person"></i> Human Resource</a>
        </section>

        <h1 class="text-center"><i class="fa-solid fa-person"></i> Human Resource</h1>

        <form action="/employees" method="get" class="d-flex justify-content-center">
            <div class="search-engine">
                <input type="text" class="search-engine__input" name="search" placeholder="Type Employee's name here...">
                <button 
                    class="search-engine__btn" 
                    type="submit" 
                    id="button-addon2"
                ><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>

        <section class="add-employee <?= $displayConstraint ?>">
            <div class="d-flex">
                <a class="add-employee__btn" href="/employees/add">
                    <i class="fa-solid fa-plus"></i>
                </a>

                <div class="add-employee__content">
                    <h5>Add New Employee</h5>
                    <p class="tab">This feature is for Administrators only.</p>
                </div>
            </div>
        </div>

        <section class="space-top">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th class="text-center">Avatar</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Birth</th>
                        <th>Major</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="text-center">
                                    <img src="/imgs/avatars/<?= htmlEscape($user['avatar']) ?>" height="40px" alt="">
                                </td>
                                <td><?= htmlEscape($user['taikhoan']) ?></td>
                                <td><?= htmlEscape($user['hoten']) ?></td>
                                <td><?= $user['gioitinh'] == 1 ? 'Male' : 'Female'; ?></td>
                                <td><?= htmlEscape(formatDate($user['ngaysinh'])) ?></td>
                                <td><?= htmlEscape($user['chuyennganh']) ?></td>
                                <td class="text-center">
                                    <a href="/employees/<?= htmlEscape($user['taikhoan']) ?>" class="nav-link">
                                        <i class="fa-solid fa-user-pen" style="color: #333;"></i>
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
    
    <?php require __DIR__ . '/../../partials/footer.php'; ?>
</body>
</html>