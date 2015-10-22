<?php
      require_once ("DataObject.class.php");
      class Plato extends DataObject {
        protected $data = array(
          "id_plato" => "",
          "id_tipo" => "",
          "nombre" => "",
          "precio" => ""
);
  
public static function getPlatos() {
          $conn = parent::connect();
          $sql = "SELECT * FROM platos order by id_tipo;";
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

public static function getByTipo($id_tipo){
    $conn = parent::connect();
    $sql = "SELECT * FROM platos WHERE id_tipo = :id_tipo";
    try{
        $st = $conn->prepare( $sql );
        $st->bindValue( ":id_tipo", $id_tipo, PDO::PARAM_STR );
        $st->execute();
        $platos = array();
        foreach ( $st->fetchAll() as $row ) {
            $platos[] = new Plato( $row );
        }
        $row = $st->fetch();
        parent::disconnect( $conn );
         return array($platos);
    } catch (PDOException $e) {
        parent::disconnect( $conn );
        die( "Query failed: ". $e->getMessage() );
    }
}

public static function getByPedido($id_pedido){
    $conn = parent::connect();
    $sql = "SELECT platos.nombre as nombre FROM pedidos, platos, pedidos_platos 
WHERE platos.id_plato = pedidos_platos.id_plato 
and pedidos_platos.id_pedido = pedidos.id_pedido
and pedidos.id_pedido=:id_pedido;";
    try{
        $st = $conn->prepare( $sql );
        $st->bindValue( ":id_pedido", $id_pedido, PDO::PARAM_INT );
        $st->execute();
        $platos = array();
        foreach ( $st->fetchAll() as $row ) {
            $platos[] = new Plato( $row );
        }
        $row = $st->fetch();
        parent::disconnect( $conn );
         return array($platos);
    } catch (PDOException $e) {
        parent::disconnect( $conn );
        die( "Query failed: ". $e->getMessage() );
    }
}

public static function getByPedidoMenu($id_pedido){
    $conn = parent::connect();
    $sql = "SELECT platos.nombre as nombre FROM platos, pedidos, menu, pedido_menu, platos_menu
WHERE platos.id_plato = platos_menu.id_plato
and platos_menu.id_menu = menu.id_menu
and menu.id_menu = pedido_menu.id_menu
and pedido_menu.id_pedido = pedidos.id_pedido
and pedidos.id_pedido = :id_pedido;";
    try{
        $st = $conn->prepare( $sql );
        $st->bindValue( ":id_pedido", $id_pedido, PDO::PARAM_INT );
        $st->execute();
        $platos = array();
        foreach ( $st->fetchAll() as $row ) {
            $platos[] = new Plato( $row );
        }
        $row = $st->fetch();
        parent::disconnect( $conn );
         return array($platos);
    } catch (PDOException $e) {
        parent::disconnect( $conn );
        die( "Query failed: ". $e->getMessage() );
    }
}





 public static function getById($id_plato) {
          $conn = parent::connect();
          $sql = "SELECT * FROM platos  WHERE id_plato = :id_plato";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_plato", $id_plato, PDO::PARAM_STR );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Plato( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }

       }
      
?>
