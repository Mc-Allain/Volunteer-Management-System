<?php
    require_once __DIR__ .'/../Components/containers.php';
    require_once __DIR__ .'/../Components/labels.php';
    require_once __DIR__ .'/../Components/inputs.php';

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

            $errors = [];

            if (isset($_GET['status']) && $_GET['status'] == 'failed') {
                if (isset($_SESSION['validation_results'])) {
                    $validation_results = $_SESSION['validation_results'];
                    $data = $validation_results['data'];
                    $errors = $validation_results['errors'];
                } else {
                    redirect("./index.php");
                }
            } else {
                unset($_SESSION['validation_results']);
                unset($_SESSION['volunteer_registration_status']);
            }
        ?>

        <div class='border !border-gray-100 shadow py-5 w-[512px] h-[90%]'>
            <div class='flex flex-col gap-4 h-full'>
                <div class='font-medium text-xl mb-1 mx-5'>Volunteer Registration</div>

                <form action='volunteer_registration_process.php' method='post' id='volunteer-registration-form' class='flex flex-col gap-4 flex-grow h-4'>

                    <?= RequiredNoteLabel(class: 'mx-5') ?>

                    <div class='flex flex-col items-center gap-4 flex-grow px-5 overflow-y-auto'>
                        <div class='flex gap-5 w-[384px]'>
                            <?= FormCategoryStart(name: 'Personal Information'); ?>
                                <?= FormInputGroupStart(); ?>
                                    <?= Label(name: 'last_name', value: 'Last Name', tag: 'required') ?>
                                    <?= Input(type: 'text', id: 'last_name', name: 'last_name', placeholder: 'Last Name', icon: 'user', value: $data['last_name'], max_length: 32, errors: $errors); ?>
                                    <?= ErrorLabel(name: 'last_name', errors: $errors); ?>
                                <?= FormInputGroupEnd(); ?>
                                

                                <?= FormInputGroupStart(); ?>
                                    <?= Label(name: 'first_name', value: 'First Name', tag: 'required') ?>
                                    <?= Input(type: 'text', id: 'first_name', name: 'first_name', placeholder: 'First Name', icon: 'user', value: $data['first_name'], max_length: 32, errors: $errors); ?>
                                    <?= ErrorLabel(name: 'first_name', errors: $errors); ?>
                                <?= FormInputGroupEnd(); ?>
                            <?= FormCategoryEnd(); ?>
                        </div>

                        <div class='flex gap-5 w-[384px]'>
                            <?= FormCategoryStart(name: 'Current Residential Address'); ?>
                                <?= FormInputGroupStart(); ?>
                                    <?= Label(name: 'barangay', value: 'Barangay', tag: 'required') ?>
                                    <?= Input(type: 'text', id: 'barangay', name: 'barangay', placeholder: 'Barangay', icon: 'house-user', value: $data['barangay'], max_length: 32, errors: $errors); ?>
                                    <?= ErrorLabel(name: 'barangay', errors: $errors); ?>
                                <?= FormInputGroupEnd(); ?>

                                <?= FormInputGroupStart(); ?>
                                    <?= Label(name: 'city', value: 'City', tag: 'required') ?>
                                    <?= Input(type: 'text', id: 'city', name: 'city', placeholder: 'City', icon: 'house-user', value: $data['city'], max_length: 32, errors: $errors); ?>
                                    <?= ErrorLabel(name: 'city', errors: $errors); ?>
                                <?= FormInputGroupEnd(); ?>
                            <?= FormCategoryEnd(); ?>
                        </div>

                        <div class='flex gap-5 w-[384px]'>
                            <?= FormCategoryStart(name: 'Contact Details'); ?>
                                <?= FormInputGroupStart(); ?>
                                    <?= Label(name: 'mobile_number', value: 'Mobile Number', tag: 'required') ?>
                                    <?= Input(type: 'tel', id: 'mobile_number', name: 'mobile_number', placeholder: 'Mobile Number', icon: 'phone', value: $data['mobile_number'], max_length: 11, errors: $errors); ?>
                                    <?= ErrorLabel(name: 'mobile_number', errors: $errors); ?>
                                <?= FormInputGroupEnd(); ?>

                                <?= FormInputGroupStart(); ?>
                                    <?= Label(name: 'alt_mobile_number', value: 'Alternative Mobile Number') ?>
                                    <?= Input(type: 'tel', id: 'alt_mobile_number', name: 'alt_mobile_number', placeholder: 'Alternative Mobile Number', icon: 'phone', value: $data['alt_mobile_number'], max_length: 11, errors: $errors); ?>
                                    <?= ErrorLabel(name: 'alt_mobile_number', errors: $errors); ?>
                                <?= FormInputGroupEnd(); ?>

                                <?= FormInputGroupStart(); ?>
                                    <?= Label(name: 'email_address', value: 'Email Address', tag: 'required') ?>
                                    <?= Input(type: 'email', id: 'email_address', name: 'email_address', placeholder: 'Email Address', icon: 'envelope', value: $data['email_address'], max_length: 32, errors: $errors); ?>
                                    <?= ErrorLabel(name: 'email_address', errors: $errors); ?>
                                <?= FormInputGroupEnd(); ?>
                            <?= FormCategoryEnd(); ?>
                        </div>

                        <!-- Behavior must be placed after the target elements -->
                        <?= InputBehavior(); ?>
                    </div>

                    <div class='flex justify-between px-5'>
                        <?= LinkStart(url: '../', class: '!w-fit'); ?>
                            <?= Button(id: 'cancel', label: 'Cancel', button_class: 'link-danger'); ?>
                        <?= LinkEnd(); ?>
                    
                        <?= Button(id: 'sign_in', type:'submit', label: 'Submit Registration', button_class: 'primary', class: '!w-fit'); ?>
                    </div>
                </form>
            </div>
        </div> <?php
    }
?>