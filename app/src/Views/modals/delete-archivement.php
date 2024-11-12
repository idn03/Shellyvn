<div class="modal fade" id="deleteArchivement" tabindex="-1" aria-labelledby="deleteArchivementLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteArchivementLabel"><i class="fa-solid fa-trophy"></i> Delete Archivement</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Archivement?</p>
            </div>
            <div class="modal-footer">
                <form action="profile/deleteArchive" method="post">
                    <input type="hidden" name="archiveSeq" id="archiveSeq">
                    <button type="submit" class="btn--delete">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>