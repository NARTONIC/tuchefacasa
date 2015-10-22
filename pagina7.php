<?php
header('Content-Type: text/txt; charset=ISO-8859-1');
require_once("config.php");
require_once("Plato.class.php");

$nombre='';
$precio='0';


 if ($_REQUEST['codi']=='entra')
        {
            list($platos) = Plato::getPlatos();
            foreach ( $platos as $plato ) {
                $nombre=$plato->getValueEncoded("nombre");
                $precio=$plato->getValueEncoded("precio"); 
                
                echo "{
                    'nombre':'$nombre',
                    'precio':'$precio'
                }";  
        }
        }
        
$xml="<?xml version=\"1.0\"?>\n";
$xml.="<platos>\n";
for($f=0;$f<count($platos);$f++)
{
  $xml.="<plato>".$platos['nombre']."</plato>";
  $xml.="<plato>".$platos['precio']."</plato>";
}
$xml.="</platos>\n";
header('Content-Type: text/xml');
echo $xml;
?>
