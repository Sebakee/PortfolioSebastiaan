<?php
//business/Filmbeheer.php
declare(strict_types=1);

namespace Business;

use Data\ExemplaarDAO;
use Data\FilmsDAO;
use Data\UserDAO;
use Exceptions\FilmBestaalAlException;
use Exceptions\NummerAlExemplaarException;
use Exceptions\GebruikerBestaatAlException;

class Filmbeheer {

    public function filmlijst() : array{
        $fDAO = new FilmsDAO();
        $films = $fDAO->getAll();
        return $films;
    }

    public function getByNummer($nummer) {
        $eDAO = new ExemplaarDAO();
        $exemplaar = $eDAO->getByNummer($nummer);
        return $exemplaar;
    }

    public function createFilm(string $titel) {
        $fDAO = new FilmsDAO();
        $fDAO->createFilm($titel);
    }

    public function checkFilms($titel) {
        $fDAO = new FilmsDAO();
        $rowcount = $fDAO->checkTabel($titel);
        if($rowcount > 0){
            throw new FilmBestaalAlException();
        }

    }

    public function checkExemplaren(int $nummer) {
        $eDAO = new ExemplaarDAO();
        $rowcount = $eDAO->checkTabel($nummer);
        if($rowcount > 0){
            throw new NummerAlExemplaarException();
        }
    }

    public function createExemplaar($nummer, $titelID){
        $eDAO = new ExemplaarDAO();
        $eDAO->createExemplaar($nummer, $titelID);
    }

    public function deleteFilm(int $titelID){
        $eDAO = new ExemplaarDAO();
        $fDAO = new FilmsDAO();
        $eDAO->verwijderExemplaarByTitel($titelID);
        $fDAO->verwijderTitel($titelID);
    }

    public function deleteExemplaar(int $id){
        $eDAO = new ExemplaarDAO();
        $eDAO->verwijderExemplaar($id);
    }

    public function exemplarenLijst() : array{
        $eDAO = new ExemplaarDAO();
        $exemplaren = $eDAO->getAll();
        return $exemplaren;
    }

    public function getByAanwezigheid($aanwezig){
        $eDAO = new ExemplaarDAO();
        $exemplaren = $eDAO->getByAanwezigheid($aanwezig);
        return $exemplaren;
    }

    public function updateAanwezigheid(int $aanwezig, int $id){
        $eDAO = new ExemplaarDAO();
        $eDAO->updateAanwezigheid($aanwezig, $id);
    }

    public function login($email, $wachtwoord){
        $uDAO = new UserDAO();
        $gebruiker = $uDAO->login($email, $wachtwoord);
        return $gebruiker;
    }

    public function register($email, $wachtwoord, $herhaalwachtwoord){
        $uDAO = new UserDAO();
        $uDAO->register($email, $wachtwoord, $herhaalwachtwoord);
    }

    public function emailReedsInGebruik($email){
        $uDAO = new UserDAO();
        $rowcount = $uDAO->emailReedsInGebruik($email); 
        if ($rowcount > 0) {
            throw new GebruikerBestaatAlException();
        }
    }

    public function getByTitel($titelID){
        $eDAO = new ExemplaarDAO();
        $lijst = $eDAO->getByTitel($titelID);
        return $lijst;
    }
}
?>