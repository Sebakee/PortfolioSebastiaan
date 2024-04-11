<?php 
//data/exemplaarDAO.php
declare(strict_types=1);

namespace Data;

use \PDO;
use Entities\Exemplaar;
use Data\DBConfig;
use Exceptions\NummerGeenExemplaarException;


class ExemplaarDAO {
    public function getAll() : array {
        $lijst = array();

        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select exemplaren.id, nummer, titel, aanwezig 
        from films, exemplaren where films.id = exemplaren.titelID";
        $resultSet = $dbh->query($sql);
        foreach($resultSet as $rij){
            $exemplaar = new Exemplaar((int)$rij["id"], $rij["titel"],
            $rij['nummer'], $rij["aanwezig"]);
            array_push($lijst, $exemplaar);
        }
        $dbh = null;
        return $lijst;
    }

    public function getByNummer($nummer): Exemplaar {
        
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select exemplaren.id, nummer, titel, aanwezig 
        from films, exemplaren where films.id = exemplaren.titelID and nummer = :nummer";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":nummer" => (int)$nummer
        ));
        $rowcount = $stmt->rowcount();
        if($rowcount == 0){
            throw new NummerGeenExemplaarException();
        }
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        $exemplaar = new Exemplaar($rij["id"],
         $rij["titel"], (int)$nummer, $rij["aanwezig"]);
        $dbh = null;
        return $exemplaar;
    }

    public function createExemplaar($nummer, $titelID){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "insert into exemplaren (nummer, titelID,
         aanwezig) values (:nummer, :titelID, 1)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':nummer' => $nummer,
            ":titelID" => $titelID
        ));
        $dbh = null;
    }

    public function checkTabel(int $nummer) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select nummer from exemplaren where nummer = :nummer";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":nummer" => $nummer
        ));
        $rowcount = $stmt->rowCount();
        $dbh = null;
        return $rowcount;
    }

    public function verwijderExemplaarByTitel(int $titelID) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "delete from exemplaren where titelID = :titelID";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":titelID" => $titelID
        ));
        $dbh = null; 
    }   

    public function verwijderExemplaar(int $id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "delete from exemplaren where id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ":id" => $id
        ));
        $dbh = null; 
    }

    public function getByAanwezigheid(int $aanwezig) {
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select exemplaren.id, nummer, titel, aanwezig 
        from films, exemplaren where films.id = exemplaren.titelID and aanwezig = :aanwezig";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':aanwezig' => $aanwezig));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultSet as $rij){
            $exemplaar = new Exemplaar((int)$rij["id"], $rij["titel"],
            $rij['nummer'], $rij["aanwezig"]);
            array_push($lijst, $exemplaar);
        }
        $dbh = null;

        return $lijst;
    }

    public function updateAanwezigheid(int $aanwezig, int $id){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "update exemplaren set 
        aanwezig = :aanwezig where id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
        ':aanwezig' => $aanwezig,
        ':id' => $id
        ));
        $dbh = null;
    }

    public function getByTitel($titelID){
        $lijst = array();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select exemplaren.id, nummer, titel, aanwezig 
        from films, exemplaren where films.id = exemplaren.titelID and titelID = :titelID";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':titelID' => $titelID));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($resultSet as $rij){
            $exemplaar = new Exemplaar((int)$rij["id"], $rij["titel"],
            $rij['nummer'], $rij["aanwezig"]);
            array_push($lijst, $exemplaar);
        }
        $dbh = null;

        return $lijst;
    }
}
?>