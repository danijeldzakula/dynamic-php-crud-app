<?php 
    /* check session */
    session_start();
    /* session destroy */
    session_destroy();
    /* location redirect to index page */
    header("location: ./index.php");