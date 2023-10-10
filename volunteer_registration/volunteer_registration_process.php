<?php
    session_start();

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/AuthController.php';

    $Database = new Database();
    $Auth = new AuthController($Database);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            redirect('./index.php?credentials=incomplete');
            exit;
        }

        $payload['username'] = $_POST['username'];
        $payload['password'] = $_POST['password'];

        $response = $Auth->login($payload);
        
        if ($response['successful'] == true) {
            $user_id = $response['data']['id'];

            if (isset($_POST["remember"])) {
                $cookie_value = generate_random_string(8); // Generate a random value for the cookie
                setcookie("remember_me_cookie", $cookie_value, time() + (60 * 60 * 24 * 7), "/"); // Cookie expiration: 7 days

                // Store the cookie value in the database along with the user ID for future validation
                $payload = [
                    'user_id' => $user_id, 
                    'cookie_value' => $cookie_value,
                ];
                $response = $Auth->store_auth_cookie($payload);
            }

            $_SESSION['user_id'] = $user_id;
            redirect('../home');
        } else {
            redirect('./index.php?credentials=incorrect');
        }
        exit;
    }
?>
