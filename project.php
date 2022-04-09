<?php
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('location: ./index.php');
    /* page title */
    $title = 'Projekat';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/project-task.php');    
    /* includes */
    require('./src/includes/top.php'); 
    require('./src/includes/nav.php');
    /* time color */
    $today = strtotime("now");
    $three_day = strtotime("+3 day");
    $five_day = strtotime("+5 day");
    $ten_day = strtotime("+10 day");

    $get_project = ProjectTask::getProject("SELECT task_name, task_description, project_name, staff_first_name, staff_last_name, deadline FROM zadatak JOIN projekat ON zadatak.project_task_id = projekat.project_id JOIN zaposleni ON zadatak.worker_task_id = zaposleni.zaposleni_id GROUP BY task_name ORDER BY deadline ASC");
    /* place for content */    
    require('./src/views/project/project.view.php');
    require('./src/includes/footer.php');
    require('./src/includes/bottom.php');
