<?php
    class Raumschiff {
        /**
         * eine Klassen-Methode ohne Sichtbarkeits angabe ist *immer* public
         */
        function __construct(
            private string $bezeichnung,
            private string $modell,
            private int $entfernung = 0,
        ) {
            //
        }

        function setEntfernung($entfernung){
            return $this->entfernung += $entfernung;
        }

        function __toString(){
            return "aktuelles Raumschiff: $this->bezeichnung ($this->modell) 
            <br>Entfernung : $this->entfernung Lichtjahre" ;
        }
    }
    
    