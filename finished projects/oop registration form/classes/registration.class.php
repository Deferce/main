<?php
session_start();

// class that handles registration via extended connect class
class Registration extends Connect
{
    // pdo data insert 
    protected function insertNewUser(string $username, string $lastname, string $email, string $password,  string $passwordre)
    {


        $sql = "INSERT INTO registration (username,lastname,email,password,passwordre) VALUES (?,?,?,?,?)";
        $statement = $this->connectDB()->prepare($sql);
        $statement->execute([
            $username,
            $lastname,
            $email,
            $password,
            $passwordre
        ]);
    }
    //field validation for registration inputs
    protected function fieldValidation(string $username, string $lastname, string $email, string  $password,  string $passwordre, string $submit)
    {


        // if submit not pressed and file accessed via url show registration.php page
        if (!isset($submit)) {
            header('Location: ../registration.php');
        }

        //if pressed go ahead with the check
        if (isset($submit)) {

            // trim 2 fields for white spaces
            $username = str_replace(' ', '', $username);
            $lastname = str_replace(' ', '', $lastname);

            //special symbol check for inputs
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)) {


                header('Location: ../registration.php?username=specialUser&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');

                exit();
            }
            if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastname)) {


                header('Location: ../registration.php?lastname=specialLast&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');
                exit();
            }

            if (preg_match('/[\'^£$%&*()}{#~?><>,|=_+¬-]/', $email)) {


                header('Location: ../registration.php?email=specialEmail&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');
                exit();
            }

            // if fields empty 
            if (empty($username) || empty($lastname) || empty($email) || empty($password) || empty($passwordre)) {


                header('Location: ../registration.php?val=empty&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');

                exit();
            }
            //if username and lastname the same 
            if ($username == $lastname) {

                header('Location: ../registration.php?lastname=same&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');
                exit();
            }
            // if  field val > 15 
            if (strlen($username) > 15 || strlen($lastname) > 15 || strlen($email) > 15 || strlen($password) > 15 || strlen($passwordre) > 15) {

                header('Location: ../registration.php?val=max&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');

                exit();
            }
            // if fields val <4 
            if (strlen($username) < 4 || strlen($lastname) < 4  || strlen($password) < 4 || strlen($passwordre) < 4) {

                header('Location: ../registration.php?val=min&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');
                exit();
            }
            // if a field contain number 
            if (is_numeric($lastname)) {

                header('Location: ../registration.php?val=numLast&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');
                exit();
            }
            // email filter

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                header('Location: ../registration.php?email=proper&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');
                exit();
            }
            // if password not equals 
            if ($password !== $passwordre) {

                header('Location: ../registration.php?pass=equal&user=' . urlencode(base64_encode($username)) . '&last=' . urlencode(base64_encode($lastname)) . '&em=' . urlencode(base64_encode($email)) . '"');
                exit();
            }

            //if the rest is OK go and insert data ->
            else {
                $this->insertNewUser($username,  $lastname,  $email,  $password,  $passwordre);
            }
        }
    }
}
