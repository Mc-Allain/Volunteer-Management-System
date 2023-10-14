<?php
    require_once __DIR__ .'/../Components/labels.php';
    require_once __DIR__ .'/../Components/inputs.php';
    require_once __DIR__ .'/../Components/alerts.php';

    function VolunteerRegistrationPanel() { ?>

        <?php
            $data = [
                'last_name' => '',
                'first_name' => '',

                'barangay' => '',
                'city' => '',

                'mobile_number' => '',
                'alt_mobile_number' => '',
                'email_address' => '',
            ];

            if (isset($_SESSION['validation_results']) && isset($_GET['status']) && $_GET['status'] == 'failed') {
                $validation_results = $_SESSION['validation_results'];
                $data = $validation_results['data'];
            }
        ?>

        <div class='border !border-gray-100 shadow py-5 w-[512px] h-[90%]'>
            <div class='flex flex-col gap-4 h-full'>
                <div class='font-medium text-xl mb-1 mx-5'>Volunteer Registration</div>

                <form action='volunteer_registration_process.php' method='post' id='volunteer-registration-form' class='flex flex-col gap-4 flex-grow h-4'>
                    <div class='flex flex-col items-center gap-4 px-5 flex-grow overflow-y-auto'>
                        <div class='flex gap-6 w-[384px]'>
                            <div class='flex flex-col gap-2 flex-grow'>
                                <div class='font-medium mb-1'>Personal Information</div>
                                
                                <?= Label(name: 'last_name', value: 'Last Name', tag: 'required') ?>
                                <?= Input(type: 'text', id: 'last_name', name: 'last_name', placeholder: 'Last Name', icon: 'user', value: $data['last_name']); ?>

                                <?= Label(name: 'first_name', value: 'First Name', tag: 'required') ?>
                                <?= Input(type: 'text', id: 'first_name', name: 'first_name', placeholder: 'First Name', icon: 'user', value: $data['first_name']); ?>
                            </div>
                        </div>

                        <div class='flex gap-6 w-[384px]'>
                            <div class='flex flex-col gap-2 flex-grow'>
                                <div class='font-medium mb-1'>Current Residential Address</div>

                                <?= Label(name: 'barangay', value: 'Barangay', tag: 'required') ?>
                                <?= Input(type: 'text', id: 'barangay', name: 'barangay', placeholder: 'Barangay', icon: 'house-user', value: $data['barangay']); ?>

                                <?= Label(name: 'city', value: 'City', tag: 'required') ?>
                                <?= Input(type: 'text', id: 'city', name: 'city', placeholder: 'City', icon: 'house-user', value: $data['city']); ?>
                            </div>
                        </div>

                        <div class='flex gap-6 w-[384px]'>
                            <div class='flex flex-col gap-2 flex-grow'>
                                <div class='font-medium mb-1'>Contact Details</div>

                                <?= Label(name: 'mobile_number', value: 'Mobile Number', tag: 'required') ?>
                                <?= Input(type: 'tel', id: 'mobile_number', name: 'mobile_number', placeholder: 'Mobile Number', icon: 'phone', value: $data['mobile_number']); ?>

                                <?= Label(name: 'alt_mobile_number', value: 'Alternative Mobile Number') ?>
                                <?= Input(type: 'tel', id: 'alt_mobile_number', name: 'alt_mobile_number', placeholder: 'Alternative Mobile Number', icon: 'phone', value: $data['alt_mobile_number']); ?>

                                <?= Label(name: 'email_address', value: 'Email Address', tag: 'required') ?>
                                <?= Input(type: 'email', id: 'email_address', name: 'email_address', placeholder: 'Email Address', icon: 'envelope', value: $data['email_address']); ?>
                            </div>
                        </div>

                        <!-- Behavior must be placed after the target elements -->
                        <?= InputBehavior(); ?>
                    </div>

                    <div class='flex justify-between px-5'>
                        <?= ButtonStart(id: 'back_to_welcome', button_class: 'link-danger'); ?>
                            <a href='../'>Cancel</a>
                        <?= ButtonEnd(); ?>
                    
                        <?= Button(id: 'sign_in', type:'submit', label: 'Submit Registration', button_class: 'primary'); ?>
                    </div>
                </form>
            </div>
        </div> <?php
    }
?>