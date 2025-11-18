<?php
    require_once 'u_oop_punkt.inc.php';

    class Linie {
        public function __construct(
            private object $anfang = new Punkt(0,0),
            private object $ende = new Punkt(0,0)
        ) {
            //
        }

        public function verschieben($changeX, $changeY ){
            $this->anfang->setXY($changeX, $changeY);
            $this->ende->setXY($changeX, $changeY);
        }

        public function __toString() {
            return " $this->anfang / $this->ende ";
        }
    }
    
