<?php
    /**
     * get all sql fetch for view 
     */
    class User {
        /**
         * get user data 
         * manifest on page - (staff.php)
         */
        public static function getData(string $sql): array {
            $stmt = Connection::CreateConnection()->prepare($sql);
            $stmt->execute();            
            $result = $stmt->get_result(); 
            $data = $result->fetch_all(MYSQLI_ASSOC);
            // data
            return $data;
        }
        /**
         * create user on form 
         * manifest on page - (create.php)
         * redirect from - (create.php) to - (staff.php) 
         */
        public static function setData(int $staff_position, string $staff_firstName, string $staff_lastName, float $staff_salary, string $staff_email) {
            $stmt = Connection::CreateConnection()->prepare("INSERT INTO zaposleni (staff_id, staff_first_name, staff_last_name, staff_payment, staff_email) VALUES ($staff_position, '$staff_firstName', '$staff_lastName', $staff_salary, '$staff_email')");
            $stmt->execute();
            if (!empty($stmt)) header("location: ./dashboard.php");
        }        
        /**
         * delete user on click
         * manifest on page - (delete.php)
         * redirect from - (delete.php) to - (staff.php) 
         */
        public static function deleteData(string $sql) {
            $stmt = Connection::CreateConnection()->prepare($sql);
            $stmt->execute();
            if ($stmt) header("location: ./staff.php");
        }
        /**
         *  get data from update user
         *  manifest on page - (update.php)
         */
        public static function getUpdateData(string $sql, int $id): array {
            $stmt = Connection::CreateConnection()->prepare("$sql = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result(); 
            $data = $result->fetch_assoc();
            // data
            return $data;
        }
        /**
         * update user
         * manifest on page - (update_record.php)
         * redirect from - (update_record.php) to - (staff.php) 
         */
        public static function updateDatabase(int $staff_position, string $staff_firstName, string $staff_lastName, string $staff_salary, string $staff_email, int $staff_id) {
            $stmt = Connection::CreateConnection()->prepare("UPDATE zaposleni SET staff_id = ?, staff_first_name = ?, staff_last_name = ?, staff_payment = ?, staff_email = ? WHERE zaposleni_id = ?");
            $stmt->bind_param("issssi", $staff_position, $staff_firstName, $staff_lastName, $staff_salary, $staff_email, $staff_id);
            $stmt->execute();    
            if (!empty($stmt)) header("location: ../../../../staff.php");
        }
        /**
         * join two table
         * manifest on page - (dashboard.php)  
         */
        public static function joinTable(): array {
            $stmt = Connection::CreateConnection()->prepare("SELECT count(staff_id) AS position_number, position FROM zaposleni JOIN pozicije ON zaposleni.staff_id = pozicije.pozicije_id GROUP BY position");
            $stmt->execute();            
            $result = $stmt->get_result(); 
            $data = $result->fetch_all(MYSQLI_ASSOC);
            // data
            return $data;
        }
        /**
         * select option return array with all position from database table - pozicije
         * manifest on page - ((fillter) - staff.php, (select option) - create.php, (select option) - update.php)
         */
        public static function getPositionData(string $sql): array {
            $stmt = Connection::CreateConnection()->prepare($sql);
            $stmt->execute();            
            $result = $stmt->get_result(); 
            $data = $result->fetch_all(MYSQLI_ASSOC);
            // data
            return $data;            
        }
    }