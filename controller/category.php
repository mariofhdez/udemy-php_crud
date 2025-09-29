<?php
    require_once("../config/connection.php");
    require_once("../model/Category.php");
    $category = new Category();

    switch($_GET["op"]){

        case "combo":
            $data=$category->get_categories();
            if(is_array($data)==true and count($data)>0){
                $html = "<option value='' disabled selected hidden>Seleccione</option>";
                foreach($data as $row){
                    $html.= "<option value='".$row["category_id"]."'>".$row["category_name"]."</option>";
                }
                echo $html;
            }
            break;

        
    }
?>