<?php
    class ProjectTask {
        /**
         * 
         * 
         */
        public static function getProject(string $sql): array {
            $stmt = Connection::CreateConnection()->prepare("$sql");
            $stmt->execute();            
            $result = $stmt->get_result(); 
            $data = $result->fetch_all(MYSQLI_ASSOC);
            // data
            return $data; 
        }
        /*
            SELECT task_name, task_description, project_name, staff_first_name, staff_last_name, deadline
            FROM zadatak 
            JOIN projekat 
            ON zadatak.project_task_id = projekat.project_id
            JOIN zaposleni
            ON zadatak.worker_task_id = zaposleni.zaposleni_id
            GROUP BY task_name;
        */        

        /**
         * create project set data in database 
         * manifest on page - (project.php)
         */
        public static function createProject(string $project_name, string $project_description) {
            $stmt = Connection::CreateConnection()->prepare("INSERT INTO projekat (project_name, project_desc) VALUES ('$project_name', '$project_description')");
            $stmt->bind_param("ss", $project_name, $project_description);
            $stmt->execute();
            if (!empty($stmt)) header("location: ./project.php");            
        }

        /**
         * create task set data in database 
         * create on page - (create-task.php)
         * manifest on page - (project.php)
         */
        public static function createTask(string $project_name, string $project_description, int $select_project, int $select_staff, string $select_date) {
            $stmt = Connection::CreateConnection()->prepare("INSERT INTO zadatak (task_name, task_description, project_task_id, worker_task_id, deadline) VALUES ('$project_name', '$project_description', $select_project, $select_staff, '$select_date')");
            $stmt->execute();
            if (!empty($stmt)) header("location: ./project.php");
        }
        /**
         * get all employes from database table - zaposleni (zaposleni_id, staff_id, staff_first_name, staff_last_name)
         * manifest on page - (create-task.php)
         * return data
         */
        public static function getAllEmployes(string $sql): array {
            $stmt = Connection::CreateConnection()->prepare("$sql");
            $stmt->execute();            
            $result = $stmt->get_result(); 
            $data = $result->fetch_all(MYSQLI_ASSOC);
            // data
            return $data;            
        }

        /**
         * get all tasks from database table - zadatak
         * manifest on page - (create-task.php)
         * return data
         */
        public static function getAllTasks(string $sql): array {
            $stmt = Connection::CreateConnection()->prepare("$sql");
            $stmt->execute();            
            $result = $stmt->get_result(); 
            $data = $result->fetch_all(MYSQLI_ASSOC);
            // data
            return $data;            
        }
    } 

    // INSERT INTO zadatak (task_name, task_description, project_task_id, worker_task_id, deadline) VALUES ('Name', 'Desc', 2, 59, '2022-04-08');
