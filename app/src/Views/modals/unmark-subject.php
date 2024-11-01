<style>
    .btn--marked {
        background-color: #F9F3CC;
        margin: 16px;
    }
    .btn--marked:hover {color: #F9F3CC;}
</style>

<div class="modal fade" id="unmarkImportant" tabindex="-1" aria-labelledby="unmarkImportantLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="unmarkImportantLabel">Remove <?= htmlEscape($subject['ma_mon']) ?> from important</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unmark this Subject?</p>
            </div>
            <div class="modal-footer">
                <form action="subjects/<?= htmlEscape($subject['ma_mon']) ?>/unmarkImportant" method="post">
                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon'] ?>">
                    <input type="hidden" name="ghim" id="noteSeq" value="0">
                    <button type="submit" class="btn--marked">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>