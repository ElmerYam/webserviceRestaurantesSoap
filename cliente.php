<?php
require_once('core/nusoap-0.9.5/lib/nusoap.php');

$cliente = new nusoap_client("http://localhost/webserviceRestaurantesSoap/server.php",false);

$elmer = array('id_estab'=>12,'opcion'=>"all",'controlador'=>"establecimientos");

$cuerpo= file_get_contents('php://input');
$array= json_decode($cuerpo);
//$elmer['id_estab'] = 12;

var_dump($elmer);

//$respuesta = $cliente->call("usuario.post",$elmer);
$respuesta = $cliente->call("usuario.post",array('parametros'=>$array));

var_dump($respuesta);

?>


