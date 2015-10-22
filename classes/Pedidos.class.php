<?php
      require_once ("DataObject.class.php");
      class Pedidos extends DataObject {
        protected $data = array(
          "id_pedido" => "",
          "id_cliente" => "",
          "fecha" => "",
          "hora" => "",
          "cp" => "",
          "direccion" => "",
          "comensales" => "",
          "nombre" => "",
          "localidad" => ""
);
  
/*public static function getPlatos() {
          $conn = parent::connect();
          $sql = "SELECT * FROM platos;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $platos = array();
         foreach ( $st->fetchAll() as $row ) {
           $platos[] = new Plato( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($platos);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }
*/
        
        public static function getByFecha($fecha) {
          $conn = parent::connect();
          $sql = "SELECT * FROM pedidos  WHERE fecha = STR_TO_DATE(:fecha,'%d/%m/%Y')";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":fecha", $fecha, PDO::PARAM_STR );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Pedidos( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }

public static function getByCliente($id_cliente) {
          $conn = parent::connect();
          $sql = "SELECT id_pedido, fecha, hora, cp, direccion, comensales FROM pedidos WHERE id_cliente = :id_cliente and fecha > CURDATE();";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_cliente", $id_cliente, PDO::PARAM_INT );
         $st->execute();
         $pedidos = array();
         foreach ( $st->fetchAll() as $row ) {
           $pedidos[] = new Pedidos( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($pedidos);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

public static function getById($id_pedido) {
          $conn = parent::connect();
          $sql = "select cliente.nombre as nombre, pedidos.fecha as fecha, pedidos.hora as hora, localidad.nombre as localidad, pedidos.direccion as direccion, pedidos.comensales as comensales
from pedidos, cliente, localidad 
where pedidos.id_cliente = cliente.id_cliente and
pedidos.cp = localidad.cp and pedidos.id_pedido = :id_pedido;";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_pedido", $id_pedido, PDO::PARAM_INT );
         $st->execute();
         $pedidos = array();
         foreach ( $st->fetchAll() as $row ) {
           $pedidos[] = new Pedidos( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($pedidos);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

public static function getFecha(){
          $conn = parent::connect();
          $sql = "SELECT fecha FROM pedidos;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $fechas = array();
         foreach ( $st->fetchAll() as $row ) {
           $fechas[] = new Pedidos( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($fechas);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

    public function insert() {
       $conn = parent::connect();
       $sql = "INSERT INTO pedidos (id_cliente, fecha, hora, cp, direccion, comensales) 
VALUES (:id_cliente, STR_TO_DATE(:fecha,'%d/%m/%Y'), :hora, :cp, :direccion, :comensales);";
        try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":id_cliente", $this->data["id_cliente"], PDO::PARAM_INT); 
            $st->bindValue( ":fecha", $this->data["fecha"], PDO::PARAM_STR ); 
            $st->bindValue( ":hora", $this->data["hora"], PDO::PARAM_STR ); 
            $st->bindValue( ":cp", $this->data["cp"], PDO::PARAM_INT); 
            $st->bindValue( ":direccion", $this->data["direccion"], PDO::PARAM_STR ); 
            $st->bindValue( ":comensales", $this->data["comensales"], PDO::PARAM_INT ); 
            $st->execute();
            parent::disconnect( $conn );
          } catch ( PDOException $e ) {
            parent::disconnect( $conn );
            die( "Query failed: " . $e->getMessage() );
          }
}
       }
      
?>