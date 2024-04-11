<?php
//films.php
declare(strict_types=1);
spl_autoload_register();


use Business\Filmbeheer;


$klas = new Filmbeheer();
$filmlijst = $klas->filmlijst();
include("presentation/filmlijst.php");
?>
