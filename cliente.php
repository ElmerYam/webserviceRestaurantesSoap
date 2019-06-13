<?php
require_once('core/nusoap-0.9.5/lib/nusoap.php');
require_once('core/VistaJson.php');

$cliente = new nusoap_client("http://localhost/webserviceRestaurantesSoap/server.php",false);

//$elmer = array('id_estab'=>12,'opcion'=>"all",'controlador'=>"establecimientos");

$cuerpo= file_get_contents('php://input');
$array= json_decode($cuerpo);

$metodo = "";

switch($array->controlador){
    case 'establecimientos':
    $metodo = 'usuario.post';
    break;
    case 'reservaciones':
    $metodo = 'reservaciones.post';
    break;
    case 'alimentos':
    $metodo = 'alimentos.post';
    break;
    case 'pedidos':
    $metodo = 'pedidos.post';
    break;
    default:
    break;
}

//$respuesta = $cliente->call("usuario.post",$elmer);
$respuesta = $cliente->call($metodo,array('parametros'=>$array));

//imprimir como json
$vista = new VistaJson();
$vista->imprimir($respuesta);

?>


