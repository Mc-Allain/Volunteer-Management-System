<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 
        date_default_timezone_set('Asia/Manila');
        
        ob_start();
        
        function set_page_title($title = '') {
            if (!empty($title)) {
                $title = $title.' | ';
            }

            echo '<title>'. $title .'Volunteer Management System</title>';
        }

        ob_end_flush();
    ?>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@latest/css/all.min.css">

    <!--- bootstrap --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!--- tailwind --->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- custom css -->
    <link rel="stylesheet" href="../App/Assets/css/output.css">
</head>