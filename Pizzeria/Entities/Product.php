<?php
//entities/Product.php
declare(strict_types=1);
namespace Entities;

class Product{
    public int $id;
    public float $prijs;
    public string $ingredienten;
    public string $soort;
    public string $naam;

    public function __construct(int $id, float $prijs, string $ingredienten,
        string $soort, string $naam){
        $this->id = $id;   
        $this->prijs = $prijs;
        $this->ingredienten = $ingredienten;
        $this->soort = $soort;
        $this->naam = $naam;       
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrijs()
    {
        return $this->prijs;
    }

    public function getIngredienten()
    {
        return $this->ingredienten;
    }

    public function getSoort()
    {
        return $this->soort;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setPrijs($prijs)
    {
        $this->prijs = $prijs;

        return $this;
    }

    public function setIngredienten($ingredienten)
    {
        $this->ingredienten = $ingredienten;

        return $this;
    }

    public function setSoort($soort)
    {
        $this->soort = $soort;

        return $this;
    }

    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }
}
?>