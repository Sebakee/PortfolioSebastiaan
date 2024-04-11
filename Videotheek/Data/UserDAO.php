<?php
//data/filmsDAO.php
declare(strict_types=1);

namespace Data;

use Entities\User;
use Data\DBConfig;
use Exceptions\GebruikerBestaatNietException;
use Exceptions\WachtwoordIncorrectException;
use \PDO;

class UserDAO{
    public function login($email, $wachtwoord)
    {
       
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare("SELECT id, wachtwoord FROM users WHERE email =
        :email");
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
        $gebruiker = new User($resultSet["id"], $email, $wachtwoord);
        $dbh = null;
        return $gebruiker;
        
    }

    public function register($email, $wachtwoord, $herhaalwachtwoord)
    {
        $gebruiker = new User();
        $gebruiker->setEmail($email);
        $gebruiker->setWachtwoord($wachtwoord, $herhaalwachtwoord);
       
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);

        $stmt = $dbh->prepare("INSERT INTO users (email, wachtwoord) VALUES

        (:email, :wachtwoord)");

        $stmt->execute(array(
            ":email" => $email,
            ":wachtwoord" => $gebruiker->getWachtwoord()
        ));
        $dbh = null;
    }


    public function emailReedsInGebruik($email)
    {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING,
        DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();

        $dbh = null;
        return $rowCount;       
    }
}