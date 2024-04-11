<?php
//entities/exemplaar.php
declare(strict_types=1);

namespace Entities;

class Exemplaar{
    private int $id;
    private string $titel;
    private int $exemplaar;
    private int $aanwezig;

    public function __construct(int $id, string $titel, int $exemplaar, int $aanwezig){
        $this->id = $id;
        $this->titel = $titel;
        $this->exemplaar = $exemplaar;
        $this->aanwezig = $aanwezig;
    }
    public function getId() : int {
        return $this->id;
    }
    public function getTitel() : string {
        return $this->titel;
    }
    public function getExemplaar() {
        return $this->exemplaar;
    }
    public function getAanwezig() : int {
        return $this->aanwezig;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    public function setTitel($titel)
    {
        $this->titel = $titel;
        return $this;
    }
    public function setExemplaar($exemplaar)
    {
        $this->exemplaar = $exemplaar;
        return $this;
    }
    public function setAanwezig($aanwezig)
    {
        $this->aanwezig = $aanwezig;
        return $this;
    }
}
?>