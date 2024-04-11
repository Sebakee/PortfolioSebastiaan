<!DOCTYPE HTML>
<!--presentation/filmlijst.php-->
<html>
<head>

<meta charset=utf-8>
<title>menu</title>
<link rel="stylesheet" href="BestellingenP.css">
</head>
<body>
    <div class="fixed">
        <h1><span class="titel"><em>Pizzeria</em></span></h1>
        <nav><ul>
        <li><a href="Menu.php">menu</a></li>
        </ul>
        </nav>
    </div>

    <h2>Bestellingen</h2>
       <?php 

       
       if($lijstBestellingen){
            foreach($lijstBestellingen as $bestelling){
                $bestelId = $bestelling->getBestelId();
                $lijstBestellijnen = $bestellijnB->getByBestelId($bestelId);
                ?>
                    <h3><?php echo $bestelling->getDatum() . " " . $bestelling->getTijdstip()  ?></h3>
                        
                           
                    <?php 
                    foreach($lijstBestellijnen as $bestellijn){
                        $product = $productB->getByIdProducten($bestellijn->getProductId());
                                ?>
                        <table>
                            <tr>
                                <td><?php echo $product->getNaam()?></td>
                                <td><?php echo "€" . $product->getPrijs()?></td>
                                <td><?php echo $bestellijn->getAantal()?></td>
                            </tr>
                        </table>
 
                    <?php
                    }
                    ?>
                           
                       
                    
                <?php
            }

       }
       
       ?>
       
    </table>
    </div>
</body>