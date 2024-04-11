<?php
//Login.php
declare(strict_types=1);
spl_autoload_register();

use Business\CityBeheer;
use Business\KlantBeheer;
use Business\BestellijnBeheer;
use Business\ProductBeheer;
use Business\BestellingBeheer;
use Exceptions\PostcodeBestaatNietException;

$bestellijnB = new BestellijnBeheer();
$cityB = new CityBeheer();
$klantB = new KlantBeheer();
$productB = new ProductBeheer();
$bestellingB = new BestellingBeheer();
session_start();


$gebruiker = unserialize($_SESSION["gebruiker"]);
$cityId = $gebruiker->getAdresId();
$city = $cityB->getByIdCities($cityId);
$nummer = 0;

if(isset($_GET["action"]) && $_GET["action"] === "afrekenen")
{
    try{
        $city = $cityB->getByIdCities($gebruiker->getAdresId());
        $idG = $gebruiker->getId();
        if($_POST["naam"] != ""){
            $naam = $_POST["naam"];  
            $gebruiker->setNaam($naam);
            
        }
        if($_POST["voornaam"] != ""){
            $voornaam = $_POST["voornaam"]; 
            $gebruiker->setVoornaam($voornaam);
           
        }
        if($_POST["zipcode"] != ""){
            $zipcode = $_POST["zipcode"]; 
            
            $cityB->postcodeBestaatNiet($zipcode);
            $city = $cityB->getByZipcode($zipcode);
            $gebruiker->setAdresId($city->getId());  
        }
        if($_POST["telefoonnummer"] != ""){
            $telefoonnummer = $_POST["telefoonnummer"]; 
            $gebruiker->setTelefoonnummer($telefoonnummer);
            
        }
        if($_POST["straat"] != ""){
            $straat = $_POST["straat"];  
            $gebruiker->setStraat($straat);
            
        }
        if($_POST["huisnummer"] != ""){
            $huisnummer = $_POST["huisnummer"];  
            $gebruiker->setHuisnummer($huisnummer);
            
        }
    
        $klantB->update($gebruiker);
    
        if($city->getThuisBezorging() == 0){
            $idB = $bestellingB->createBestelling($gebruiker->getId(), $_POST["informatie"]);
            foreach ($_SESSION['basket'] as $productId => $item) {
                $aantal = $item["aantal"];
                
                $productId = $item["productId"];
                if($productId != null){
                    $bestellijnB->createBestellijn($idB, $productId, $aantal);
                }
               
            }
            header("location:menu.php?afrekening=true");
            unset($_SESSION["basket"]);
            
        }
        else{
            echo "Wij kunnen niet op dit adres leveren.";
        }
    } catch(PostcodeBestaatNietException $e){
        echo "Postcode bestaat niet!";
    }

   
   
}

include("presentation/AfrekenenPR.php");