<?php
    require_once __DIR__ .'/../Components/inputs.php';
    require_once __DIR__ .'/../Components/alerts.php';

    function SignInPanel() { ?>
        <div class='border !border-gray-100 shadow p-5 w-[400px]'>
            <div class='flex flex-col items-center gap-2'>
                <a href='index.php'>
                    <img src='../App/Assets/uploads/no-image-available.png' alt='VMS_Icon' class='h-28 object-contain' />
                </a>
                <div class='text-center font-medium uppercase text-[22px]'>Volunteer Management System</div>
            </div>

            <div class='mt-3 pt-3 border-t border-t-gray-300 flex flex-col gap-3'> <?php
                if (isset($_GET['credentials'])) {
                    $get_credentials = $_GET['credentials'];

                    if ($get_credentials == 'incomplete') {
                        DangerAlert(content: 'Please enter your account');
                    } else if ($get_credentials == 'incorrect') {
                        DangerAlert(content: 'Incorrect username or password');
                    }
                } ?>

                <form action='sign_in_process.php' method='post' id='sign-in-form' class='flex flex-col gap-2'>

                    <?= Input(type: 'text', id: 'username', name: 'username', placeholder: 'Username', icon: 'user'); ?>
                    
                    <?= Input(type: 'password', id: 'password', name: 'password', placeholder: 'Password', icon: 'lock'); ?>

                    <!-- Behavior must be placed after the target elements -->
                    <?= InputBehavior(); ?>

                    <?= Checkbox(id: 'remember', name: 'remember', label: 'Remember Me'); ?>
                    
                    <?= Button(id: 'sign_in', type:'submit', label: 'Sign in', button_class: 'primary'); ?>
                    
                    <?= LinkStart(url: '../'); ?>
                        <?= Button(id: 'cancel', label: 'Cancel', button_class: 'link'); ?>
                    <?= LinkEnd(); ?>
                </form>
            </div>
        </div> <?php
    }
?>