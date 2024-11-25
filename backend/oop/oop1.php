<?php

// Bútor osztály
class Butor {
    protected $nev;

    public function __construct($nev) {
        $this->nev = $nev;
    }

    public function getNev() {
        return $this->nev;
    }
}

// Szekrény osztály, amely örökli a Bútor osztályt
class Szekreny extends Butor {
    private $fiokok = [];

    public function __construct($nev, $fiokokSzama) {
        parent::__construct($nev);
        // Fiókok inicializálása üres tömbökkel
        for ($i = 0; $i < $fiokokSzama; $i++) {
            $this->fiokok[$i] = [];
        }
    }

    // Ruhák hozzáadása egy adott fiókhoz
    public function addRuhaToFiok($fiokIndex, Ruha $ruha) {
        if (isset($this->fiokok[$fiokIndex])) {
            $this->fiokok[$fiokIndex][] = $ruha;
        } else {
            echo "Nincs ilyen fiók: " . $fiokIndex;
        }
    }

    // Fiókok és ruhák listázása
    public function listFiokok() {
        foreach ($this->fiokok as $index => $fiok) {
            echo "Fiók #" . ($index + 1) . ":\n";
            foreach ($fiok as $ruha) {
                echo "- " . $ruha->getTipus() . "\n";
            }
        }
    }
}

// Ruhák osztály
class Ruha {
    protected $tipus;

    public function __construct($tipus) {
        $this->tipus = $tipus;
    }

    public function getTipus() {
        return $this->tipus;
    }
}

// Példányosítjuk a ruhák típusait
$lyukasZoknik = new Ruha("Lyukas zoknik");
$vastagZoknik = new Ruha("Vastag zoknik");
$nyariTitokZoknik = new Ruha("Nyári titok zoknik");
$fehernemuk = new Ruha("Fehérneműk");

// Példányosítjuk a szekrényt 5 fiókkal
$szekreny = new Szekreny("Hálószobai szekrény", 5);

// Ruhák elhelyezése a szekrény különböző fiókjaiba
$szekreny->addRuhaToFiok(0, $lyukasZoknik);          // Legalsó fiók
$szekreny->addRuhaToFiok(3, $nyariTitokZoknik);     // Az előtte levő fiók
$szekreny->addRuhaToFiok(2, $vastagZoknik);          // Az utolsó előtti
$szekreny->addRuhaToFiok(1, $fehernemuk);           // Fehérneműk a többi felett

// Szekrény fiókok tartalmának listázása
$szekreny->listFiokok();

?>