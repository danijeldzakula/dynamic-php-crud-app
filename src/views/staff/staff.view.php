<main class="main">
    <section class="section section-staff">
        <!-- Header Page Title and Fillter option -->
        <div class="container">
            <div class="grid two-columns-full-auto items-center">
                <h1 class="font-thin">Zaposleni</h1>
                <a href="./create.php" class="btn btn-primary">Create User</a>
            </div>
            <hr class="hr" />
            <div class="grid two-columns-full-auto items-center">
                <h4 class="c-stone text-uppercase font-light">Fillter:</h4>
                <div class="fillter">
                    <form class="form form-fillter grid two-columns-full-auto items-center gap-2" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">             
                        <div class="form-group">
                            <select name="fillter" class="select-field text-capitalize" required>
                                <option selected name="all" value="0">All</option>
                                <?php foreach($staff_position_table as $key => $value): ?>
                                    <option name="<?= $value['position'] ?>" value="<?= $value['pozicije_id'] ?>">
                                        <?= $value['position'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>      
                        </div>

                        <div class="form-grouo">
                            <button class="btn btn-success" type="submit" name="confirmation">Fillter</button>
                        </div>
                    </form>  
                </div>
            </div>
        </div>

        <!-- Content of page (user view) -->
        <div class="container">
            <div class="overflow-x-auto">
                <table>
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Salary</th>
                            <th>Position</th>
                            <th>Email</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($db_staff as $key => $value): ?>
                            <tr>
                                <td><?= $value['zaposleni_id']; ?></td>
                                <td><?= $value['staff_first_name']; ?></td>
                                <td><?= $value['staff_last_name']; ?></td>
                                <td><?= $value['staff_payment']; ?></td>
                                <td class="text-capitalize"><?= $value['position']; ?></td>
                                <td>
                                    <a class="text-decoration-none c-blue" href="mailto:<?= $value['staff_email']; ?>"><?= $value['staff_email']; ?></a>
                                </td>
                                <td>
                                    <a href="./update.php?id=<?= $value['zaposleni_id']; ?>" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <a href="./delete.php?id=<?= $value['zaposleni_id']; ?>" class="btn btn-danger">Delete</a>
                                </td>                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>                
            </div>
    </section>
</main>