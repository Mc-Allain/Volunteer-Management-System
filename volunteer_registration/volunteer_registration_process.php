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
            'last_name' => 'required|char_min:2|char_max:64',
            'first_name' => 'required|char_min:2|char_max:64',
            'barangay' => 'required|char_max:32',
            'city' => 'required|char_max:32',
            'mobile_number' => 'required|phone',
            'alt_mobile_number' => 'phone',
            'email_address' => 'required|email|char_max:64',
        ];

        $validation_results = validate($_POST, $validations);

        if ($validation_results['status'] == 'FAILED') {
            $_SESSION['validation_results'] = $validation_results;
            
            redirect("./index.php?status=failed");
            exit;
        }

        $payload['last_name'] = trim($_POST['last_name']);
        $payload['first_name'] = trim($_POST['first_name']);

        $payload['barangay'] = trim($_POST['barangay']);
        $payload['city'] = trim($_POST['city']);
        
        $payload['mobile_number'] = $_POST['mobile_number'];
        $payload['alt_mobile_number'] = $_POST['alt_mobile_number'];
        $payload['email_address'] = trim($_POST['email_address']);

        // $response = $Volunteer->create_volunteer($payload);
    }
?>
