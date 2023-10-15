<!DOCTYPE html>
<html lang="en">

<?php
    session_start();

    require_once '../header.php';

    require_once '../App/Helpers/Functions.php';
    require_once '../App/Helpers/Database.php';
    require_once '../App/Controllers/AuthController.php';
    require_once '../App/Controllers/VolunteerController.php';

    require_once '../Components/navigations.php';
    require_once '../Components/inputs.php';
    require_once '../Components/data_container.php';
    
    set_page_title('Volunteers');

    if (!isset($_SESSION['user_id'])) {
        redirect('../sign_in');
        exit;
    }

    $Database = new Database();
    $Auth = new AuthController($Database);

    $user = null;

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user = $Auth->get_by_id($user_id);
    }

    $Volunteer = new VolunteerController($Database);
    $volunteers = $Volunteer->get_volunteers();
    $volunteer_fields = parse_to_datatable_columns(['Id', 'Last Name', 'First Name', 'Barangay', 'City', 'Mobile No.', 'Alt Mobile No.', 'Email Address']);
    $volunteer_field_definitions = [
        ['target' => 0, 'visible' => false], 
        ['target' => 5, 'orderable' => false], 
        ['target' => 6, 'orderable' => false]
    ];
    $volunteer_field_sorting = [[1, 'asc']];
?>

<body>
    <?= Sidebar(); ?>
    <?= NavHeaderStart(title: 'Volunteers', class: 'justify-between items-center'); ?>
        <div class='text-sm border-l border-l-gray-300 h-full pl-3 flex items-center'>
            Hello, <?= $user['first_name'] ?>
        </div>
    <?= NavHeaderEnd(); ?>

    <?= NavContentStart(class: 'p-4 flex flex-col gap-3'); ?>
    
        <div class='flex gap-2'>
            <a href='../messaging/'>
                <?= Button(id: 'send_emergency_message', label: 'Send Emergency Message',  button_class: 'primary'); ?>
            </a>
        </div>

        <?= DataTables(
            id: 'volunteers-table', 
            class: 'cell-border compact hover order-column row-border stripe flex-1', 
            columns: $volunteer_fields, 
            data: $volunteers,
            column_definitions: $volunteer_field_definitions,
            column_sorting: $volunteer_field_sorting,
        ); ?>
    <?= NavContentEnd(); ?>

    <script>
    </script>
</body>
</html>