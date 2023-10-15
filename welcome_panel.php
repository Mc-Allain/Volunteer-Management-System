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

            <div class='mt-3 pt-3 border-t border-t-gray-300 flex flex-col gap-2'> <?php
                if (isset($_GET['credentials'])) {
                    $get_credentials = $_GET['credentials'];

                    if ($get_credentials == 'incomplete') {
                        DangerAlert(content: 'Please enter your account');
                    } else if ($get_credentials == 'incorrect') {
                        DangerAlert(content: 'Incorrect username or password');
                    }
                } ?>
                
                <?= ButtonStart(id: 'register', button_class: 'primary'); ?>
                    <a href='./volunteer_registration'>Become a Volunteer</a>
                <?= ButtonEnd(); ?>
                <?= ButtonStart(id: 'sign_in', button_class: 'link-primary'); ?>
                    <a href='./sign_in'>Sign in as Admin</a>
                <?= ButtonEnd(); ?>
            </div>
        </div> <?php
    }
?>