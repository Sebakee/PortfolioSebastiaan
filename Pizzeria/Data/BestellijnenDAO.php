<?php
//data/filmsDAO.php
declare(strict_types=1);

namespace Data;
use Entities\Bestellijn;
use \PDO;
use Data\DBConfig;

class BestellijnenDAO{
    public function getAll(): ?array {
        try{
            $lijst = array();

            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * from bestellijn";
            $resultSet = $dbh->query($sql);
    
            foreach($resultSet as $rij){
                $bestellijn = new bestellijn((int)$rij["bestelId"], (int)$rij["productId"],
                 (int)$rij["aantal"], (int)$rij["id"], (int)$rij["afgewerkt"]);
                array_push($lijst, $bestellijn);
            }     
            $dbh = null;
            return $lijst;
        } catch(Exception $e){
            // LET OP!
            // De “echo” hier is een vereenvoudiging:
            // normaal ga je hier een gepaste exception “throwen”
            // niet rechtstreeks iets tonen op het scherm
            $error = "kan niet verbinden met database";
            echo $error;
            return null;
        }
       
    }

    public function getById($id): ?array{
        try{
            $lijst = array();

            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * from bestellijn where bestelId = :bestelId";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":bestelId" => $id
            ));
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach($resultSet as $rij){
                $bestellijn = new bestellijn((int)$rij["bestelId"], (int)$rij["productId"],
                 (int)$rij["aantal"], (int)$rij["id"], (int)$rij["afgewerkt"]);
                array_push($lijst, $bestellijn);
            }     
            $dbh = null;
            return $lijst;
        } catch(Exception $e){
            // LET OP!
            // De “echo” hier is een vereenvoudiging:
            // normaal ga je hier een gepaste exception “throwen”
            // niet rechtstreeks iets tonen op het scherm
            $error = "kan niet verbinden met database";
            echo $error;
            return null;
        }
    }

    public function createBestellijn($bestelId, $productId, $aantal){
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "insert into bestellijn (bestelId, productId, aantal) values (:bestelId, :productId, :aantal)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':bestelId' => $bestelId, ':productId' => $productId, ':aantal' => $aantal));
            $dbh = null;
        }catch(Exception $e){
        // LET OP!
        // De “echo” hier is een vereenvoudiging:
        // normaal ga je hier een gepaste exception “throwen”
        // niet rechtstreeks iets tonen op het scherm
        $error = "kan niet verbinden met database";
        echo $error;
        }
        
    }
}