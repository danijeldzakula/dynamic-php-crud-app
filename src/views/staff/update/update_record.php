<?php 
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('Location: ./index.php');
    /* includes */
    require('../../../classes/connection.php');
    require('../../../classes/user.php');
    /* check on click button update edit */
    if (!isset($_POST['update'])) header('location: ../../../../staff.php');
    /* get all value from input */
    if (isset($_POST['update'])) {
        $staff_position = (int)$_POST['position_update'];
        $staff_firstName = (string)$_POST['first_name'];
        $staff_lastName = (string)$_POST['last_name'];
        $staff_salary = (string)$_POST['payment'];
        $staff_email = (string)$_POST['email'];
        $staff_id = (int)$_POST['id'];

        /* set data on update */
        User::updateDatabase($staff_position, $staff_firstName, $staff_lastName, $staff_salary, $staff_email, $staff_id);    
    }
