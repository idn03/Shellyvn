<style>
    .modal-body {margin-bottom: 0;}
    .user-info__detail {
        text-align: start;
    }
    .user-info__detail p {
        color: #333;
    }
</style>

<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteUserLabel">Delete User: <?= htmlEscape($user['taikhoan']) ?></h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this User?</p>

                <section class="text-center user-info">
                    <div class="row justify-content-center">
                        <h4 class="col-lg-6" style="align-content: center;"><?= htmlEscape($user['hoten']) ?></h4>
                        <div class="col-lg-6 user-info__detail">
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
            </div>
            <div class="modal-footer">
                <form action="employees/<?= $user['taikhoan'] ?>/delete" method="post">
                    <input type="hidden" name="taikhoan" value="<?= $user['taikhoan'] ?>">
                    <button type="submit" class="btn--delete" style="margin-top: 0;">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>