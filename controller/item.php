<?php
    require_once("../config/connection.php");
    require_once("../model/Item.php");
    $items = new Item();

    switch($_GET["op"]){

        case "listar":
            $data=$item-<get_items();
            $data= Array();
            foreach($data as $row){
                $sub_array=array();
                $sub_array[]=$row["item_name"];
                $sub_array[]='<button type="button" onclick="edit('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-primary btn-icon"><div><i class=fa fa-edit"></i></div></button>';
                $sub_array[]='<button type="button" onclick="delete('.$row["prod_id"].');" id="'.$row["prod_id"].'" class="btn btn-outline-danger btn-icon"><div><i class=fa fa-trash"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            break;
    }
?>