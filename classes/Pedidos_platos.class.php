<?php
      require_once ("DataObject.class.php");
      class Pedidos_platos extends DataObject {
        protected $data = array(
          "id_plato" => "",
          "id_pedido" => ""
);
  
      
        

    public function insert() {
       $conn = parent::connect();
       $sql = "INSERT INTO pedidos_platos (id_plato, id_pedido) 
VALUES (:id_plato, :id_pedido);";
        try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":id_plato", $this->data["id_plato"], PDO::PARAM_INT); 
            $st->bindValue( ":id_pedido", $this->data["id_pedido"], PDO::PARAM_INT ); 
            $st->execute();
            parent::disconnect( $conn );
          } catch ( PDOException $e ) {
            parent::disconnect( $conn );
            die( "Query failed: " . $e->getMessage() );
          }
}
       }
      
?>