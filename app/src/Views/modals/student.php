<style>
    .form__radio {
        display: flex;
        justify-content: space-around;
    }

    .score-list {
        flex-wrap: wrap;
        justify-content: center;

        margin-top: 8px;
        padding-left: 0;
    }

    .score-list li {
        font-weight: 600;
        font-size: 20px;

        cursor: pointer;
        transition: all 0.5s;
    }

    .selected {
        border-radius: var(--bo-s);
        box-shadow: inset 0px 2px 8px var(--shadow-color);
    }

    .delete-user {
        position: fixed;
        top: 800px;
        right: calc(30% - 9.6px);

        border-radius: 0px 30px 30px 0px;
    }
    .delete-user i {margin-right: 0;}
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
                        <input type="text" name="sdt_hocvien" id="add_phone" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="name">Student Name</label>
                        <input type="text" name="tenhocvien" id="add_name" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="level">Education Level</label>
                        <input type="text" name="trinhdo_hocvien" id="add_level" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="gender">Gender:</label>
                        <div class="form__radio">
                            <div>
                                <input type="radio" id="add_gender--male" name="gioitinh_hocvien" value="1">
                                <label for="gender--male">Male</label>
                            </div>
    
                            <div>
                                <input type="radio" id="add_gender--female" name="gioitinh_hocvien" value="0">
                                <label for="gender--female">Female</label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- EDIT & DELETE STUDENT MODAL -->
<div class="modal fade" id="editStudent" tabindex="-1" aria-labelledby="editStudentLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="editStudentLabel"><i class="fa-solid fa-fish"></i> Edit Student</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <form action="/subjects/<?= $subject['ma_mon']; ?>/editStudent" method="post">
                <div class="modal-body">
                    <div class="input-group--customize mt-4">
                        <label>Student Scroce</label>
                        <ul class="d-flex text-center score-list">
                            <li data-value="1"><img src="/imgs/icons/angry.png" height="40px" alt=""> 1</li>
                            <li data-value="2"><div style="height: 40px;">-</div> 2</li>
                            <li data-value="3"><div style="height: 40px;">-</div> 3</li>
                            <li data-value="4"><img src="/imgs/icons/cat.png" height="40px" alt=""> 4</li>
                            <li data-value="5"><div style="height: 40px;">-</div> 5</li>
                            <li data-value="6"><div style="height: 40px;">-</div> 6</li>
                            <li data-value="7"><img src="/imgs/icons/clover.png" height="40px" alt=""> 7</li>
                            <li data-value="8"><div style="height: 40px;">-</div> 8</li>
                            <li data-value="9"><div style="height: 40px;">-</div> 9</li>
                            <li data-value="10"><img src="/imgs/icons/muscle.png" height="40px" alt=""> 10</li>
                        </ul>

                        <input type="hidden" name="diem" value="">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="sdt_hocvien" id="edit_phone" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="name">Student Name</label>
                        <input type="text" name="tenhocvien" id="edit_name" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="level">Education Level</label>
                        <input type="text" name="trinhdo_hocvien" id="edit_level" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="gender">Gender:</label>
                        <div class="form__radio">
                            <div>
                                <input type="radio" id="edit_gender--male" name="gioitinh_hocvien" value="1">
                                <label for="gender--male">Male</label>
                            </div>
    
                            <div>
                                <input type="radio" id="edit_gender--female" name="gioitinh_hocvien" value="0">
                                <label for="gender--female">Female</label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit">SAVE</button>
                </div>
            </form>
            <form action="/subjects/<?= htmlEscape($subject['ma_mon']); ?>/deleteStudent" method="post">
                <input type="hidden" name="sdt_hocvien" id="delete_phone" class="form__input" required>
                <input type="hidden" name="ma_mon" value="<?= $subject['ma_mon']; ?>">

                <button class="btn--delete delete-user"><i class="fa-solid fa-trash-can"></i></button>
            </form>
        </div>
    </div>
</div>