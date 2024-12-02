<style>
    .modal-body__message {
        font-size: 14;
        opacity: 0.8;
    }
</style>
<div class="modal fade" id="deleteSubject" tabindex="-1" aria-labelledby="deleteSubjectLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteSubjectLabel">Delete Subject: <?= htmlEscape($subject['ma_mon']) ?></h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Subject?</p>
                <p class="tab modal-body__message">This could have affect on the Database because if deleting subject, it will delete notes, 
                    also deletes notes and students.
                </p>
            </div>
            <div class="modal-footer">
                <form action="subjects/<?= $subject['ma_mon'] ?>/delete" method="post">
                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon'] ?>">
                    <button type="submit" class="btn--delete">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>