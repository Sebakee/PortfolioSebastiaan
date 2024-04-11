<?php
//business/Filmbeheer.php
declare(strict_types=1);

namespace Business;

use Data\ProductenDAO;
use Data\KlantenDAO;
use Data\CitiesDAO;
use Data\BestellingenDAO;
use Data\BestellijnenDAO;
use Exceptions\GeenIdDoorgegevenException;
use Exceptions\GebruikerBestaatAlException;
use Exceptions\PostcodeBestaatNietException;

class Pizzabeheer{
    public function productenlijst() : array{
        $pDAO = new ProductenDAO();
        $producten = $pDAO->getAll();
        return $producten;
    }

    public function register($email, $wachtwoord, $herhaalwachtwoord, $voornaam, $naam, $postcode, $telefoonnummer, $straat, $huisnummer){
        $kDAO = new KlantenDAO();
        $cDAO = new CitiesDAO();
        $city = $cDAO->getByZipcode($postcode);
        $kDAO->register($email, $wachtwoord, $herhaalwachtwoord, $voornaam, $naam, $city->getId(), $telefoonnummer, $straat, $huisnummer);
    }

    public function emailReedsInGebruik($email){
        $kDAO = new KlantenDAO();
        $rowcount = $kDAO->emailReedsInGebruik($email); 
        if ($rowcount > 0) {
            throw new GebruikerBestaatAlException();
        }
    }

    public function postcodeBestaatNiet($postcode){
        $cDAO = new CitiesDAO();
        $rowcount = $cDAO->postcodeBestaatNiet($postcode);
        if ($rowcount == 0) {
            throw new PostcodeBestaatNietException();
        }
    }



    public function login($email, $wachtwoord){
        $kDAO = new KlantenDAO();
        $gebruiker = $kDAO->login($email,$wachtwoord);
        return $gebruiker;
    }

    public function getByIdKlanten($id){
        $kDAO = new KlantenDAO();
        $gebruiker = $kDAO->getById($id);
        return $gebruiker;
    }

    public function getByIdProducten($id){
        if($id == null){
            throw new GeenIdDoorgegevenException;
        }
        $pDAO = new ProductenDAO();
        $product = $pDAO->getById($id);
        return $product;
    }

    public function getByIdCities($id){
        $cDAO = new CitiesDAO();
        $city = $cDAO->getById($id);
        return $city;
    }

    public function getByZipcode($zipcode){
        $cDAO = new CitiesDAO();
        $city = $cDAO->getByZipcode($zipcode);
        return $city;
    }

    public function update($gebruiker){
        $kDAO = new KlantenDAO();
        $kDAO->update($gebruiker);
    }

    

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

    public function getAllBestellijnen(){
        $blDAO = new BestellijnenDAO();
        $lijst = $blDAO->getAll();
        return $lijst;
    }

    public function createBestellijn($bestelId, $productId, $aantal){
        $blDAO = new BestellijnenDAO();
        $blDAO->createBestellijn($bestelId, $productId, $aantal);
    }

    public function getByIdBestellingen($id){
        $bDAO = new BestellingenDAO();
        $bestelling = $bDAO->getById($id);
        return $bestelling;
    }

    public function deleteBestellijn($id){
        $blDAO = new BestellijnenDAO();
        $blDAO->deleteBestellijn($id);
    }

}