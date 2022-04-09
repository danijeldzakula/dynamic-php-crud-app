<main class="main">
    <section class="section section-create">
        <!-- Header Page Title -->
        <div class="container">
            <h1 class="font-thin">Create</h1>   
        </div>

        <!-- Content of page (create user) -->
        <div class="container">
            <form class="form form-update" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">             
                <div class="form-group">
                    <label for="colors">* Position:</label>                    
                    <select name="position_create" class="select-field text-capitalize" required>
                        <?php foreach($staff_position_create as $key => $value): ?>
                            <option name="<?= $value['position'] ?>" value="<?= $value['pozicije_id'] ?>">
                                <?= $value['position'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>                          
                </div>

                <div class="form-group">
                    <label>* First Name:</label>
                    <input type="text" name="first_name" placeholder="First Name:" class="input-field" required />
                </div>
                <div class="form-group">
                    <label>* Last Name:</label>
                    <input type="text" name="last_name" placeholder="Last Name:" class="input-field" required />
                </div>
                
                <div class="form-group">
                    <label>* Salary:</label>
                    <input type="text" name="payment" placeholder="Salary:" class="input-field" required />
                </div>    
                
                <div class="form-group">
                    <label>* Email:</label>
                    <input type="email" name="email" placeholder="Email:" class="input-field" required />
                </div>                    

                <button class="btn btn-success" type="submit" name="create">Create</button>
            </form>   
        </div>
    </section>
</main>