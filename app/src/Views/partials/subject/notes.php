<style>
    #notes {
        <?php if (count($notes) == 0) echo 'justify-content: center;'; ?>
        margin: 12px 24px;
        padding: 24px;

        border-radius: var(--bo-l);
        box-shadow: inset 0px 4px 4px var(--shadow-color);
    }

        .img--clip {
            position: absolute;
            right: 12px;
            top: -20px;

            transition: transform 0.8s ease-out, opacity 0.8s ease-out;
        }

        .container--note {
            position: relative;
            min-height: 120px;
            background-color: #fff;

            padding: 8px;
            margin: 12px 24px;

            border-radius: var(--bo-m);
            box-shadow: 0px 4px 4px var(--shadow-color);

            cursor: pointer;
        }

            .note__circles {
                height: 24px;
                width: 24px;
                background-color: #8EACCD;

                margin: 24px 4px;

                border-radius: 50%;
                box-shadow: inset 0px 4px 4px var(--shadow-color);
            }

            .note__content {
                max-width: 240px;

                padding: 24px 16px;
            }
            .note__content p {color: #333; font-size: 18px;}
</style>

<div class="d-flex space-top" style="justify-content: space-between;">
    <h1>NOTES (<?= count($notes) ?>/3)</h1>
    <button 
        class="btn--add-note <?= $canAddNote ?>" 
        data-bs-toggle="modal" 
        data-bs-target="#addNote"
        <?= $disableBtn ?>
    >
        <i class="fa-solid fa-plus"></i> 
        Add note
    </button>
</div>

<div id="notes" class="d-flex">
    <?php foreach ($notes as $note): ?>
    <div 
        class="container--note" 
        <?= $canDeleteNote ?> 
        data-value="<?= $note['stt_ghichu']; ?>" 
        onclick="setNoteSeq(this)"
    >

        <img src="/imgs/icons/clip.png" class="img--clip" height="48px" alt="">
        <div class="d-flex">
            <div>
                <div class="note__circles"></div>
                <div class="note__circles"></div>
                <div class="note__circles"></div>
                <div class="note__circles"></div>
            </div>

            <div class="note__content">
                <p><?= htmlEscape($note['noidung_ghichu']); ?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php if (count($notes) == 0): ?>
        <?php require __DIR__ . '/../partials/empty-state.php'; ?>
    <?php endif ?>
</div>