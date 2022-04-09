<main class="main">
    <section class="section section-project">
        <!-- Header page title -->
        <div class="container">
            <div class="grid two-columns-full-auto items-center">
                <h1 class="font-thin">Projekti</h1>
                <div class="grid two-columns-full-auto gap-2">
                    <a href="./create-project.php" class="btn btn-primary">Create Project</a>
                    <a href="./create-task.php" class="btn btn-primary">Create Task</a>
                </div>
            </div>
            <hr class="hr" />
            <div class="grid two-columns-full-auto items-center">
                <h4 class="c-stone text-uppercase font-light">Sort By:</h4>
                <div class="sort_by">
                    <form class="form form-fillter grid two-columns-full-auto items-center gap-2" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">             
                        <div class="form-group">
                            <select name="fillter" class="select-field text-capitalize" required>
                                <option selected name="all" value="0">All</option>
                            </select>      
                        </div>

                        <div class="form-grouo">
                            <button class="btn btn-success" type="submit" name="sort_submit">Sort By</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
        <!-- Content of page (task) -->
        <div class="container">
            <div class="overflow-x-auto">
                <table>
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Task Description</th>
                            <th>Project</th>
                            <th>Task</th>
                            <th>Task Dedline</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach($get_project as $key => $value): ?>
                            <tr>
                                <td><?= $value['task_name']; ?></td>                          
                                <td><?= $value['task_description']; ?></td>                          
                                <td><?= $value['project_name']; ?></td>                          
                                <td>
                                    <span><?= $value['staff_first_name']; ?></span>
                                    <span><?= $value['staff_last_name']; ?></span>
                                </td>                          
                                <td>




                                    <?php if(strtotime($value['deadline']) >= $five_day && strtotime($value['deadline']) <= $ten_day): ?>    
                                        <span class="bg-green block-td">
                                            <?= $value['deadline']; ?>
                                        </span>
                                    <?php elseif(strtotime($value['deadline']) >= $three_day && strtotime($value['deadline']) < $five_day): ?>    
                                        <span class="bg-orange block-td">
                                            <?= $value['deadline']; ?>
                                        </span>
                                    <?php elseif(strtotime($value['deadline']) > strtotime("+1 day") && strtotime($value['deadline']) < $three_day): ?>    
                                        <span class="bg-red block-td">
                                            <?= $value['deadline']; ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="bg-red block-td">
                                            <?= $value['deadline']; ?>
                                        </span>                                        
                                    <?php endif; ?>
                                </td>                    
                            </tr>
                        <?php endforeach; ?> 

                    </tbody>
                </table>                
            </div>            
        </div>
    </section>
</main>