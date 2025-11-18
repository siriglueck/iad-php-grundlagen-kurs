<?php
declare(strict_types=1);


class Kfz {
    function __construct(private $marke, private $typ, private $motor, private $ps, private $speed = 0) {

    }

    public function setSpeed($speed) {
        $this->speed += $speed;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setMotor($motor) {
        $this->motor = $motor;
    }

    public function getMotor() {
        return $this->motor;
    }

    public function setPS($ps) {
        $this->ps = $ps;
    }

    public function getPS() {
        return $this->ps;
    }

    public function setMarke($marke) {
        $this->marke = $marke;
    }

    public function getMarke() {
        return $this->marke;
    }

    public function setTyp($typ) {
        $this->typ = $typ;
    }

    public function getTyp() {
        return $this->typ;
    }


    public function __toString() {
        return "$this->marke $this->typ besitzt einen $this->motor-Motor, hat $this->ps PS und fährt gerade mit $this->speed km/h.";
    }

}