<?php   
    $datetime = new DateTime();
    $timezone = new DateTimeZone('Europe/Bucharest');
    $datetime->setTimezone($timezone);
    $formatDate = $datetime->format('Y-m-d');
?>

<main class="main">
    <section class="section section-create-task">
        <!-- Header page title -->
        <div class="container">
            <h1 class="font-thin">Kreiraj zadatak</h1>   
        </div>
        <!-- Content of page (create-task) -->
        <div class="container">
            <form class="form form-update" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label>Task Name:</label>
                    <input type="text" name="task_name" placeholder="Task Name:" class="input-field" required />
                </div>
                <div class="form-group">
                    <label>Task Description:</label>
                    <textarea name="task_description" rows="8" class="textarea-field"></textarea>
                </div>

                <div class="form-group">
                    <label>Project:</label>
                    <select name="select_project" class="select-field text-capitalize" required>
                        <?php foreach($get_tasks as $key => $value): ?>
                            <option name="<?= $value['project_id']; ?>" value="<?= $value['project_id']; ?>">
                                <?= $value['project_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>                    
                </div>  
                
                <div class="form-group">
                    <label>Staff:</label>
                    <select name="select_staff" class="select-field text-capitalize" required>
                        <?php foreach($get_employes as $key => $value): ?>
                            <option name="<?= $value['staff_id'] ?>" value="<?= $value['zaposleni_id'] ?>">
                                <?= $value['staff_first_name']; ?>
                                <?= $value['staff_last_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>         
                
                <div class="form-group">
                    <label>Dedline:</label>
                    <input name="select_dedline" type="date" class="select-field text-capitalize" value="<?= $formatDate; ?>" required>
                </div>                         
                <button class="btn btn-success" type="submit" name="create_task">Create Task</button>
            </form>   
        </div>
    </section>
</main>