<style>
    .form__textarea {
        width: 100%;
        margin-top: 0px;
    }
</style>

<!-- ADD NOTE MODAL -->
<div class="modal fade" id="addNote" tabindex="-1" aria-labelledby="addNoteLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addNoteLabel"><i class="fa-solid fa-note-sticky"></i> Add Note</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <form action="/addNote" method="post">
                <div class="modal-body">
                    <textarea 
                        type="text" 
                        class="form__textarea" 
                        name="noidung_ghichu" 
                        placeholder="What do you want to note?" 
                        required
                    ></textarea>

                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- DELETE NOTE MODAL -->
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
                    <input type="hidden" name="stt_ghichu" id="delete_noteSeq">
                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon'] ?>">
                    <button type="submit" class="btn--delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>