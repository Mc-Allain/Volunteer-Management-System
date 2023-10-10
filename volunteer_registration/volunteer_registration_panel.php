<?php
    require_once __DIR__ .'/../Components/inputs.php';
    require_once __DIR__ .'/../Components/alerts.php';

    function VolunteerRegistrationPanel() { ?>
        <div class='border !border-gray-100 shadow p-5 w-[400px]'>
            <div class='mt-3 pt-3 flex flex-col gap-2'>
                <?= ButtonStart(id: 'back_to_welcome', button_class: 'link'); ?>
                    <a href='../'>Go back</a>
                <?= ButtonEnd(); ?>
            </div>
        </div> <?php
    }
?>