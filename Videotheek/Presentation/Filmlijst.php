<?php
//presentation/filmlijst.php
declare(strict_types=1);
namespace Presentation;
use Exceptions\NummerGeenExemplaarException;
$boodschap = "";
$nummer = 0;
$error = "";
$aantal = 0;

if(isset($_GET["action"]) && $_GET["action"] === "zoeken")
{
    $nummer = (int)$_POST["nummer"]; 
}
if(isset($_GET["boodschap"])){
    $boodschap = $_GET["boodschap"];
}
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>lijst films</title>
<link rel="stylesheet" href="filmCss.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<?php echo $boodschap;
include("Navigatie.php");
?>
<form class="zoek" action="films.php?action=zoeken" method="post">

    <input class="zoeken" type="text" placeholder="search number.." name="nummer">
    <button type="submit"><i class="fa fa-search"></i></button>
    
  
</form>

<br>

    <table>
        <tr>
            <th>Titel</th>
            <th>Nummer</th>
            <th>aantal exemplaren</th>
        </tr>
        <?php
        if($nummer == 0){
            foreach($filmlijst as $film) {
                $aantal = 0;?>
                <tr>
                <td><?php print($film->getTitel());?></td>
                <td>
                <?php $exemplaren = $klas->getByTitel($film->getId());
                foreach($exemplaren as $exemplaar){
                    
                    $aanwezig = $exemplaar->getAanwezig();
                    if($aanwezig == 0){
                        print($exemplaar->getExemplaar() . " ");    
                    }
                    else {
                        ?> <b><?php print($exemplaar->getExemplaar() . " ");?></b><?php
                        $aantal += 1;
                    }
                }
               ?>
                </td>
                <td>
                    <?php print($aantal);?>
                </td>
               </tr>
               <?php
            }
        }
        else{
            try{
                $exemplaarN = $klas->getByNummer((int)$nummer); 
                foreach($filmlijst as $film) {
                $aantal = 0;
                    if($exemplaarN->getTitel() == $film->getTitel())
                    {
                        ?>
                        <tr>
                        <td><?php print($film->getTitel());?></td>
                        <td>
                        <?php $exemplaren = $klas->getByTitel($film->getId());
                        foreach($exemplaren as $exemplaar){
                            $aantal += 1;
                            $aanwezig = $exemplaar->getAanwezig();
                            if($aanwezig == 0){
                                print($exemplaar->getExemplaar() . " ");
                            }
                            else {
                                ?> <b><?php print($exemplaar->getExemplaar() . " ");?></b><?php
                            }
                        }
                       ?>
                        </td>
                        <td>
                            <?php print($aantal);?>
                        </td>
                       </tr>
                       <?php
                    }
                
               }
            } catch (NummerGeenExemplaarException $e){
                $error .= "exemplaar niet gevonden.<br>";
            } 
            print($error);
        }
        
        ?>
    </table>
    
</body>
</html>