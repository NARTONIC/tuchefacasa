<?php

      require_once ("DataObject.class.php");
      class Factura extends DataObject {
        protected $data = array(
          "id_factura" => "",
          "id_pedido" => "",
          "precio" => ""
);
  
 public static function getById($id_pedido) {
          $conn = parent::connect();
          $sql = "SELECT * FROM factura  WHERE id_pedido = :id_pedido";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_pedido", $id_pedido, PDO::PARAM_STR );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Factura( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }

    public function insert() {
       $conn = parent::connect();
       $sql = "INSERT INTO factura (id_pedido, precio) 
VALUES (:id_pedido, :precio);";
        try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":id_pedido", $this->data["id_pedido"], PDO::PARAM_INT); 
            $st->bindValue( ":precio", $this->data["precio"], PDO::PARAM_STR );  
            $st->execute();
            parent::disconnect( $conn );
          } catch ( PDOException $e ) {
            parent::disconnect( $conn );
            die( "Query failed: " . $e->getMessage() );
          }
}

       }
       ?>

