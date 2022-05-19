<?php

class Controller extends Calculate
{
    public function calc($km, $kmRange, $days)
    {
        $this->calculateData($km, $kmRange, $days);
    }
    public function calcRu($km, $kmRange, $days)
    {
        $this->calculateDataRu($km, $kmRange, $days);
    }
    public function calcEst($km, $kmRange, $days)
    {
        $this->calculateDataEst($km, $kmRange, $days);
    }
}
