<?php 
    namespace handlers;

    class formValidator
    {
        public function requiredField($data)
        {
            return !empty($data);
        }

        public function validateLength($data, $minLength, $maxLength)
        {
            return strlen($data) >= $minLength && strlen($data) <= $maxLength;
        }

    }
?>