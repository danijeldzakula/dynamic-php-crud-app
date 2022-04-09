<?php 
    /**
     * connection from database
     */
    class Connection {
        private static $host;
        private static $user;
        private static $database;
        private static $password;

        private static $connection;

        public static function CreateConnection() {
            self::$host = 'localhost';
            self::$user = 'root';
            self::$password = '';
            self::$database = 'databasecrud';
            self::$connection = new mysqli(self::$host, self::$user, self::$password, self::$database) or die('Connection error');
            return self::$connection;
        }
    }
?>