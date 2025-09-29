<?php
    class Category extends Connect{
        public function get_categories(){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT * FROM tm_category WHERE category_status=1";
            $sql=$connect->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>