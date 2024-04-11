<?php 
//presentation/voegFilmToe.php
declare(strict_types=1);
namespace Presentation;
use Exceptions\FilmBestaalAlException;

if(isset($_GET["action"]) && $_GET["action"] === "create")
{
    $titel = $_POST["titel"];
    if($titel == ""){
        echo "Voer een titel in.";
    }
    else{
        try{
   
            $klas->checkFilms($titel);
            $klas->createFilm($titel);
           
            header("location: Films.php?boodschap=titel toegevoegd!");
            echo "titel toegevoegd!";
     
        } catch (FilmBestaalAlException $e){
            echo "titel bestaat al.";
        }
    }
   
  
}
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>voeg titel toe</title>
<link rel="stylesheet" href="filmCss.css">
</head>

<body>
<?php include("Navigatie.php");?>
    <div class="formInvoer">
        <form action="filmsToevoegen.php?action=create" method="post">
            <label for="titel">titel:</label>
            
            <div class=formInput>
            <input class="toevoegen" type="text" class="tekst" name="titel">
           
            <input type="submit" value="toevoegen">
            </div>
           
        </form>
    </div>
   
    
</body>
</html>