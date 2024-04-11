<?php
//data/filmsDAO.php
declare(strict_types=1);

namespace Data;
use \PDO;
use Exception;
use Data\DBConfig;
use Entities\City;

class CitiesDAO{
    public function getByZipcode($zipcode) : ?City{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * from cities where zipcode = :zipcode";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":zipcode" => $zipcode
            ));
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            $city = new City((int)$rij["ID"], $zipcode, $rij["Name"], $rij["geenThuisBezorging"]);
            return $city;
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

    public function getById($id): ?City{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * from cities where ID = :ID";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":ID" => $id
            ));
            $rij = $stmt->fetch(PDO::FETCH_ASSOC);
            $city = new City($id, $rij["Zipcode"], $rij["Name"], $rij["geenThuisBezorging"]);
            return $city;
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

    public function postcodeBestaatNiet($postcode): ?int{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("SELECT * FROM cities WHERE zipcode = :zipcode");
            $stmt->bindValue(":zipcode", $postcode);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
    
            $dbh = null;
            return $rowCount;       
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