<?php
    session_start();

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/VolunteerController.php';

    $Database = new Database();
    $Volunteer = new VolunteerController($Database);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        unset($_SESSION['validation_results']);

        $validations = [
            'last_name' => 'required|char_min:2|char_max:32',
            'first_name' => 'required|char_min:2|char_max:32',
            'barangay' => 'required|char_max:32',
            'city' => 'required|char_max:32',
            'mobile_number' => 'required|phone',
            'alt_mobile_number' => 'phone',
            'email_address' => 'required|email|char_max:32',
        ];

        $field_labels = [
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'barangay' => 'Barangay',
            'city' => 'City',
            'mobile_number' => 'Mobile Number',
            'alt_mobile_number' => 'Alternative Mobile Number',
            'email_address' => 'Email Address',
        ];

        $validation_results = validate($_POST, $validations, field_labels: $field_labels);

        if ($validation_results['status'] == 'FAILED') {
            $_SESSION['validation_results'] = $validation_results;
            
            redirect("./index.php?status=failed");
            exit;
        }

        $payload['last_name'] = ucwords(strtolower(trim($_POST['last_name'])));
        $payload['first_name'] = ucwords(strtolower(trim($_POST['first_name'])));

        $payload['barangay'] = ucwords(trim($_POST['barangay']));
        $payload['city'] = ucwords(trim($_POST['city']));
        
        $payload['mobile_number'] = $_POST['mobile_number'];
        $payload['alt_mobile_number'] = $_POST['alt_mobile_number'];
        $payload['email_address'] = strtolower(trim($_POST['email_address']));

        $response = $Volunteer->create_volunteer($payload);
            
        $_SESSION['volunteer_registration_status'] = 'success';

        redirect("./index.php?status=success");
        exit;
    }
?>
