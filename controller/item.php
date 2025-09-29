<?php
    require_once("../config/connection.php");
    require_once("../model/Item.php");
    $item = new Item();

    switch($_GET["op"]){

        case "retrieve":
            $items=$item->get_items();
            $data= Array();
            foreach($items as $row){
                $sub_array=array();
                $sub_array[]=$row["item_name"];
                $sub_array[]=$row["category_name"];
                $sub_array[]=$row["details"];
                $sub_array[]='<button type="button" onclick="edit('.$row["item_id"].');" id="'.$row["item_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                $sub_array[]='<button type="button" onclick="destroy('.$row["item_id"].');" id="'.$row["item_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($results);
            break;

        case "saveAndUpdate":
            $items=$item->get_item_by_id($_POST["item_id"]);
            if(empty($_POST["item_id"])){
                if(is_array($items) == true and count($items) == 0){
                    $item->insert_item($_POST["item_name"], $_POST["category_id"], $_POST["item_desc"]);
                }
            } else {
                $item->update_item($_POST["item_id"], $_POST["item_name"], $_POST["category_id"], $_POST["item_desc"]);
            }
            break;

        case "show":
            $items=$item->get_item_by_id($_POST["item_id"]);
            if(is_array($items) == true and count($items) > 0){
                foreach($items as $row){
                    $output["item_id"] = $row["item_id"];
                    $output["item_name"] = $row["item_name"];
                    $output["category_id"] = $row["category_id"];
                    $output["item_desc"] = $row["details"];
                }
                echo json_encode($output);
            }
            break;

        case "destroy":
            $item->delete_item($_POST["item_id"]);
            break;
    }
?>