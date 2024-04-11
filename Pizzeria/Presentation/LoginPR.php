<?php
//presentation/LoginPR.php
namespace Presentation;

?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>registreren</title>
<link rel="stylesheet" href="login.css">
</head>
<body>
    <h1><span class="titel"><em>Pizzeria</em></span></h1>
    <nav><ul>
    <li><a href="Menu.php">menu</a></li>
  
          
    </ul>
    </nav>
    
    <h2>Login</h2>
    <?php 
    if(!empty($_COOKIE["email"])){
        ?>
    <form class="login" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>"
    method="POST">
    <input type="email" placeholder="email" name="txtEmail" value=<?php echo $_COOKIE["email"] ?>><br>
    <input type="password" placeholder="wachtwoord" name="txtWachtwoord"><br>
    <input type="submit" value="Inloggen" name="btnLogin">
    </form>
        <?php
    }
    else{
    ?>
    <form class="login" action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>"
    method="POST">
    <input type="email" placeholder="email" name="txtEmail"><br>
    <input type="password" placeholder="wachtwoord" name="txtWachtwoord"><br>
    <input type="submit" value="Inloggen" name="btnLogin">
    </form>
    <?php
    }
    if($nummer == 1){
        echo "<div class=error>" . $error . "</div>";
    }
    
    ?>

        
    <h2>Registreren</h2>

    <?php

    ?>
    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>"

    method="POST">


    <input type="text" placeholder="voornaam" name="txtVoornaam">
    <input type="text" placeholder="naam" name="txtNaam"><br>
    <input type="text" placeholder="telefoonnummer" name="txtTelefoonnummer"><br>
    <input type="text" placeholder="postcode" name="txtPostcode">
    <input type="text" placeholder="straat" name="txtStraat">
    <input type="text" placeholder="huisnummer" name="txtHuisnummer"><br>
    <input type="email" placeholder="email" name="txtEmail"><br>
    <input type="password" placeholder="wachtwoord" name="txtWachtwoord">
    <input type="password" placeholder="herhaal wachtwoord" name="txtWachtwoordHerhaal"><br>

    <input type="submit" value="registreren" name="btnRegistreer">
    </form> 
    <?php 
    if($nummer == 0){
        ?>
        <div class=error><?php echo $error?></div>
        <?php
    }

    
    ?>

    

</body>
</html>