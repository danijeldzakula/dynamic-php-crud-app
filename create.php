<?php 
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('Location: ./index.php');
    /* page title */
    $title = 'Create';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/user.php');    
    /* get position data */
    $staff_position_create = User::getPositionData("SELECT pozicije_id, position FROM pozicije");
    /* check create submit */
    if (isset($_POST['create'])) {
        $staff_position = (int)$_POST['position_create'];
        $staff_firstName = (string)$_POST['first_name'];
        $staff_lastName = (string)$_POST['last_name'];
        $staff_salary = (float)$_POST['payment'];
        $staff_email = (string)$_POST['email'];
        /* set data on create user */
        User::setData($staff_position, $staff_firstName, $staff_lastName, $staff_salary, $staff_email);    
    }    
    /* includes */
    require('./src/includes/top.php'); 
    require('./src/includes/nav.php');
    require('./src/views/create/create.view.php');
    require('./src/includes/footer.php');
    require('./src/includes/bottom.php');


    

