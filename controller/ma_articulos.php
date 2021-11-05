<?php
// Case según método elegido
require_once("../config/conexion.php");
require_once("../Models/Ma_articulos.php");
$ma_articulos=new  Ma_articulos();
$body=json_decode(file_get_contents("php://input"),true);
switch ($_GET["op"]){

    case "GetArticulos":
        $datos=$ma_articulos->get_articulos();
        echo json_encode($datos);
    break;

    case "GetArticulo":
        $datos=$ma_articulos->get_articulo($body["id"]);
        echo json_encode($datos);
    break;

    case "InsertArticulos":
        $datos=$ma_articulos->insert_articulo($body["ID"],$body["DESCRIPCION"],
        $body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
        
        echo json_encode("Articulo Insertado");
    break;
  
    case "EliminarArticulos":
        $datos=$ma_articulos->delete_articulo($body["ID"]);
        echo json_encode("Articulo Borrado");
    break;

    case "UpdateArticulos":
        $datos=$ma_articulos->update_articulo($body["ID"],$body["DESCRIPCION"],
        $body["UNIDAD"],$body["COSTO"],$body["PRECIO"],$body["APLICA_ISV"],$body["PORCENTAJE_ISV"],$body["ESTADO"],$body["ID_SOCIO"]);
        
        echo json_encode("Articulo Actualizados");
    break;


}
?>

