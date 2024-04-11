<?php
//business/Filmbeheer.php
declare(strict_types=1);

namespace Business;

use Data\BestellingenDAO;

class BestellingBeheer {
    public function createBestelling($klantnummer, $informatie){
        $bDAO = new BestellingenDAO();
        $id = $bDAO->createBestelling($klantnummer, $informatie);
        return $id;
    }

    public function getAllBestellingen(){
        $bDAO = new BestellingenDAO();
        $lijst = $bDAO->getAll();
        return $lijst;
    }

    public function getByIdBestellingen($id){
        $bDAO = new BestellingenDAO();
        $bestelling = $bDAO->getById($id);
        return $bestelling;
    }

    public function getByKlantId($klantId){
        $bDAO = new BestellingenDAO();
        $lijst = $bDAO->getByKlantId($klantId);
        return $lijst;
    }

}
?>