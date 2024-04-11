<?php
//entities/Klant.php
namespace Entities;

use Exceptions\WachtwoordenKomenNietOvereenException;
use Exceptions\OngeldigEmailadresException;

class Klant{
    private int $id;
    private string $email;
    private ?string $wachtwoord;
    private string $voornaam;
    private string $naam;
    private int $adresId;
    private string $telefoonnummer;
    private string $straat;
    private string $huisnummer;
    private int $promotie;
    
    public function __construct(string $voornaam, string $naam,
    int $adresId, string $telefoonnummer, string $straat, string $huisnummer, string $email, string $wachtwoord = null, int $id = 0, int $promotie = null){
        $this->voornaam = $voornaam;
        $this->naam = $naam;
        $this->adresId = $adresId;
        $this->telefoonnummer = $telefoonnummer;
        $this->straat = $straat;
        $this->huisnummer = $huisnummer;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
        $this->id = $id;
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
 
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new OngeldigEmailadresException();
        }
        $this->email = $email;
    }

    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }

    public function setWachtwoord($wachtwoord, $herhaalwachtwoord)
    {
        if ($wachtwoord !== $herhaalwachtwoord) {
            throw new WachtwoordenKomenNietOvereenException();
        }
        $this->wachtwoord = password_hash($wachtwoord, PASSWORD_DEFAULT);
    }

    public function getVoornaam()
    {
        return $this->voornaam;
    }

    public function setVoornaam($voornaam)
    {
        $this->voornaam = $voornaam;

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

    public function getAdresId()
    {
        return $this->adresId;
    }

    public function setAdresId($adresId)
    {
        $this->adresId = $adresId;

        return $this;
    }

    public function getTelefoonnummer()
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer($telefoonnummer)
    {
        $this->telefoonnummer = $telefoonnummer;

        return $this;
    }
 
    public function getStraat()
    {
        return $this->straat;
    }

    public function setStraat($straat)
    {
        $this->straat = $straat;

        return $this;
    }

    public function getHuisnummer()
    {
        return $this->huisnummer;
    }

    public function setHuisnummer($huisnummer)
    {
        $this->huisnummer = $huisnummer;

        return $this;
    }

    public function getPromotie()
    {
        return $this->promotie;
    }

    public function setPromotie($promotie)
    {
        $this->promotie = $promotie;

        return $this;
    }
}