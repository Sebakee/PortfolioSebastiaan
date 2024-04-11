<?php 
declare(strict_types=1);
namespace Presentation;
use Exceptions\NummerAlExemplaarException;
//presentation/voegExemplaarToe.php

if(isset($_GET["action"]) && $_GET["action"] === "create")
{
    $titelID = $_POST["titel"];
    $nummer = (int)$_POST["nummer"];
    if($nummer == null){
        echo "voer een nummer in.";
    }
    else{
        if(is_int($nummer) == false OR $nummer == 0){
            echo "voer een nummer in.";
        }
        else{
            try{
                $klas->checkExemplaren((int) $nummer);
                $klas->createExemplaar($nummer, $titelID);
                header("location: Films.php?boodschap=exemplaar toegevoegd!");
               
            } catch (NummerAlExemplaarException $e){
                echo "nummer is al een exemplaar.<br>" ;
            }
        }
    }
   
    
    
}
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>voeg exemplaar toe</title>
<link rel="stylesheet" href="filmCss.css">
</head>

<body>
    <?php 
    $filmlijst = $klas->filmlijst();
    include("Navigatie.php");
   ?>
  
   <div class="formInvoer">
    <form action="exemplaren.php?action=create" method="post">
        <label for="titel">titel</label>
        <div class=formInput>
        <select name="titel" id="titel">
            <?php foreach($filmlijst as $film){
                ?><option value=<?php print($film->getid());?>><?php print($film->getTitel());?></option>
            <?php } ?>
        </select>
        </div>
            
            
        
        <br>
        <br>
        <label class="exemplaar" for="nummer">exemplaarnummer</label>
            
        <div class="formInput">
        <input class="toevoegen" type="text" class="tekst" name="nummer">
        <input  type="submit" value="toevoegen">
        </div>
            
            
        </form>
   </div>
</body>
</html>