<?php
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('location: ./index.php');
    /* page title */
    $title = 'Kreiraj zadatak';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/project-task.php');

    /* includes */
    require('./src/includes/top.php'); 
    require('./src/includes/nav.php');

    /* get all employes from database */
    $get_employes = ProjectTask::getAllEmployes("SELECT zaposleni_id, staff_id, staff_first_name, staff_last_name FROM zaposleni");
    /* get all tasks from database */
    $get_tasks = ProjectTask::getAllTasks("SELECT project_id, project_name FROM projekat");

    if (isset($_POST['create_task'])) {
        $task_name = (string)$_POST['task_name'];
        $task_description = (string)$_POST['task_description'];
        $select_project = (int)$_POST['select_project'];
        $select_staff = (int)$_POST['select_staff'];
        $select_date = (string)$_POST['select_dedline'];
        // create tasks
        ProjectTask::createTask($task_name,$task_description, $select_project, $select_staff, $select_date);
    }

    /* place for content */
    require('./src/views/create-task/create-task.view.php');
    require('./src/includes/footer.php');
    require('./src/includes/bottom.php');
