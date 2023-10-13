<?php
    session_start();

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/VolunteerController.php';

    $Database = new Database();
    $Volunteer = new VolunteerController($Database);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // if (empty($_POST['username']) || empty($_POST['password'])) {
        //     redirect('./index.php?credentials=incomplete');
        //     exit;
        // }

        $payload['last_name'] = $_POST['last_name'];
        $payload['first_name'] = $_POST['first_name'];

        $payload['barangay'] = $_POST['barangay'];
        $payload['city'] = $_POST['city'];
        
        $payload['mobile_number'] = $_POST['mobile_number'];
        $payload['alt_mobile_number'] = $_POST['alt_mobile_number'];
        $payload['email_address'] = $_POST['email_address'];

        $response = $Volunteer->create_volunteer($payload);
    }
?>
