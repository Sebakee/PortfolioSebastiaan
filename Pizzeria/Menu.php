<?php
//Index.php
declare(strict_types=1);
spl_autoload_register();



use Business\ProductBeheer;

$login = false;

$productB = new ProductBeheer();

$producten = $productB->productenlijst();
$error = "";

session_start();

if(isset($_GET["action"]) && $_GET["action"] === "clear"){
    unset($_SESSION['basket']);
    header('location: Menu.php');
}


if(isset($_GET["action"]) && $_GET["action"] === "logout"){
    unset($_SESSION['gebruiker']);
    header('location: Menu.php');
    echo 'Je bent uitgelogd.';
}



if(isset($_GET["afrekening"])){
    echo "Je bestelling is doorgestuurd!";
}

if(isset($_SESSION['gebruiker'])){
    $gebruiker = unserialize($_SESSION['gebruiker']);
    $login = true;
    $voornaam = $gebruiker->getVoornaam();
    echo " hallo " . $voornaam . "!";
}

if(isset($_GET["action"]) && $_GET["action"] === "afrekenen"){
    if (empty($_SESSION['basket'])) {
        echo " Je winkelmandje is leeg.";
    }
    else{
        if($_GET["login"] == false){
            echo "je moet je eerst registreren/inloggen om te kunnen afrekenen.";
        }
        else{
            header("location: Afrekenen.php");
        }
    } 
}



if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = [];
}

if (isset($_GET["action"]) && $_GET["action"] === "basket") {
       
        $productId = $_GET["product"];
        

        if (isset($_SESSION['basket'][$productId])) {
            
            $_SESSION['basket'][$productId]['aantal'] += 1;
        } else {
            if(isset($_SESSION['gebruiker'])){
                $gebruiker = unserialize($_SESSION['gebruiker']);
                //if($gebruiker->getPromotie() != null){
                    //$_SESSION['basket'][$productId] = [
                        //"productId" => $productId,
                        //"aantal" => $aantal,
                        //"promo" => $gebruiker->getPromotie()
                    //];
                //}
            }
            $_SESSION['basket'][$productId] = [
                "productId" => $productId,
                "aantal" => 1,
                "promo" => null
            ];
        
    
        header("location: Menu.php");
        }
        
        
}
   
    
include("presentation/IndexPR.php");
?>
