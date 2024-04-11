<?php
//data/filmsDAO.php
declare(strict_types=1);

namespace Data;
use \PDO;
use Exception;
use Data\DBConfig;
use Entities\Product;

class ProductenDAO{
    public function getAll(): ?array {
        try{
            $lijst = array();

            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * from producten";
            $resultSet = $dbh->query($sql);
    
            foreach($resultSet as $rij){
                $product = new Product((int)$rij["id"], (float)$rij["prijs"], $rij["ingredienten"],
                            $rij["soort"], $rij["naam"]);
                array_push($lijst, $product);
            }     
            $dbh = null;
            return $lijst;
        }catch(Exception $e){
            // LET OP!
            // De “echo” hier is een vereenvoudiging:
            // normaal ga je hier een gepaste exception “throwen”
            // niet rechtstreeks iets tonen op het scherm
            $error = "kan niet verbinden met database";
            echo $error;
            return null;
        }
        
    }

    public function getById($id) : ?Product{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * FROM Producten WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":id" => $id
            ));
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            $product = new Product((int)$id, (float)$rij["prijs"], $rij["ingredienten"],
            $rij["soort"], $rij["naam"]);
            $dbh = null;
            return $product;
        }catch(Exception $e){
            // LET OP!
            // De “echo” hier is een vereenvoudiging:
            // normaal ga je hier een gepaste exception “throwen”
            // niet rechtstreeks iets tonen op het scherm
            $error = "kan niet verbinden met database";
            echo $error;
            return null;
        }
       
    }
}
?>