<style>
    .form__radio {
        display: flex;
        justify-content: space-around;
    }
</style>

<!-- ADD STUDENT MODAL -->
<div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addStudentLabel"><i class="fa-solid fa-fish"></i> Add Student</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <form action="/subjects/<?= $subject['ma_mon']; ?>/addStudent" method="post">
                <div class="modal-body">
                    <div class="input-group--customize mt-4">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="sdt_hocvien" id="phone" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="name">Student Name</label>
                        <input type="text" name="tenhocvien" id="name" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="level">Education Level</label>
                        <input type="text" name="trinhdo_hocvien" id="level" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="gender">Gender:</label>
                        <div class="form__radio">
                            <div>
                                <input type="radio" id="gender--male" name="gioitinh_hocvien" value="1">
                                <label for="gender--male">Male</label>
                            </div>
    
                            <div>
                                <input type="radio" id="gender--female" name="gioitinh_hocvien" value="0">
                                <label for="gender--female">Female</label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>