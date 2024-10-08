<?php 

?>

<style>
    #contact-list {

    }

    .contact-container {
        min-height: 120px;
        background-color: #fff;

        margin: 12px 20%;
        margin-bottom: 40px;
        padding: 16px;

        border-radius: var(--bo-m);
        box-shadow: 0px 4px 4px var(--shadow-color);
    }
    .contact-container h4 { margin-bottom: 16px; }
    .contact-container i,p {
        color: #333;
        margin-bottom: 4px;
    }
</style>

<section id="contact-list" class="space-top">
    <?php foreach ($contacts as $contact): ?>
        <div class="row contact-container">
            <h4>
                <?php
                    $title = '';
                    $icon = '';
                    switch ($contact['loailh']) {
                        case 'bug':
                            $title = 'System error';
                            $icon = '<i class="fa-solid fa-bug"></i>';
                        break;
                
                        case 'quote':
                            $title = 'Question';
                            $icon = '<i class="fa-solid fa-question"></i>';
                        break;
                
                        case 'suggest':
                            $title = 'Suggestion';
                            $icon = '<i class="fa-solid fa-lightbulb"></i>';
                        break;
                
                        case 'other':
                            $title = 'Other Issue';
                            $icon = '<i class="fa-solid fa-fish"></i>';
                        break;
                    }
                    echo $icon . htmlEscape(' - ' . $title);  
                ?>
            </h4>
            <p>From: < <?= htmlEscape($contact['taikhoan']); ?> ></p>
            <p class="text-blur"><?= htmlEscape(formatDate($contact['ngaytaolh'])); ?></p>
            <p><?= htmlEscape($contact['noidunglh']); ?></p>
        </div>
    <?php endforeach; ?>
</section>