<?php
require_once( "classes/Pedidos.class.php" );
require_once( "common.inc.php");
require_once( "config.php");

session_start();

$pedido = new Pedidos( array(
   "id_cliente" => $_SESSION['cliente']->getValue( 'id_cliente' ),
   "fecha" => $_SESSION['fecha'],
   "hora" => $_SESSION['hora'],
   "cp" => $_SESSION['cp'],
   "direccion" => $_SESSION['direccion'], 
   "comensales" => $_SESSION['comensales'] 
  ));
$pedido->insert();

if ( !$pedido = Pedidos::getByFecha( $_SESSION['fecha'] ) ) {
echo "Error desconocido, pongase en contacto con el Administrador";
} 

$pedidos_menu = new Pedidos_menu ( array(
        "id_menu" => $_SESSION['id_menu'],
        "id_pedido" => $pedido -> getValueEncoded("id_pedido"),
        "id_decoracion" => $_SESSION['id_decoracion']
        ));
    $pedidos_menu -> insert();


$N = count($_SESSION['bebidas']);
$bebida = $_SESSION['bebidas'];
for ($i=0;$i<$N;$i++){
    $pedido_bebida = new Pedidos_bebidas (array(
        "id_bebida" => $bebida[$i],
        "id_pedido" => $pedido -> getValueEncoded("id_pedido")
        ));
    $pedido_bebida -> insert();
}
?>
