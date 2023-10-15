<?php
    require_once __DIR__ .'/../Components/alerts.php';

    function VolunteerRegistrationSuccessPanel() { ?>
        
        <?php
            if (
                !(
                    isset($_SESSION['volunteer_registration_status']) && 
                    $_SESSION['volunteer_registration_status'] == 'success'
                )
            ) {
                redirect("./index.php");              
            }
        ?>

        <div class='border !border-gray-100 shadow py-4 w-[512px] h-[256px]'>
            <div class='flex flex-col justify-evenly h-full'>
                <div class='font-medium text-xl mx-5'>Volunteer Registration</div>

                <div class='flex flex-col justify-evenly items-center flex-grow px-5'>
                    <?= SuccessAlert(content: 'You\'ve successfully registered a volunteer.', class: 'w-full'); ?>

                    <?= ButtonStart(id: 'done', button_class: 'primary', class: 'w-fit'); ?>
                        <a href='../'>Done</a>
                    <?= ButtonEnd(); ?>
                </div>
            </div>
        </div> <?php
    }
?>