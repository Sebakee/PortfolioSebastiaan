<?php
//presentation/registerPR.php
namespace Presentation;
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
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>registreren</title>
<link rel="stylesheet" href="logins.css">
</head>
<body>
    
<h1> <a href="register.php">Registreren</a></h1>

<?php

if (!isset($_SESSION["gebruiker"]))
{
?>
<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>"

method="POST">

<input type="email" placeholder="email" name="txtEmail"><br>
<input type="password" placeholder="wachtwoord" name="txtWachtwoord"><br>

<input type="password" placeholder="herhaal wachtwoord"
name="txtWachtwoordHerhaal"><br>

<input type="submit" value="registreren" name="btnRegistreer">
</form> 
<?php 
}

echo "<div class=error>" . $error . "</div>";
?>

 

</body>
</html>