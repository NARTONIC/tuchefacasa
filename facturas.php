<?php
require('/fpdf/fpdf.php');
require_once("common.inc.php");
require_once("config.php");
require_once('classes/Cliente.class.php');
require_once('classes/Pedidos.class.php');
require_once('classes/Plato.class.php');
require_once('classes/Menu.class.php');
require_once('classes/Localidad.class.php');
require_once('classes/Decoracion.class.php');
require_once('classes/Bebida.class.php');
require_once('classes/Factura.class.php');
session_start();

$test = $_SESSION["cliente"]->getValue("nombre");
$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont('Helvetica', 'B', 14);
$pdf->Write (7,"FACTURA");
$pdf->Ln();

if ( !$pedido = Pedidos::getByFecha( $_SESSION['fecha'] ) ) {
                echo "Error desconocido, pongase en contacto con el Administrador";
                } 
                
$id_pedido = $pedido -> getValueEncoded("id_pedido");
list($pedidos) = Pedidos::getById($id_pedido);
foreach ( $pedidos as $pedido ) {
   $pdf->Cell(40,10, "Nombre: ");
   $pdf->Cell(40,10,$pedido->getValueEncoded("nombre")); 
   $pdf->Ln();
   $pdf->Cell(40,10, "Fecha: ");
   $pdf->Cell(40,10,$pedido->getValueEncoded("fecha"));
   $pdf->Ln();
   $pdf->Cell(40,10, "Hora: ");
   $pdf->Cell(40,10,$pedido->getValueEncoded("hora"));
   $pdf->Ln();
   $pdf->Cell(40,10, "Localidad: ");
   $pdf->Cell(40,10,$pedido->getValueEncoded("localidad"));
   $pdf->Ln();
   $pdf->Cell(40,10, "Dirección: ");
   $pdf->Cell(40,10,$pedido->getValueEncoded("direccion"));
   $pdf->Ln();
   $pdf->Cell(40,10, "Comensales: ");
   $pdf->Cell(40,10,$pedido->getValueEncoded("comensales"));
   $pdf->Ln();
}
$pdf->Cell(40,10, "Platos: ");
$pdf->Ln();
list($platos) = Plato::getByPedido($id_pedido);
if ($platos == NULL){
    $pdf->Cell(40,10, "Menú: ");
    $pdf->Ln();
    list($platos) = Plato::getByPedidoMenu($id_pedido);
    foreach ( $platos as $plato ) {
        $pdf->Cell(40,10,$plato->getValueEncoded("nombre")); 
        $pdf->Ln();
    }
    $pdf->Cell(40,10, "Bebidas: ");
    $pdf->Ln();
} else {
    foreach ( $platos as $plato ) {
        $pdf->Cell(40,10,$plato->getValueEncoded("nombre")); 
        $pdf->Ln();
    }
    $pdf->Cell(40,10, "Bebidas: ");
    $pdf->Ln();
}    
list($bebidas) = Bebida::getByPedido($id_pedido);
foreach ( $bebidas as $bebida ) {
   $pdf->Cell(40,10,$bebida->getValueEncoded("nombre")); 
   $pdf->Ln();
   $pdf->Cell(40,10,"Precio: ".$bebida->getValueEncoded("precio")); 
   $pdf->Ln();
   $pdf->Cell(40,10,"Cantidad: ".$_SESSION['cantidad']); 
   $pdf->Ln();
}
$pdf->Cell(40,10, "Total: ");
$pdf->Ln();
$factura = Factura::getById($id_pedido);

   $pdf->Cell(40,10,$factura->getValueEncoded("precio")); 
   $pdf->Ln();


$pdf->Output("facturas/".$id_pedido.".pdf", 'F');
echo "<script language='javascript'>window.open('facturas/".$id_pedido.".pdf','_self','');</script>";//para ver el archivo pdf generado
?>
