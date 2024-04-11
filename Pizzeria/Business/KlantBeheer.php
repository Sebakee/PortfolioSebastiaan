<?php
//business/Filmbeheer.php
declare(strict_types=1);

namespace Business;

use Data\KlantenDAO;
use Data\CitiesDAO;
use Exceptions\GebruikerBestaatAlException;


class KlantBeheer{
    public function register($email, $wachtwoord, $herhaalwachtwoord, $voornaam, $naam, $postcode, $telefoonnummer, $straat, $huisnummer){
        $kDAO = new KlantenDAO();
        $cDAO = new CitiesDAO();
        $city = $cDAO->getByZipcode($postcode);
        $gebruiker = $kDAO->register($email, $wachtwoord, $herhaalwachtwoord, $voornaam, $naam, $city->getId(), $telefoonnummer, $straat, $huisnummer);
        return $gebruiker;
    }

    public function emailReedsInGebruik($email){
        $kDAO = new KlantenDAO();
        $rowcount = $kDAO->emailReedsInGebruik($email); 
        if ($rowcount > 0) {
            throw new GebruikerBestaatAlException();
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

    public function update($gebruiker){
        $kDAO = new KlantenDAO();
        $kDAO->update($gebruiker);
    }

}
?>