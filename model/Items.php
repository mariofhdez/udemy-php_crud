<?php
    class Item extends Connect{
        public function get_item(){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT * FROM tm_item";
            $sql=$connect->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_item_by_id($item_id){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT * FROM tm_item WHERE item_id = ?";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1,$item_id)
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>