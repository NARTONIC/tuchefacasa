<?php
      require_once ("DataObject.class.php");
      class Bebida extends DataObject {
        protected $data = array(
          "id_bebida" => "",
          "nombre" => "",
          "precio" => "",
          "id_tipo" => ""
);
  
public static function getBebidas() {
          $conn = parent::connect();
          $sql = "SELECT * FROM bebidas;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $bebidas = array();
         foreach ( $st->fetchAll() as $row ) {
           $bebidas[] = new Bebida( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($bebidas);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

public static function getByPedido($id_pedido) {
          $conn = parent::connect();
          $sql = "SELECT bebidas.nombre, bebidas.precio FROM pedidos, bebidas, pedidos_bebidas
WHERE bebidas.id_bebida = pedidos_bebidas.id_bebida
and pedidos_bebidas.id_pedido = pedidos.id_pedido
and pedidos.id_pedido=:id_pedido;";
          try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":id_pedido", $id_pedido, PDO::PARAM_INT );
            $st->execute();
            $bebidas = array();
         foreach ( $st->fetchAll() as $row ) {
           $bebidas[] = new Bebida( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($bebidas);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

 public static function getById($id_bebida) {
          $conn = parent::connect();
          $sql = "SELECT * FROM bebidas  WHERE id_bebida = :id_bebida";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_bebida", $id_bebida, PDO::PARAM_STR );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Bebida( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }

       }
      
?>
