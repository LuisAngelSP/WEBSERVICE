<?php 
    /**  */

    header('Content-Type: application/json');


require_once "../config/conexion.php";
require_once "../models/Categoria.php";

    $body = json_decode(file_get_contents("php://input"),true);

$categoria = new Categoria();

    switch($_GET["op"]){

        case "getAll":
            $datos=$categoria->get_categoria();
            echo json_encode($datos);            

        break;
        
        case "getId":
            $datos=$categoria->get_categoria_id($body["cat_id"]);
            echo json_encode($datos);            
    
        break;

        case "insertar":
            $datos=$categoria->insert_categoria($body["cat_nom"], $body["cat_obs"]);
            echo "Correcto";            
    
        break;

        case "update":
            $datos=$categoria->update_categoria($body["cat_id"],$body["cat_nom"], $body["cat_obs"]);
            echo "Actualizo";            
    
        break;

        case "delete":
            $datos=$categoria->delete_categoria($body["cat_id"]);
            echo "Eliminado";            
    
        break;
    }

?>