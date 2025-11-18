<?php
declare(strict_types=1);
require_once 'Kfz.php';


class Pkw extends Kfz {
    /**
     * Klasse Kfz
     *
     * Beschreibt einen PKW. Erbt von der Klasse Kfz.
     *
     * @author Siri Glück
     *
     * @since 1.0.0
     *
     * @see Kfz
     * @param string $farbe Farbe des Kfz.
     * @param string $marke Marke des Kfz (BMW, Opel, VW, etc.).
     * @param string $typ Typ des Kfz (3er, Astra, Passat, etc.).
     * @param string $motor Motorisierung des Kfz (Benzin, Diesel, Elektro, Hybrid).
     * @param string $ps PS des Kfz ().
     * @param string $speed optional Aktuelle Speed des Kfz (Default = 0).
     */

    function __construct(private string $farbe, private string $marke, private string $typ, private string $motor, private int $ps, private int $speed = 0) {
        parent::__construct($marke, $typ, $motor, $ps, $speed);
    }

    public function setFarbe($farbe){
        $this->farbe = $farbe;
    }

    public function getFarbe(){
        return $this->farbe;
    }

    function __toString() {
        // Die Methode __toString() der Eltern-Klasse wird erweitert
        return parent::__toString() . " Die Farbe ist $this->farbe."; 
    }
}