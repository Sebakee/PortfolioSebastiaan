<?php
//business/Filmbeheer.php
declare(strict_types=1);

namespace Business;

use Data\ProductenDAO;
use Exceptions\GeenIdDoorgegevenException;

class ProductBeheer{
    public function productenlijst() : array{
        $pDAO = new ProductenDAO();
        $producten = $pDAO->getAll();
        return $producten;
    }

    public function getByIdProducten($id){
        if($id == null){
            throw new GeenIdDoorgegevenException;
        }
        $pDAO = new ProductenDAO();
        $product = $pDAO->getById($id);
        return $product;
    }
}

?>