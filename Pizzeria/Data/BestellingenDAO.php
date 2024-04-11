<?php
//data/filmsDAO.php
declare(strict_types=1);

namespace Data;
use \PDO;
use Exception;
use Data\DBConfig;
use Entities\Bestelling;
 
class BestellingenDAO{

    public function getAll(): ?array {
        try{
            $lijst = array();

            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * from bestellingen";
            $resultSet = $dbh->query($sql);
    
            foreach($resultSet as $rij){
                $bestelling = new Bestelling((int)$rij["klantnummer"], (int)$rij["bestelId"],
                 $rij["datum"], $rij["tijdstip"], (string)$rij["informatiekoerier"]);
                array_push($lijst, $bestelling);
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

    public function getByKlantId($klantId) : ?array{
        try{
            $lijst = array();

            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * from bestellingen where klantnummer = :klantId";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":klantId" => $klantId
            ));
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            foreach($resultSet as $rij){
                $bestelling = new Bestelling((int)$rij["klantnummer"], (int)$rij["bestelId"],
                 $rij["datum"], $rij["tijdstip"]);
                array_push($lijst, $bestelling);
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

    public function getById($id) : ?Bestelling{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * FROM bestellingen WHERE bestelId = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":id" => $id
            ));
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            $bestelling = new Bestelling((int)$rij["klantnummer"], $id, $rij["datum"], $rij["tijdstip"],
            (string)$rij["informatieKoerier"]);
            $dbh = null;
            return $bestelling;
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

    public function createBestelling($klantnummer, $informatie): ?string{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "insert into bestellingen (klantnummer, informatieKoerier, datum, tijdstip) values (:klantnummer, :informatieKoerier, :datum, :tijdstip)";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(':klantnummer' => $klantnummer, ':informatieKoerier' => $informatie, ':datum' => date("d-m-y"), ':tijdstip' => date("h:i:sa")));
            $id = $dbh->lastInsertId();
            return $id;
            $dbh = null;
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