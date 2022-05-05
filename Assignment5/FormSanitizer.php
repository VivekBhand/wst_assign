<?php
    class FormSanitizer {

        public static function sanitizeFormString($inputText) {
            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ","",$inputText);
            // $inputText = trim($inputText)
            // remove white space at end
            $inputText = strtolower($inputText);
            $inputText = ucfirst($inputText);
            return $inputText;
        }

        public static function sanitizeFormUserName($inputText) {
            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ","",$inputText);
            return $inputText;
        }

        public static function sanitizeFormEmail($inputText) {
            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ","",$inputText);
            return $inputText;
        }

        public static function sanitizeFormDetails($inputText) {
            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ","",$inputText);
            return $inputText;
        }

        public static function sanitizeFormNumber($inputText) {
            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ","",$inputText);
            return $inputText;
        }

    }

?>