<?php
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('location: ./index.php');
    /* page title */
    $title = 'Naslovna';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/user.php');
    /* get data */
    /* two table get data info */
    $db_info = User::joinTable();
    /* get salary data from table (zaposleni) */
    $db_staff = User::getData("SELECT staff_payment FROM zaposleni ORDER BY zaposleni_id ASC");
    /* includes */
    require('./src/includes/top.php'); 
    require('./src/includes/nav.php');
    require('./src/views/dashboard/dashboard.view.php');
    require('./src/includes/footer.php');
    require('./src/includes/bottom.php');

