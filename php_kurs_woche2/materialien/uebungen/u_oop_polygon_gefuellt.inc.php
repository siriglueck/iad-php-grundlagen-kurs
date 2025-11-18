<?php
    require_once 'u_oop_punkt.inc.php';

    class PolygonGefuellt {

        public function __construct(
            private array $inputArray = array(
                new Punkt(),
                new Punkt(),
                new Punkt(),
            ),
            private string $farbe,
        ) {
            //
        }

        public function verschieben($changeX, $changeY ){
            $this->inputArray[0]->setXY($changeX, $changeY);
            $this->inputArray[1]->setXY($changeX, $changeY);
            $this->inputArray[2]->setXY($changeX, $changeY);
        }

        public function faerben($neuFarbe) {
            $this->farbe = $neuFarbe;
        }

        public function __toString() {
            if ($this->inputArray[0]->getXY() === "( 0 / 0 )" 
            || $this->inputArray[1]->getXY() === "( 0 / 0 )" 
            || $this->inputArray[2]->getXY() === "( 0 / 0 )") {
                return "(Keine Punkte)";
            } else {
                return implode(' / ', $this->inputArray) . " / $this->farbe" ;
            }
        }
    }
    
