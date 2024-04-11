<?php 
use Exceptions\GeenIdDoorgegevenException;
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>menu</title>
<link rel="stylesheet" href="afrekenen.css">
</head>
<body>
<h1><span class="titel"><em>Pizzeria</em></span></h1>
    <nav><ul>
    <li><a href="Menu.php">menu</a></li>
    <li><a href="Bestellingen.php">bestellingen</a></li> 
          
    </ul>
    </nav>
    
    <div class="formInvoer">
    <form action="afrekenen.php?action=afrekenen" method="post">
        <label for="">email:</label>
        <div class="formInput">
        <label for=""><?php echo $gebruiker->getEmail(); ?></label>
        </div>
        <br><br>
        <label for="">voornaam:</label>
        <div class="formInput">
        <input name="voornaam" class="tekst" type="text" placeholder=<?php echo $gebruiker->getVoornaam(); ?>>
        </div>
        <br><br>
        <label for="">naam:</label>
        <div class="formInput">
        <input name="naam" class="tekst" type="text" placeholder=<?php echo $gebruiker->getNaam(); ?>>
        </div>
        <br><br>
        <label for="">telefoonnummer:</label>
        <div class="formInput">
    <input name="telefoonnummer" class="tekst" type="text" placeholder=<?php echo $gebruiker->getTelefoonnummer(); ?>>
    </div>
        <br><br>
        <label for="">adres:</label>
        <div class="formInput">
        <input name="zipcode" class="tekst" type="text" placeholder=<?php echo $city->getZipcode(); ?>>
        <input name="straat" class="tekst" type="text" placeholder=<?php echo $gebruiker->getStraat(); ?>>
        <input name="huisnummer" class="tekst" type="text" placeholder=<?php echo $gebruiker->getHuisnummer(); ?>>
        </div>
       
        <br><br>
        <div class="formInput"><input type="text" id="informatie" name="informatie" placeholder="informatie koerier"></div>
        
<br>
        <div class="bestellingen">
        <table>
            <tr>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        <?php 
    
        $totalPrice = 0;
        
        foreach ($_SESSION['basket'] as $productId => $item) {
            $id = $item["productId"];
            try{
            $productW = $productB->getByIdProducten($id);
            $prijsP = $productW->getPrijs() * $item["aantal"];
            ?>
            <tr>
            <td><?php echo $productW->getNaam()?></td>
            <td> € <?php echo $prijsP?> </td>
            <td> <?php echo $item["aantal"] ?></td>
            
            </tr>
            <?php
            $totalPrice += $prijsP;
            } catch(GeenIdDoorgegevenException $e){
                
            }
           
        }
        ?>
        <tr><td><b>totaal</b></td><td> <b>€ <?php echo $totalPrice?></b></td><td></td></tr>
    
        </table>
        </div>
        
        <button>afrekenen</button>
    </form>
    </div>
</body>