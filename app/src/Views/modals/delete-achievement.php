<div class="modal fade" id="deleteAchievement" tabindex="-1" aria-labelledby="deleteAchievementLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="deleteAchievementLabel"><i class="fa-solid fa-trophy"></i> Delete Achievement</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Achievement?</p>
            </div>
            <div class="modal-footer">
                <form action="profile/deleteAchieve" method="post">
                    <input type="hidden" name="achieveSeq" id="achieveSeq">
                    <button type="submit" class="btn--delete">DELETE</button>
                </form>
            </div>
        </div>
    </div>
</div>