<?php
    class Item extends Connect{
        public function get_items(){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT * FROM tm_item WHERE status=1";
            $sql=$connect->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_item_by_id($item_id){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT * FROM tm_item WHERE item_id = ?";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1,$item_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function delete_item($item_id){
            $connect= parent::connection();
            parent::set_names();
            $sql="UPDATE tm_item
                SET 
                    status=0,
                    delete_date=now()
                WHERE
                    item_id = ?
                ";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1,$item_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_item($item_name, $item_desc){
            $connect= parent::connection();
            parent::set_names();
            $sql="INSERT INTO tm_item (
                    item_id,
                    item_name,
                    details,
                    creation_date,
                    update_date,
                    delete_date,
                    status
                )
                VALUES (
                    NULL,
                    ?,
                    ?,
                    now(),
                    NULL,
                    NULL,
                    1
                )";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1,$item_name);
            $sql->bindValue(2,$item_desc);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_item($item_id, $item_name, $item_desc){
            $connect= parent::connection();
            parent::set_names();
            $sql="UPDATE tm_item
                SET 
                    item_name=?,
                    details=?,
                    update_date=now()
                WHERE
                    item_id = ?
                ";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1,$item_name);
            $sql->bindValue(2,$item_desc);
            $sql->bindValue(3,$item_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>