<?php 
    /* check session */
    session_start();
    if (!isset($_SESSION['logged_in'])) header('Location: ./index.php');
    /* page title */
    $title = 'Zaposleni';
    /* connection from database */
    require('./src/classes/connection.php');
    require('./src/classes/user.php');
    /* get data */
    $staff_position_table = User::getPositionData("SELECT pozicije_id, position FROM pozicije");
    $db_staff = User::getData("SELECT zaposleni_id, staff_first_name, staff_last_name, staff_payment, position, staff_email FROM zaposleni JOIN pozicije ON zaposleni.staff_id = pozicije.pozicije_id ORDER BY staff_payment DESC");
    // fillter 
    if (isset($_POST['confirmation']) && isset($_POST['fillter'])) {
        // get info from select option  
        $fillter = (int)$_POST['fillter'];

        if ($fillter === 0) {
            // select filtered data
            $db_staff = User::getData("SELECT zaposleni_id, staff_first_name, staff_last_name, staff_payment, position, staff_email FROM zaposleni JOIN pozicije ON zaposleni.staff_id = pozicije.pozicije_id ORDER BY staff_payment DESC");
        } else {
            // select filtered data
            $db_staff = User::getData("SELECT zaposleni_id, staff_first_name, staff_last_name, staff_payment, position, staff_email FROM zaposleni JOIN pozicije ON zaposleni.staff_id = pozicije.pozicije_id WHERE zaposleni.staff_id = $fillter ORDER BY staff_payment DESC;");
        }
    }
    /* includes */
    require('./src/includes/top.php'); 
    require('./src/includes/nav.php');
    require('./src/views/staff/staff.view.php');
    require('./src/includes/footer.php');
    require('./src/includes/bottom.php');




    
