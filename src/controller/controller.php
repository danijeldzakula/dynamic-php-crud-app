<?php 
    /* includes */
    require('./src/classes/auth.php');
    /**
     * login controller class
     */
    class LoginController {
        /**
         * get login function
         */
        public static function getLogin() {
            if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
                // get email and password from input 
                $email = (string)$_POST['email'];
                $password = (string)md5($_POST['password']);

                // if (empty($email)) {
                //     $_SESSION["error_email"] = 'wrong email';

                //     echo $_SESSION['error_email'];
                // }

                // if (empty($password)) {
                //     $_SESSION["error_password"] = 'wrong password';
                //     echo $_SESSION['error_password'];
                // }

                // call login function
                Admin::Login($email, $password);
            }
        }
    }
