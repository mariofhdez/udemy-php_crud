<?php
    class Category extends Connect{
        public function get_categories(){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT * FROM tm_category WHERE category_status=1";
            $sql=$connect->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function get_category_by_id($id){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT * FROM tm_category WHERE category_id=?";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function insert_category($name){
            $connect=parent::connection();
            parent::set_names();
            $sql="INSERT INTO tm_category
                (category_id, category_name, category_status)
                VALUES ( NULL,?,1)";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1, $name);
            $sql->execute();
            return $result=$sql->fetchAll();    
        }

        public function update_category($id, $name){
            $connect=parent::connection();
            parent::set_names();
            $sql="UPDATE tm_category
                SET  category_name=?
                WHERE category_id=?";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1, $name);
            $sql->bindValue(2, $id);
            $sql->execute();
            return $result=$sql->fetchAll();    
        }

        public function delete_category($id){
            $connect=parent::connection();
            parent::set_names();
            $sql="UPDATE tm_category
                SET  category_status=0
                WHERE category_id=?";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $result=$sql->fetchAll();    
        }

    }
?>