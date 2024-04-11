<?php
//entities/City.php
namespace Entities;

class City {
    private int $id;
    private string $zipcode;
    private string $naam;
    private int $thuisBezorging;

    public function __construct(int $id, string $zipcode, string $naam, int $thuisBezorging){
        $this->id = $id;
        $this->zipcode = $zipcode;
        $this->naam = $naam;
        $this->thuisBezorging = $thuisBezorging;
    }
 
    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getZipcode()
    {
        return $this->zipcode;
    }

    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function setNaam($naam)
    {
        $this->naam = $naam;

        return $this;
    }

    public function getThuisBezorging()
    {
        return $this->thuisBezorging;
    }

    public function setThuisBezorging($thuisBezorging)
    {
        $this->thuisBezorging = $thuisBezorging;

        return $this;
    }
}
?>