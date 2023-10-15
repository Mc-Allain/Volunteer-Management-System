<?php
    require_once __DIR__ .'/Components/inputs.php';
    require_once __DIR__ .'/Components/alerts.php';

    function WelcomePanel() { ?>
        <div class='border !border-gray-100 shadow p-5 w-[400px]'>
            <div class='flex flex-col items-center gap-2'>
                <a href='index.php'>
                    <img src='./App/Assets/uploads/no-image-available.png' alt='VMS_Icon' class='h-28 object-contain' />
                </a>
                <div class='text-center font-medium uppercase text-[22px]'>Volunteer Management System</div>
            </div>

            <div class='mt-3 pt-3 border-t border-t-gray-300 flex flex-col gap-2'>
                <?= LinkStart(url: './volunteer_registration'); ?>
                    <?= Button(id: 'register', label: 'Become a Volunteer', button_class: 'primary'); ?>
                <?= LinkEnd(); ?>

                <?= LinkStart(url: './sign_in'); ?>
                    <?= Button(id: 'sign_in', label: 'Sign in as Admin', button_class: 'link-primary'); ?>
                <?= LinkEnd(); ?>
            </div>
        </div> <?php
    }
?>