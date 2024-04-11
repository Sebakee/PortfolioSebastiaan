<?php
//Login.php
declare(strict_types=1);
spl_autoload_register();

use Business\BestellijnBeheer;
use Business\ProductBeheer;
use Business\BestellingBeheer;
use Business\CityBeheer;
use Business\KlantBeheer;

$bestellijnB = new BestellijnBeheer();
$cityB = new CityBeheer();
$klantB = new KlantBeheer();
$productB = new ProductBeheer();
$bestellingB = new BestellingBeheer();
$id = 0;

session_start();

if(isset($_SESSION['gebruiker'])){
    $gebruiker = unserialize($_SESSION['gebruiker']);
    $id = $gebruiker->getId();
}

$lijstBestellingen = $bestellingB->getByKlantId($id);


include("presentation/bestellingenPR.php");