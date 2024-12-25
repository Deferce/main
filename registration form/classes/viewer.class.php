<?php

//viewer for data check
class Viewer extends Login
{
    //check login credentials
    public function login($email, $password, $submit)
    {
        $this->loginValidation($email, $password);
        $this->userCheck($email, $password, $submit);
    }
}
