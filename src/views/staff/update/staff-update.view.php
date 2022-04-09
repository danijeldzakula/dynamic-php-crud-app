<main class="main">
    <section class="section section-staff-update">
        <div class="container">
            <h1 class="font-thin">Update</h1>   
        </div>

        <div class="container">
            <form class="form form-update" action="./src/views/staff/update/update_record.php" method="POST">
                <input type="hidden" name="id" value="<?= $staff_update['zaposleni_id']; ?>" />

                <div class="form-group">
                    <label>Position:</label>
                    <select name="position_update" class="select-field text-capitalize" required>
                        <?php foreach($staff_position as $key => $value): ?>
                            <option name="<?= $value['position'] ?>" value="<?= $value['pozicije_id'] ?>">
                                <?= $value['position'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>                       
                </div>

                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="first_name" value="<?= $staff_update['staff_first_name']; ?>" placeholder="First Name:" class="input-field" required />
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="last_name" value="<?= $staff_update['staff_last_name']; ?>" placeholder="Last Name:" class="input-field" required />
                </div>
                
                <div class="form-group">
                    <label>Salary:</label>
                    <input type="text" name="payment" value="<?= $staff_update['staff_payment']; ?>" placeholder="Salary:" class="input-field" required />
                </div>    
                
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?= $staff_update['staff_email']; ?>" placeholder="Email:" class="input-field" required />
                </div>                    

                <button class="btn btn-success" type="submit" name="update">Update</button>
            </form>   
        </div>
    </section>
</main>