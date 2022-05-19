<?php

// class for login handling
class Login extends Connect
{

    protected function userCheck($email, $password, $submit)
    {
        if (!isset($submit)) {
            header('Location: ../login.php');
        } else {
            //query for user input $email and password
            $sql = "SELECT email,password FROM registration WHERE email='$email' AND password='$password'";

            $statement = $this->connectDB()->query($sql);

            $dataFetch = $statement->fetchAll();

            //if true => do something
            if ($dataFetch) {
                echo "Logged in" . "<br>" . $email . "<br>" . $password;
            } else {
                //timer for redirect
                sleep(1);
                header('Location: ../login.php?error=cred');
                exit();
            }
        }
    }

    protected function loginValidation($email, $password)
    {
        $email = str_replace(' ', '', $email);
        $password =  str_replace(' ', '', $password);
        if (preg_match('/[\'^£$%&*()}{#!~?><>,|=_+¬-]/', $email)) {

            header('Location: ../login.php?email=specialEmail');
            exit();
        }
        if (empty($email) || empty($password)) {
            header('Location: ../login.php?val=empty');
            exit();
        }
        if (strlen($email) > 15 || strlen($password) > 15) {
            header('Location: ../login.php?val=max');

            exit();
        }
        if (strlen($email) < 4  || strlen($password) < 4) {
            header('Location: ../login.php?val=min');

            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: ../login.php?email=proper');

            exit();
        }
        if ($email == $password) {
            header('Location: ../login.php?val=same');

            exit();
        }
    }
}
