<?php
//presentation/loginPR.php
namespace Presentation;
use Exceptions\WachtwoordIncorrectException;
use Exceptions\GebruikerBestaatNietException;


$error = "";
if (isset($_POST["btnLogin"])) {
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
            
            $gebruiker = $klas->login($email, $wachtwoord);
            $_SESSION["gebruiker"] = serialize($gebruiker);
            header("location: Films.php?boodschap=welkom " . $email . "!");
        } catch (WachtwoordIncorrectException $e) {
            $error .= "Het wachtwoord is niet correct.<br>";
        } catch (GebruikerBestaatNietException $e) {
            $error .= "Er bestaat geen gebruiker met dit e-mailadres.<br>";
        }
    }
}
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>inloggen</title>
<link rel="stylesheet" href="loginCss.css">
</head>
<body>

<?php

if (!isset($_SESSION["gebruiker"]))
{
?>

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>"
method="POST">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input name="txtEmail" type="text" class="login__input" placeholder="Email">
				</div>
				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input name="txtWachtwoord" type="password" class="login__input" placeholder="Password">
				</div>
				<button class="button login__submit" name="btnLogin">
					<span class="button__text">Log In Now</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>				
			</form>
			
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>		
	</div>
</div>

<?php
}
echo "<div class=error>" . $error . "</div>";

?>


<h1><a href="login.php">login</a></h1>
<?php

if (!isset($_SESSION["gebruiker"]))
{
?>
<form class="login" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>"
method="POST">
<input type="email" placeholder="email" name="txtEmail"><br>
<input type="password" placeholder="wachtwoord" name="txtWachtwoord"><br>
<input type="submit" value="Inloggen" name="btnLogin">
</form>
<?php
}
echo "<div class=error>" . $error . "</div>";

?>
</body>
</html>
