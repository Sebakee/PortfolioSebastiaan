<?php 
//presentation/verwijderExemplaarPR.php
declare(strict_types=1);
if(isset($_GET["action"]) && $_GET["action"] === "delete")
{
    $id = $_POST["exemplaar"];
    $klas->deleteExemplaar((int)$id);
    echo "exemplaar verwijderd!";
    header("location: Films.php?boodschap=exemplaar verwijderd!");
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
    $exemplaren = $klas->exemplarenLijst();
?>
<div class="formInvoer">
<form action="verwijderExemplaar.php?action=delete" method="post">
        <label for="titel">exemplaarnummer</label>
        <div class="formInput">
        <select name="exemplaar" id="exemplaar">
            <?php foreach($exemplaren as $exemplaar){
                ?><option value=<?php print($exemplaar->getId());
                ?>><?php print($exemplaar->getExemplaar());?></option>
            <?php } ?>
        </select>
        <input type="submit" value="verwijder"> <p>Pas op! als je op verwijder drukt is dit exemplaar verwijderd!</p>
        </div>
        
</form>
</div>

</body>
</html>