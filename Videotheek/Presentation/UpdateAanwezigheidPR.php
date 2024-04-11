<?php 
//presentation/updateAanwezigheidPR.php
declare(strict_types=1);
namespace Presentation;
use Exceptions\NummerGeenExemplaarException;
$boodschap = "";

if(isset($_GET["action"]) && $_GET["action"] === "update")
{

    try{
        $exemplaar = $klas->getByNummer((int)$_POST["exemplaar"]);
        $id = $exemplaar->getId();
        $aanwezig = 0;
        if($exemplaar->getAanwezig() == 0){
            $aanwezig = 1;
            $klas->updateAanwezigheid((int)$aanwezig, (int)$id);
            $boodschap = "titel terug gebracht!";
        }
        else{
            $aanwezig = 0;
            $klas->updateAanwezigheid((int)$aanwezig, (int)$id);
            $boodschap = "titel gehuurd!";
        }
        header("location: films.php?boodschap=" . $boodschap);
    } catch (NummerGeenExemplaarException $e){
        echo "Exemplaar niet gevonden.";
    }
    
}
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>film huren/terugbrengen</title>
<link rel="stylesheet" href="filmCss.css">
</head>

<body>
<?php
    include("Navigatie.php");

    $exemplarenA = $klas->getByAanwezigheid(1);
    $exemplarenN = $klas->getByAanwezigheid(0);
?>
<div class="formInvoer">
<form action="updateAanwezigheid.php?action=update" method="post">
    <label for="">exemplaren aanwezig</label>
    <div class="formInput">
        <select name="exemplaar" id="exemplaar">
            <?php foreach($exemplarenA as $exemplaar){
                ?><option value=<?php print($exemplaar->getexemplaar());
                ?>><?php print($exemplaar->getExemplaar());?></option>
            <?php } ?>
        </select>
        <input type="submit" value="huren">
    </div>
</form>

<form class="verhuren" action="updateAanwezigheid.php?action=update" method="post">
    <label for="">exemplaren verhuurd</label>
    <div class="formInput">
        <select name="exemplaar" id="exemplaar">
            <?php foreach($exemplarenN as $exemplaar){
                ?><option value=<?php print($exemplaar->getexemplaar());
                ?>><?php print($exemplaar->getExemplaar());?></option>
            <?php } ?>
        </select>
    <input type="submit" value="terugbrengen">
    </div>
</form>
</div>

</body>
</html>