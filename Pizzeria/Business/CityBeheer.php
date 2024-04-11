<?php
//business/Filmbeheer.php
declare(strict_types=1);

namespace Business; 

use Data\CitiesDAO;
use Exceptions\PostcodeBestaatNietException;

class CityBeheer{
    public function postcodeBestaatNiet($postcode){
        $cDAO = new CitiesDAO();
        $rowcount = $cDAO->postcodeBestaatNiet($postcode);
        if ($rowcount == 0) {
            throw new PostcodeBestaatNietException();
        }
    }

    public function getByIdCities($id){
        $cDAO = new CitiesDAO();
        $city = $cDAO->getById($id);
        return $city;
    }

    public function getByZipcode($zipcode){
        $cDAO = new CitiesDAO();
        $city = $cDAO->getByZipcode($zipcode);
        return $city;
    }

}

?>