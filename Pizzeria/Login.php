<?php
//Login.php
declare(strict_types=1);
spl_autoload_register();


use Business\CityBeheer;
use Business\KlantBeheer;

use Exceptions\OngeldigEmailadresException;
use Exceptions\WachtwoordenKomenNietOvereenException;
use Exceptions\GebruikerBestaatAlException;
use Exceptions\WachtwoordIncorrectException;
use Exceptions\GebruikerBestaatNietException;
use Exceptions\PostcodeBestaatNietException;

$klantB = new KlantBeheer();
$cityB = new CityBeheer();

session_start();
$nummer = 0;
$error = "";
$login = false;
$bemerking = "";
if (isset($_POST["btnLogin"])) {
    $nummer = 1;
    $email = "";
    $wachtwoord = "";
    if (!empty($_POST["txtEmail"])) {
    $email = $_POST["txtEmail"];
    } else {
    $error .= "Het e-mailadres moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtWachtwoord"])) {
    $wachtwoord = $_POST["txtWachtwoord"];
    } else {
    $error .= "Het wachtwoord moet ingevuld worden.<br>";
    }
    if ($error == "") {
    // Alle nodige velden zijn ingevuld
    // Alleen de centrale controles moeten nog gebeuren
        try {
                
                $gebruiker = $klantB->login($email, $wachtwoord);
                $_SESSION["gebruiker"] = serialize($gebruiker);
                header("location: Menu.php");
                setcookie("email", $gebruiker->getEmail());
                
            } catch (WachtwoordIncorrectException $e) {
                $error .= "Het wachtwoord is niet correct.<br>";
            } catch (GebruikerBestaatNietException $e) {
                $error .= "Er bestaat geen gebruiker met dit e-mailadres.<br>";
            }
        }
    }
if (isset($_POST["btnRegistreer"])) {
    $nummer == 0;
    $email = "";
    $wachtwoord = "";
    $wachtwoordHerhaal = "";
    if (!empty($_POST["txtVoornaam"])) {
        $voornaam = $_POST["txtVoornaam"];
    } else {
        $error .= "Voornaam moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtNaam"])) {
        $naam = $_POST["txtNaam"];
    } else {
        $error .= "Naam moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtPostcode"])) {
        $postcode = $_POST["txtPostcode"];
    } else {
        $error .= "Postcode moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtTelefoonnummer"])) {
        $telefoonnummer = $_POST["txtTelefoonnummer"];
    } else {
        $error .= "Telefoonnummer moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error .= "Het e-mailadres moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtStraat"])) {
        $straat = $_POST["txtStraat"];
    } else {
        $error .= "Straat moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtHuisnummer"])) {
        $huisnummer = $_POST["txtHuisnummer"];
    } else {
        $error .= "Huisnummer moet ingevuld worden.<br>";
    }
    if (!empty($_POST["txtWachtwoord"]) &&
    !empty($_POST["txtWachtwoordHerhaal"])) {
        $wachtwoord = $_POST["txtWachtwoord"];
        $wachtwoordHerhaal = $_POST["txtWachtwoordHerhaal"];
    } else {
        $error .= "Beide wachtwoordvelden moeten ingevuld worden.<br>";
    }
    if ($error == "") {
    // Alle nodige velden zijn ingevuld
    // Alleen de centrale controles moeten nog gebeuren
        try {
            $cityB->postcodeBestaatNiet($postcode);
            $klantB->emailReedsInGebruik($email);
            $gebruiker = $klantB->register($email, $wachtwoord, $wachtwoordHerhaal, $voornaam, $naam, $postcode, $telefoonnummer, $straat, $huisnummer);
            $_SESSION["gebruiker"] = serialize($gebruiker);
            setcookie("email", $email);
            header("location: Menu.php");
        } catch (OngeldigEmailadresException $e) {
            $error .= "Het ingevulde e-mailadres is geen geldig e-
            mailadres.<br>";
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "De ingevulde wachtwoorden komen niet overeen.<br>";
        } catch (GebruikerBestaatAlException $e) {
        $error .= "Er bestaat al een gebruiker met dit e-mailadres.<br>";
        } catch (PostcodeBestaatNietException $e) {
            $error .= "Postcode bestaat niet.";
        }
        if ($error == "" && isset($_SESSION["gebruiker"])) {
            $login = true;
        }
    }
}
include("presentation/loginPR.php");
?>
