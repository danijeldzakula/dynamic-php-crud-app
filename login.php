<?php 
    /* check session */
    session_start();
    /* controller */
    require('./src/controller/controller.php');
    /* login controller */
    LoginController::getLogin();
    /* login view */
    require('./src/views/login/login.view.php');