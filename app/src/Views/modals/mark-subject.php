<style>
    .btn--marked {
        background-color: #F9F3CC;
        margin: 16px;
    }
    .btn--marked:hover {color: #F9F3CC;}
</style>

<div class="modal fade" id="markImportant" tabindex="-1" aria-labelledby="markImportantLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="markImportantLabel">Mark <?= htmlEscape($subject['ma_mon']) ?> as important</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to mark this Subject?</p>
            </div>
            <div class="modal-footer">
                <form action="subjects/<?= htmlEscape($subject['ma_mon']) ?>/markImportant" method="post">
                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon'] ?>">
                    <input type="hidden" name="ghim" id="noteSeq" value="1">
                    <button type="submit" class="btn--marked">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>