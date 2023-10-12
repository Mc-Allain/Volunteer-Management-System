<?php
    require_once __DIR__ .'/../Components/inputs.php';
    require_once __DIR__ .'/../Components/alerts.php';

    function VolunteerRegistrationPanel() { ?>
        <div class='border !border-gray-100 shadow p-5 w-[512px] h-[90%] overflow-y-auto'>
            <div class='pt-3 flex flex-col gap-4'>
                <div class='font-medium text-xl mb-1'>Volunteer Registration</div>

                <div class='flex flex-col items-center gap-4'>
                    <div class='flex gap-6 w-[384px]'>
                        <div class='flex flex-col gap-2 flex-grow'>
                            <div class='font-medium mb-1'>Personal Information</div>

                            <?= Input(type: 'text', id: 'last_name', name: 'last_name', placeholder: 'Last Name', icon: 'user'); ?>

                            <?= Input(type: 'text', id: 'first_name', name: 'first_name', placeholder: 'First Name', icon: 'user'); ?>
                        </div>
                    </div>

                    <div class='flex gap-6 w-[384px]'>
                        <div class='flex flex-col gap-2 flex-grow'>
                            <div class='font-medium mb-1'>Current Residential Address</div>

                            <?= Input(type: 'text', id: 'barangay', name: 'barangay', placeholder: 'Barangay', icon: 'house-user'); ?>

                            <?= Input(type: 'text', id: 'city', name: 'city', placeholder: 'City', icon: 'house-user'); ?>
                        </div>
                    </div>

                    <div class='flex gap-6 w-[384px]'>
                        <div class='flex flex-col gap-2 flex-grow'>
                            <div class='font-medium mb-1'>Contact Details</div>

                            <?= Input(type: 'tel', id: 'mobileNumber', name: 'mobileNumber', placeholder: 'Mobile Number', icon: 'phone'); ?>

                            <?= Input(type: 'tel', id: 'altMobileNumber', name: 'altMobileNumber', placeholder: 'Alt Mobile Number', icon: 'phone'); ?>

                            <?= Input(type: 'email', id: 'emailAddress', name: 'emailAddress', placeholder: 'Email Address', icon: 'envelope'); ?>
                        </div>
                    </div>

                    <!-- Behavior must be placed after the target elements -->
                    <?= InputBehavior(); ?>
                </div>
                
                <?= ButtonStart(id: 'back_to_welcome', button_class: 'link'); ?>
                    <a href='../'>Go back</a>
                <?= ButtonEnd(); ?>
            </div>
        </div> <?php
    }
?>