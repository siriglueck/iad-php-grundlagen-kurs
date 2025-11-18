<?php
    
    class Punkt {
        public function __construct(
            private float $x = 0,
            private float $y = 0
        ) {
            //
        }

        public function verschieben($x, $y ){
            $this->x = $x ;
            $this->y = $y ;
        }

        public function setXY($changeX, $changeY){
            $this->x += $changeX;
            $this->y += $changeY;
        }


        public function __toString() {
            return "($this->x / $this->y)";
        }
    }
    
