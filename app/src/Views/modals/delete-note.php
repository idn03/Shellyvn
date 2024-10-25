<div class="modal fade" id="deleteNote" tabindex="-1" aria-labelledby="deleteNoteLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteNoteLabel"><i class="fa-solid fa-note-sticky"></i> Delete Note</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this note?</p>
            </div>
            <div class="modal-footer">
                <form action="/deleteNote" method="post">
                    <input type="hidden" name="stt_ghichu" id="noteSeq">
                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon'] ?>">
                    <button type="submit" class="btn--delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>