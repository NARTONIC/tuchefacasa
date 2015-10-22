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
echo $pedido -> getValueEncoded("id_pedido");

echo $_SESSION['plato1'];
for($i=1;$i<=6;$i++){
    $pedido_plato = new Pedidos_platos (array(
        "id_plato" => $_SESSION['plato'.$i],
        "id_pedido" => $pedido -> getValueEncoded("id_pedido")
        ));
        echo "Se ha completado con exito";
    $pedido_plato -> insert();

}

$N = count($_SESSION['bebidas']);
$bebida = $_SESSION['bebidas'];
for ($i=0;$i<$N;$i++){
    $pedido_bebida = new Pedidos_bebidas (array(
        "id_bebida" => $bebida[$i],
        "id_pedido" => $pedido -> getValueEncoded("id_pedido")
        ));
        echo "Se ha completado con exito";
    $pedido_bebida -> insert();
}
?>

