<?php
//data/filmsDAO.php
declare(strict_types=1);

namespace Data;

use Entities\Film;
use Data\DBConfig;
use Data\ExemplaarDAO;
use \PDO;
use Exceptions\FilmBestaalAlException;



class FilmsDAO{
    public function getAll() : array {
        $lijst = array();
        $lijstE = array();
        $eDAO = new exemplaarDAO();
        $exemplaren = $eDAO->getAll();

        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select titel, id
        from films";
        $resultSet = $dbh->query($sql);

        foreach($resultSet as $rij){
            foreach($exemplaren as $exemplaar){
                $eTitel = $exemplaar->getTitel();
                if($rij["titel"] == $eTitel){
                    array_push($lijstE, $exemplaar);
                }
            }
            $film = new Film((int)$rij["id"], $rij["titel"], $lijstE);
            array_push($lijst, $film);
            $lijstE = [];
        }     
        $dbh = null;
        return $lijst;
    }

    public function createFilm(string $titel){
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "insert into films (titel) values (:titel)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':titel' => $titel,
        ));
        $dbh = null;
    }

    public function checkTabel(string $titel) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select titel from films where titel = :titel";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':titel' => $titel
        ));
        $rowcount = $stmt->rowcount();
    
        $dbh = null;
        return $rowcount;
    }

    public function verwijderTitel($titelID) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "delete from films where id = :titelID";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':titelID' => $titelID));
        $dbh = null;
    }
}

?>