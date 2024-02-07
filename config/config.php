<?php


    class Config {

        //Attributes
        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PSW = "";
        private $DB_NAME = "user";
        private $table_name = "movie";
        public $conn;

        public function __construct() {
            $this->conn = mysqli_connect($this->HOST,$this->USERNAME,$this->PSW,$this->DB_NAME);

            if($this->conn) {
            }
            else {
                echo "Failled to connect...";
            }
        }


    }

  

?>