<?php

    class Config {

        private $HOST = "127.0.0.1";
        private $USERNAME = "root";
        private $PSW = "";
        private $DB_NAME = "newuser";
        private $table_name = "movie";
        public $connect;                               

        public function __construct() {
            $this->connect = mysqli_connect($this->HOST,$this->USERNAME,$this->PSW,$this->DB_NAME);

            if($this->connect) {
            }
            else {
                echo "Failled to connect...";
            }
        }

        public function insert($movie_name) {

            $query = "INSERT INTO movie(movie_name) VALUES ('$movie_name')";

            $res = mysqli_query($this->connect,$query); 

            return $res;

        }

        public function insertfk($name,$m_id) {

            $q = "SELECT * FROM movie WHERE movie_id IN ('$m_id')";

            $r = mysqli_query($this->connect,$q); 
            
            if(mysqli_num_rows($r) == 1) {

                if($r) {
                     $query = "INSERT INTO library(name,b_id) VALUES('$name','$m_id')";
                     $res = mysqli_query($this->connect,$query); 
                     return "movie is Match Insert Success !!";
                }

            }
            else {
                return "movie Is Not Valid !!!";
            }

        }

        public function getAllData() {

            $query = "SELECT * FROM movie";

            $res = mysqli_query($this->connect,$query);  
            
            return $res;

        }

        public function update($id,$name,$m_id) {
            $query = "UPDATE $this->table_name SET name='$name',m_id=$m_id WHERE id=$id";
            $res = mysqli_query($this->connect,$query);
            return $res ? "$id updated..." : "$id failed to update...";
        }

        public function getSingleData($id) {
            $query = "SELECT * FROM $this->table_name WHERE id=$id";
            return mysqli_query($this->connect,$query);
        }

        public function delete($id) {
            $query = "DELETE FROM $this->table_name WHERE id=$id";
            return mysqli_query($this->connect,$query);  
        }
    }

?>