<?php
//entities/film.php
declare(strict_types=1);
namespace Entities;

use Entities\Exemplaar;

class Film{
    private int $id;
    private string $titel;


    public function __construct(int $id, string $titel){
        $this->id = $id;
        $this->titel = $titel;
    }

    public function getId() : int {
        return $this->id;
    }
    public function getTitel() : string {
        return $this->titel;
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
}
?>