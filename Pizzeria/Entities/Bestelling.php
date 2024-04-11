<?php 
    namespace Entities;

    class Bestelling{
        private int $klantnummer;
        private int $bestelId;
        private string $informatie;
        private string $datum;
        private string $tijdstip;

        public function __construct(int $klantnummer, int $bestelId, string $datum, string $tijdstip, string $informatie = ""){
            $this->klantnummer = $klantnummer;
            $this->bestelId = $bestelId;
            $this->informatie = $informatie;
            $this->datum = $datum;
            $this->tijdstip = $tijdstip;
        }

        /**
         * Get the value of klantnummer
         */ 
        public function getKlantnummer()
        {
                return $this->klantnummer;
        }

        /**
         * Set the value of klantnummer
         *
         * @return  self
         */ 
        public function setKlantnummer($klantnummer)
        {
                $this->klantnummer = $klantnummer;

                return $this;
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
         * Get the value of informatie
         */ 
        public function getInformatie()
        {
                return $this->informatie;
        }

        /**
         * Set the value of informatie
         *
         * @return  self
         */ 
        public function setInformatie($informatie)
        {
                $this->informatie = $informatie;

                return $this;
        }

        /**
         * Get the value of datum
         */ 
        public function getDatum()
        {
                return $this->datum;
        }

        /**
         * Set the value of datum
         *
         * @return  self
         */ 
        public function setDatum($datum)
        {
                $this->datum = $datum;

                return $this;
        }

        /**
         * Get the value of tijdstip
         */ 
        public function getTijdstip()
        {
                return $this->tijdstip;
        }

        /**
         * Set the value of tijdstip
         *
         * @return  self
         */ 
        public function setTijdstip($tijdstip)
        {
                $this->tijdstip = $tijdstip;

                return $this;
        }
    }
?>