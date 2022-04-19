<?php
namespace App;

class SumTDD {
    private $number1;
    private $num2;

    public function setNumber1($number1) {
        $this->number1 = $number1;
    }

    public function setNum2($num2) {
        $this->num2 = $num2;
    }

    public function result() {
        return $this->number1 + $this->num2;
    }
}
