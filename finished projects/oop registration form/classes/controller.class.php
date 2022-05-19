<?php
if (!isset($_POST['submit'])) {
    header('Location: ../registration.php');
} else {
    //class buffer zone that have access to all the methods of the class that make insertion or any type of control validation
    class Controller extends Registration
    {
        // method that have access to another method via registration class
        public function insertNewData($username, $lastname, $email, $password, $passwordRe)
        {
            $this->insertNewUser($username, $lastname, $email, $password, $passwordRe);
        }
        // method that have access to another method via registration class
        public function fieldValid($username,  $lastname,  $email,  $password,  $passwordre, $submit)
        {
            $this->fieldValidation($username,  $lastname,  $email,  $password,  $passwordre, $submit);
        }
    }
}
