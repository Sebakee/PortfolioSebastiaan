<?php 
//presentation/verwijderFilmPR.php
declare(strict_types=1);
if(isset($_GET["action"]) && $_GET["action"] === "delete")
{
    $titelID = $_POST["titel"];
    $klas->deleteFilm((int)$titelID);
    echo "titel verwijderd!";
    header("location: Films.php?boodschap=titel verwijderd!");
}
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>verwijder titel</title>
<link rel="stylesheet" href="filmCss.css">
</head>

<body>
<?php 
    include("Navigatie.php");
    $filmlijst = $klas->filmlijst();
   ?>
<div class="formInvoer">
<form action="verwijderFilm.php?action=delete" method="post">
        <label for="titel">titel</label>
        <div class="formInput">
        <select name="titel" id="titel">
            <?php foreach($filmlijst as $film){
                ?><option value=<?php print($film->getid());?>><?php print($film->getTitel());?></option>
            <?php } ?>
        </select>
        <input type="submit" value="verwijder"> <p>Pas op! als je op verwijder drukt zijn alle exemplaren van deze film weg!</p>
        </div>
       
</form>
</div>

</body>
</html>