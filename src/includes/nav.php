<?php 
    /* get user email */
    if(!isset($_SESSION['user_email'])) header('location: ./index.php');
    /* show hidden navigation link on (create.php) page */
    $create = basename($_SERVER['PHP_SELF']) === 'create.php'; 
?>

<nav class="nav">
    <ul class="list-items">
        <li>
            <a href="./dashboard.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) === 'dashboard.php' ? 'active' : " "); ?>">Naslovna</a>
        </li>
        <li>
            <a href="./staff.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) === 'staff.php' ? 'active' : " "); ?>">Zaposleni</a>
        </li>

        <li class="dropdown">
            <a href="./project.php" class="nav-link grid two-columns-full-auto items-center gap-4 <?= (basename($_SERVER['PHP_SELF']) === 'project.php' ? 'active' : " "); ?>">
                <span>Projekti</span>
                <span class="arrow-down" style="background-image: url('./src/assets/images/icon/arrow-down.png');"></span>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="./create-project.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) === 'create-project.php' ? 'active' : " "); ?>">Kreiraj projekat</a>
                </li> 
                <li>
                    <a href="./create-task.php" class="nav-link <?= (basename($_SERVER['PHP_SELF']) === 'create-task.php' ? 'active' : " "); ?>">Kreiraj zadatak</a>
                </li>                                
            </ul>
        </li>

        <?php if ($create): ?>
            <li>
                <a href='./create.php' class='nav-link <?= (basename($_SERVER['PHP_SELF']) === 'create.php' ? 'active' : " "); ?>'>Kreiranje</a>
            </li>
        <?php endif; ?>
    </ul>

    <ul class="list-items">
        <li>
            <span class="nav-link">
                <?= $_SESSION['user_email']; ?>
            </span>
        </li>
        <li>
            <a href="./logout.php" class="nav-link">Logout</a>
        </li>        
    </ul>    
</nav>