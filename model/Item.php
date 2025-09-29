<?php
    class Item extends Connect{
        public function get_items(){
            $connect= parent::connection();
            parent::set_names();
            $sql="SELECT
            tm_item.item_id,
            tm_item.item_name,
            tm_item.category_id,
            tm_item.details,
            tm_item.item_quantity,
            tm_category.category_name
            FROM
            tm_item
            INNER JOIN
            tm_category 
            ON 
            tm_item.category_id=tm_category.category_id
            WHERE
            tm_item.status = 1";
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

        public function insert_item($item_name, $category_id, $item_desc, $item_quantity){
            $connect= parent::connection();
            parent::set_names();
            $sql="INSERT INTO tm_item (
                    item_id,
                    item_name,
                    category_id,
                    details,
                    item_quantity,
                    creation_date,
                    update_date,
                    delete_date,
                    status
                )
                VALUES (
                    NULL,
                    ?,
                    ?,
                    ?,
                    ?,
                    now(),
                    NULL,
                    NULL,
                    1
                )";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1,$item_name);
            $sql->bindValue(2,$category_id);
            $sql->bindValue(3,$item_desc);
            $sql->bindValue(4,$item_quantity);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function update_item($item_id, $item_name, $category_id, $item_desc, $item_quantity){
            $connect= parent::connection();
            parent::set_names();
            $sql="UPDATE tm_item
                SET 
                    item_name=?,
                    category_id=?,
                    details=?,
                    item_quantity=?,
                    update_date=now()
                WHERE
                    item_id = ?
                ";
            $sql=$connect->prepare($sql);
            $sql->bindValue(1,$item_name);
            $sql->bindValue(2,$category_id);
            $sql->bindValue(3,$item_desc);
            $sql->bindValue(4,$item_quantity);
            $sql->bindValue(5,$item_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>