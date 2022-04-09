<?php
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('Location: ./index.php');
    /* page title */
    $title = 'Update';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/user.php');
    /* get id */
    $id = (int)$_GET['id'];
    /* get data */
    $staff_update = User::getupdateData("SELECT zaposleni_id, staff_first_name, staff_last_name, staff_payment, staff_email FROM zaposleni WHERE zaposleni_id", "$id");
    $staff_position = User::getPositionData("SELECT pozicije_id, position FROM pozicije");
    /* includes */
    require('./src/includes/top.php'); 
    require('./src/includes/nav.php');
    require('./src/views/staff/update/staff-update.view.php');
    require('./src/includes/footer.php');
    require('./src/includes/bottom.php');