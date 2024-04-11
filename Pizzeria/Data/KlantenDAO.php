<?php
//data/filmsDAO.php
declare(strict_types=1);

namespace Data;
use Entities\Klant;
use \PDO;
use Data\DBConfig;
use Exceptions\WachtwoordIncorrectException;
use Exceptions\GebruikerBestaatNietException;




class KlantenDAO{
    public function register($email, $wachtwoord, $herhaalwachtwoord, $voornaam, $naam, $adresId, $telefoonnummer, $straat, $huisnummer): ?Klant
    {
        try{
            $gebruiker = new Klant($voornaam, $naam, $adresId, $telefoonnummer, $straat, $huisnummer, $email);
            $gebruiker->setEmail($email);
            $gebruiker->setWachtwoord($wachtwoord, $herhaalwachtwoord);
           
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
    
            $stmt = $dbh->prepare("INSERT INTO klanten (email, wachtwoord, voornaam, naam, adresId, telefoonnummer, straat, huisnummer) VALUES
    
            (:email, :wachtwoord, :voornaam, :naam, :adresId, :telefoonnummer, :straat, :huisnummer)");
    
            $stmt->execute(array(
                ":email" => $email,
                ":wachtwoord" => $gebruiker->getWachtwoord(),
                ":voornaam" => $voornaam,
                ":naam" => $naam,
                ":adresId" => $adresId,
                ":telefoonnummer" => $telefoonnummer,
                ":straat" => $straat,
                ":huisnummer" => $huisnummer,
            ));
            
            $laatsteNieuweId = $dbh->lastInsertId();
            $dbh = null;
            $gebruiker->setId($laatsteNieuweId);
            
            return $gebruiker;
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

    public function login($email, $wachtwoord) : ?Klant{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * FROM Klanten WHERE email = :email";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":email" => $email
            ));
            
            $rowCount = $stmt->rowcount();
            if ($rowCount == 0) {
                throw new GebruikerBestaatNietException();
            }
            $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
            $isWachtwoordCorrect = password_verify($wachtwoord,
            $resultSet["wachtwoord"]);
            if (!$isWachtwoordCorrect) {
                throw new WachtwoordIncorrectException();
            }
            $gebruiker = new Klant($resultSet["voornaam"], $resultSet["naam"], (int)$resultSet["adresId"],
             $resultSet["telefoonnummer"], $resultSet["straat"], $resultSet["huisnummer"], 
             $email, $wachtwoord, (int)$resultSet["id"], $resultset["promotie"]);
            
            $dbh = null;
            return $gebruiker;
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

    public function getById($id) : ?Klant{
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "select * FROM Klanten WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ":id" => $id
            ));
            $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
            $gebruiker = new Klant($resultSet["voornaam"], $resultSet["naam"], (int)$resultSet["adresId"],
             $resultSet["telefoonnummer"], $resultSet["straat"], $resultSet["huisnummer"],
              $resultSet["email"], $resultSet["wachtwoord"], $id, (int)$resultSet["promotie"]);
            $dbh = null;
            return $gebruiker;
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

    public function Update($gebruiker){
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $sql = "update Klanten set naam = :naam, 
            voornaam = :voornaam, adresId = :adresId, telefoonnummer = :telefoonnummer
            , straat = :straat, huisnummer = :huisnummer WHERE id = :id";
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                ':naam' => $gebruiker->getNaam(),
                ':id' => $gebruiker->getId(),
                ':voornaam' => $gebruiker->getVoornaam(),
                ':adresId' => $gebruiker->getAdresId(),
                ':telefoonnummer' => $gebruiker->getTelefoonnummer(),
                ':straat' => $gebruiker->getstraat(),
                ':huisnummer' => $gebruiker->getHuisnummer()
            ));
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

    public function emailReedsInGebruik($email) : ?int
    {
        try{
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
            $stmt = $dbh->prepare("SELECT * FROM klanten WHERE email = :email");
            $stmt->bindValue(":email", $email);
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