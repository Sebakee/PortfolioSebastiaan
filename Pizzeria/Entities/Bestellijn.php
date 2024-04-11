<?php 
    namespace Entities;

    class Bestellijn{
        private int $bestelId;
        private int $productId;
        private int $aantal;
        private int $id;
        private int $afgewerkt;

        public function __construct(int $bestelId = 0, int $productId, int $aantal, int $id, int $afgewerkt){
            $this->bestelId = $bestelId;
            $this->productId = $productId;
            $this->aantal = $aantal;
            $this->id = $id;
            $this->afgewerkt = $afgewerkt;
        }

        /**
         * Get the value of bestelId
         */ 
        public function getBestelId()
        {
                return $this->bestelId;
        }

        /**
         * Set the value of bestelId
         *
         * @return  self
         */ 
        public function setBestelId($bestelId)
        {
                $this->bestelId = $bestelId;

                return $this;
        }

        /**
         * Get the value of productId
         */ 
        public function getProductId()
        {
                return $this->productId;
        }

        /**
         * Set the value of productId
         *
         * @return  self
         */ 
        public function setProductId($productId)
        {
                $this->productId = $productId;

                return $this;
        }

        /**
         * Get the value of aantal
         */ 
        public function getAantal()
        {
                return $this->aantal;
        }

        /**
         * Set the value of aantal
         *
         * @return  self
         */ 
        public function setAantal($aantal)
        {
                $this->aantal = $aantal;

                return $this;
        }

        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of afgewerkt
         */ 
        public function getAfgewerkt()
        {
                return $this->afgewerkt;
        }

        /**
         * Set the value of afgewerkt
         *
         * @return  self
         */ 
        public function setAfgewerkt($afgewerkt)
        {
                $this->afgewerkt = $afgewerkt;

                return $this;
        }
    }
?>