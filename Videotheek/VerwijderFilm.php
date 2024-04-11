<?php
//verwijderFilm.php
declare(strict_types=1);
spl_autoload_register();

use Business\Filmbeheer;
$klas = new Filmbeheer();
include("presentation/verwijderFilmPR.php");
?>
