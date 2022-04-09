<main class="main">
    <section class="section section-create-project">
        <!-- Header page title -->
        <div class="container">
            <h1 class="font-thin">Kreiraj projekat</h1>   
        </div>

        <!-- Content of page (create-project) -->
        <div class="container">
            <form class="form form-update" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label>* Project Name:</label>
                    <input type="text" name="project_name" placeholder="Project Name:" class="input-field" required />
                </div>
                <div class="form-group">
                    <label>* Project Description:</label>
                    <input type="text" name="project_description" placeholder="Project Description:" class="input-field" required />
                </div>
                <button class="btn btn-success" type="submit" name="create_project">Create Project</button>
            </form>   
        </div>
    </section>
</main>