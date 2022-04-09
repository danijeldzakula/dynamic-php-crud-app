<?php
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('location: ./index.php');
    /* page title */
    $title = 'Kreiraj projekat';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/project-task.php');
    /* includes */
    require('./src/includes/top.php'); 
    require('./src/includes/nav.php');
    if (isset($_POST['create_project'])) {
        $project_name = $_POST['project_name'];
        $project_description = $_POST['project_description'];
        ProjectTask::createProject($project_name, $project_description);
    }
    /* place for content */
    require('./src/views/create-project/create-project.view.php');
    require('./src/includes/footer.php');
    require('./src/includes/bottom.php');
