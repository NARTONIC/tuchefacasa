<?php
      require_once ("DataObject.class.php");
      class Pedidos_bebidas extends DataObject {
        protected $data = array(
          "id_bebida" => "",
          "id_pedido" => "",
          "cantidad" => ""
);
  
      
        

    public function insert() {
       $conn = parent::connect();
       $sql = "INSERT INTO pedidos_bebidas (id_bebida, id_pedido, cantidad) 
VALUES (:id_bebida, :id_pedido, :cantidad);";
        try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":id_bebida", $this->data["id_bebida"], PDO::PARAM_INT); 
            $st->bindValue( ":id_pedido", $this->data["id_pedido"], PDO::PARAM_INT );
            $st->bindValue( ":cantidad", $this->data["cantidad"], PDO::PARAM_INT ); 
            $st->execute();
            parent::disconnect( $conn );
          } catch ( PDOException $e ) {
            parent::disconnect( $conn );
            die( "Query failed: " . $e->getMessage() );
          }
}


       }
      
?>