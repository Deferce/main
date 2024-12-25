<?php

class Viewcontroller extends Calculate
{

    public function checkField($km, $kmRange, $days)
    {
        if ($this->errorCheck($km, $kmRange, $days)) {
            return true;
        } else {
            return false;
        }
    }
    public function checkFieldRu($km, $kmRange, $days)
    {
        if ($this->errorCheckRu($km, $kmRange, $days)) {
            return true;
        } else {
            return false;
        }
    }
    public function checkFieldEst($km, $kmRange, $days)
    {
        if ($this->errorCheckEst($km, $kmRange, $days)) {
            return true;
        } else {
            return false;
        }
    }
}
