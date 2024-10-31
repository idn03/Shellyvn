<style>
    .form__textarea {
        display: block;
        width: 436px;

        margin: 16px;
    }

    .choose-icon {
        margin: 16px;

        border-radius: var(--bo-s);
        box-shadow: inset 0px 2px 4px var(--shadow-color);
    }
    
    .choose-icon ul {
        flex-wrap: wrap;
        justify-content: center;
        padding-left: 0;
    }
    .choose-icon ul>li {
        padding: 16px;
        cursor: pointer;
        position: relative;
    }

    li.selected::after {
        content: "\f058";
        font-family: "Font Awesome 6 Free";
        font-size: 14px;
        font-weight: 900;
        color: #D7E5CA;

        position: absolute;
        bottom: 4px;
        right: 8px;
    }
</style>

<div class="modal fade" id="addArchivement" tabindex="-1" aria-labelledby="addArchivementLabel" aria-hidden="true">
    <div class="modal-dialog space-top">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addArchivementLabel"><i class="fa-solid fa-trophy"></i> Add Archivement</h4>
                <i class="fa-solid fa-xmark" data-bs-dismiss="modal"></i>
            </div>
            <form action="/profile/addArchivement" method="post">
                <div class="modal-body">
                    <div class="input-roup--customize choose-icon">
                        <label>Choose Icon</label>
                        <ul class="d-flex">
                            <li data-value="coral-reef.png"><img src="/imgs/icons/arch-icons/coral-reef.png" height="40px" alt=""></li>
                            <li data-value="crab.png"><img src="/imgs/icons/arch-icons/crab.png" height="40px" alt=""></li>
                            <li data-value="fossil.png"><img src="/imgs/icons/arch-icons/fossil.png" height="40px" alt=""></li>
                            <li data-value="sea-turtle.png"><img src="/imgs/icons/arch-icons/sea-turtle.png" height="40px" alt=""></li>
                            <li data-value="sea.png"><img src="/imgs/icons/arch-icons/sea.png" height="40px" alt=""></li>
                            <li data-value="shark.png"><img src="/imgs/icons/arch-icons/shark.png" height="40px" alt=""></li>
                            <li data-value="stingray.png"><img src="/imgs/icons/arch-icons/stingray.png" height="40px" alt=""></li>
                            <li data-value="whale.png"><img src="/imgs/icons/arch-icons/whale.png" height="40px" alt=""></li>
                        </ul>
                        <input type="hidden" name="icon" value="">
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="archivementname">Archivement Name</label>
                        <input type="text" name="tenthanhtuu" id="archivementname" class="form__input" required>
                    </div>

                    <div class="input-group--customize mt-4">
                        <label for="archivedate">Achievement Date</label>
                        <input type="date" name="ngaycap" id="archivedate" class="form__input" required>
                    </div>

                    <textarea 
                        type="text" 
                        class="form__textarea mt-4" 
                        name="mota" 
                        placeholder="Some description about it..." 
                        required
                    ></textarea>

                    <input type="hidden" name="taikhoan" value="<?= $user['taikhoan'] ?>">
                </div>
                <div class="modal-footer">
                    <button type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const listItems = document.querySelectorAll('.choose-icon li');
    const iconInput = document.querySelector('input[name="icon"]');

    listItems.forEach(item => {
        item.addEventListener('click', () => {
            listItems.forEach(li => li.classList.remove('selected'));
            item.classList.add('selected');

            const value = item.getAttribute('data-value');
            iconInput.value = value;
        });
    });
</script>