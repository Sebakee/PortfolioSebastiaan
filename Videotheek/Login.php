<?php
//login.php
declare(strict_types=1);
spl_autoload_register();

use Business\Filmbeheer;

$klas = new Filmbeheer();
include("presentation/loginPR.php");
?>
