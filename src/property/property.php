<?php 
    /**
     * message 
     */
    class Message {
        public static $error_message = '';
        public static $correct_message = '';

        // error message 
        public static function ErrorMessage($text) {
            return self::$error_message = $text;
        }
        
        // correct message
        public static function CorrectMessage($text) {
            return self::$correct_message = $text;
        }        
    }