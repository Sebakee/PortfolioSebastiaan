<?php 
use Exceptions\GeenIdDoorgegevenException;
?>
<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>menu</title>
<link rel="stylesheet" href="menuCss.css">
</head>
<body>
    <div class="fixed">
    <h1><span class="titel"><em>Pizzeria</em></span></h1>
    <nav><ul>
    <li><a href="Menu.php">menu</a></li>
    <li><a href="Bestellingen.php">bestellingen</a></li> 
        <?php
            if($login == false){
                ?>
                <li class="login"><a href='Login.php'>login/register</a></li>
                <?php
            }
            else{
                ?>
                <li class="login"><a href='Menu.php?action=logout'>logout</a></li>
                <?php
            }
        ?>
          
    </ul>
    </nav>
    </div>
    
    

    <div class="menu">
        <h2>Menu</h2>
        <table>
                <?php
        if($producten){
            foreach ($producten as $product) {
                ?> 
                <tr>
                    <td><a href="Menu.php?action=basket&product=<?php echo $product->getId() ?>"><img class="add" src="images/add-button.svg" alt=""></a></td>
                    <td><?php echo $product->getNaam()?></td>
                    <td><?php echo $product->getIngredienten()?></td>
                    <td><?php echo "€" . $product->getPrijs()?></td>
                    
                    
                </tr>
                <?php
            }
        }


        ?>    
        </table> 
    
    </div>

    <div class="winkelmandje">
        <h2>winkelmandje</h2>
        <?php
            if (empty($_SESSION['basket'])) {
                ?>
                <p class="empty">Jouw winkelmandje is leeg!</p>
                <?php
            } else {?>
                <table>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                   
                </tr><?php

                $totalPrice = 0;
                
                foreach ($_SESSION['basket'] as $productId => $item) {
                    $id = $item["productId"];
                        try{
                            $productW = $productB->getByIdProducten($id);
                            $prijsP = $productW->getPrijs() * $item["aantal"];
                            ?>
                            <tr>
                            <td> <?php echo $productW->getNaam()?></td>
                            <td> <?php echo '€' . $prijsP?></td>
                            <td> <?php echo $item["aantal"]?></td>
                            
                            </tr>
                            <?php
                            $totalPrice += $prijsP;
                            $error = "";
                            
                    
                        } catch(GeenIdDoorgegevenException $e){
                            $error = 'Je hebt geen product geselecteerd.';
                            
                        }
                }
                ?>

                <tr><th colspan=2 class="totaal"> €<?php echo $totalPrice?> </th></tr>

                </table>
                <?php
                echo $error;

            }
        ?>
            <a  id="clear" href="Menu.php?action=clear&login=<?php echo $login;?>">clear</a>

            <a id="afrekenen" href="Menu.php?action=afrekenen&login=<?php echo $login;?>">afrekenen</a>

       
        </div>
</body>