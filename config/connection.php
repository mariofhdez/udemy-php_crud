<?php
    class Connect{
        protected $dbh;
        protected function Connection(){
            try{
                $connect = $this->dbh = new PDO("mysql:local=localhost;dbname=crud-php","root","");
                return $connect;
            } catch(Exception $e){
                print "¡Error al conectar la BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
    }
?>