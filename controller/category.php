<?php
    header('Content-Type: application/json');

    require_once("../config/connection.php");
    require_once("../model/Category.php");
    $category = new Category();
    $body=json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){

        case "GetAll":
            $data=$category->get_categories();
            echo json_encode($data);
            break;

        case "GetCategory":
            $data=$category->get_category_by_id($_GET["id"]);
            echo json_encode($data);
            break;

        case "Create":
            $data=$category->insert_category($body["name"]);
            echo json_encode("Insertado correctamente");
            break;
        
        case "Update":
            $data=$category->update_category($body["id"], $body["name"]);
            echo json_encode("Actualizado correctamente");
            break;

        case "Delete":
            $data=$category->delete_category($_GET["id"]);
            echo json_encode("Desactivado correctamente");
            break;

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