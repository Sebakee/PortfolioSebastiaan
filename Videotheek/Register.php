<?php
//register.php
declare(strict_types=1);
spl_autoload_register();


use Business\Filmbeheer;


$klas = new Filmbeheer();
//presentation/registerPR.php
use Exceptions\OngeldigEmailadresException;
use Exceptions\WachtwoordenKomenNietOvereenException;
use Exceptions\GebruikerBestaatAlException;

$error = "";
$login = false;
if (isset($_POST["btnRegistreer"])) {
    $email = "";
    $wachtwoord = "";
    $wachtwoordHerhaal = "";
    if (!empty($_POST["txtEmail"])) {
        $email = $_POST["txtEmail"];
    } else {
        $error .= "Het e-mailadres moet ingevuld worden.<br>";
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
            $klas->emailReedsInGebruik($email);
            $gebruiker = $klas->register($email, $wachtwoord, $wachtwoordHerhaal);
            $_SESSION["gebruiker"] = serialize($gebruiker);
            header("location: Films.php?boodschap=welkom ". $email . "!");
        } catch (OngeldigEmailadresException $e) {
            $error .= "Het ingevulde e-mailadres is geen geldig e-
            mailadres.<br>";
        } catch (WachtwoordenKomenNietOvereenException $e) {
            $error .= "De ingevulde wachtwoorden komen niet overeen.<br>";
        } catch (GebruikerBestaatAlException $e) {
            $error .= "Er bestaat al een gebruiker met dit e-mailadres.<br>";
        }
        if ($error == "" && isset($_SESSION["gebruiker"])) {
            $login = true;
        }
    }
}

include("presentation/registerPR.php");
?>
