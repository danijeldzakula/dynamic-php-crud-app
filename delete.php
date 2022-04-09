<?php 
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('Location: ./index.php');
    /* page title */
    $title = 'Delete';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/user.php');
    /* get id from url */
    $id = (int)$_GET['id'];
    /* get data and send sql params */
    User::deleteData("DELETE FROM zaposleni WHERE zaposleni_id = $id");