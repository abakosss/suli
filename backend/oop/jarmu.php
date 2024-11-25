<?php

// Jármű osztály
class Jarmu {
    protected $tipus;
    protected $utasok = [];

    public function __construct($tipus) {
        $this->tipus = $tipus;
    }

    public function getTipus() {
        return $this->tipus;
    }

    // Utas beszállása
    public function beszall(Utas $utas) {
        $this->utasok[] = $utas;
        echo $utas->getNev() . " beszállt a " . $this->tipus . "-be.\n";
    }

    // Utas kiszállása
    public function kiszall(Utas $utas) {
        $kulcs = array_search($utas, $this->utasok, true);
        if ($kulcs !== false) {
            unset($this->utasok[$kulcs]);
            echo $utas->getNev() . " kiszállt a " . $this->tipus . "-ből.\n";
        } else {
            echo $utas->getNev() . " nem található a " . $this->tipus . "-ben.\n";
        }
    }

    // Utasok listázása
    public function listUtasok() {
        echo "Jelenleg az alábbi utasok vannak a " . $this->tipus . "-ben:\n";
        foreach ($this->utasok as $utas) {
            echo "- " . $utas->getNev() . "\n";
        }
    }
}

// Busz osztály, amely örökli a Jármű osztályt
class Busz extends Jarmu {
    public function __construct() {
        parent::__construct("busz");
    }
}

// Utas osztály
class Utas {
    private $nev;

    public function __construct($nev) {
        $this->nev = $nev;
    }

    public function getNev() {
        return $this->nev;
    }
}

// Példányosítjuk az utasokat
$utas1 = new Utas("Kovács Péter");
$utas2 = new Utas("Nagy Anna");
$utas3 = new Utas("Szabó István");

// Példányosítjuk a buszt
$busz = new Busz();

// Utasok beszállnak a buszba
$busz->beszall($utas1);
$busz->beszall($utas2);
$busz->beszall($utas3);

// Utasok listázása
$busz->listUtasok();

// Egy utas kiszáll a buszból
$busz->kiszall($utas2);

// Utasok listázása a kiszállás után
$busz->listUtasok();