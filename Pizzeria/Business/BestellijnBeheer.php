<?php
//business/Filmbeheer.php
declare(strict_types=1);

namespace Business;

use Data\BestellijnenDAO;

class BestellijnBeheer{
    public function getAllBestellijnen(){
        $blDAO = new BestellijnenDAO();
        $lijst = $blDAO->getAll();
        return $lijst;
    }

    public function createBestellijn($bestelId, $productId, $aantal){
        $blDAO = new BestellijnenDAO();
        $blDAO->createBestellijn($bestelId, $productId, $aantal);
    }

    public function deleteBestellijn($id){
        $blDAO = new BestellijnenDAO();
        $blDAO->deleteBestellijn($id);
    }
    
    public function getByBestelId($bestelId){
        $blDAO = new BestellijnenDAO();
        $lijst = $blDAO->getById($bestelId);
        return $lijst;
    }
}
?>