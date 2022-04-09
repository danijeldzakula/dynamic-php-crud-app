<main class="main">
    <section class="section section-login">
        <div class="container">
            <form class="form form-login" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <h2 class="text-center font-thin">Login</h2>
                <div class="danger">
                    <h3>
                        <!-- Ispis ako email ili password ne odgavarju korisnicima (administratorima) iz baze -->
                        <?= Message::$error_message; ?>
                    </h3>
                </div>

                <div class="form-group">
                    <span class="error_message">
                        <!-- Problem sa ispisom pojedinacnih gresaka u slucaju da email nije ispravan -->
                    </span>
                    <input type="email" name="email" placeholder="Email" class="input-field" required />
                </div>
                <div class="form-group">
                    <span class="error_message">
                        <!-- Problem sa ispisom pojedinacnih gresaka u slucaju da password nije ispravan -->
                    </span>
                    <input type="password" name="password" placeholder="Password" class="input-field" required />
                </div>
                <button class="btn btn-primary" type="submit" name="login" required>Login</button>
            </form>            
        </div>
    </section>
</main>