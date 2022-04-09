<?php
    /* includes */
    require('./src/classes/connection.php');
    require('./src/property/property.php');
    
    /**
     * login class (authenticate)
     */
    class Admin {
        /**
         * check admin auth
         */
        public static function Login(string $email, string $password) {
            $auth = self::GetAdmin($email, $password);

            if (!$auth) {
                $_SESSION['logged_in'] = 'false';
                Message::ErrorMessage('Error admin');
            } else {
                $_SESSION['logged_in'] = 'true';
                Message::CorrectMessage('Welcome admin');    
                header('location: ./dashboard.php');
            }
        }
        /**
         * get login admin
         */
        public static function GetAdmin(string $email, string $password) { 
            $stmt = Connection::CreateConnection()->prepare("SELECT staff_id, staff_email, staff_password FROM zaposleni WHERE staff_email = ? AND staff_password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result(); 
            $users = $result->fetch_assoc();


            if (!empty($users)) {
                $role = (string)$users['staff_id'];
                $_SESSION['user_email'] = $email;

                $stmt = Connection::CreateConnection()->prepare("SELECT position FROM pozicije WHERE pozicije_id = ?");
                $stmt->bind_param("i", $role);
                $stmt->execute();
                $result = $stmt->get_result(); 
                $user = $result->fetch_assoc();

                if ($user['position'] === 'admin') {
                    return $users;
                }
            }
        }
    }
?>
                        
                        
        
                        






























                        
<!-- 

< ?php 
    trait message {
        public function ErrorMessage() {
            echo 'Login failed';
        }
        public function SuccessMessage() {
            echo 'Successfully logged in';
        }        
    }

    class Login {
        use message;
        public function CheckData(int $auth) {
            $auth == 0 ? $this->ErrorMessage() : $this->SuccessMessage();
        }
    }
    
    $login = new Login();
    $random_auth = rand(0,1);
    echo $login->CheckData($random_auth);

?>

-->