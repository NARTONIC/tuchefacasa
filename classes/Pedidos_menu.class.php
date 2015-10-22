
<?php
      require_once ("DataObject.class.php");
      class Pedidos_menu extends DataObject {
        protected $data = array(
          "id_menu" => "",
          "id_pedido" => "",
          "id_decoracion" => ""
);
  
      
       
    public function insert() {
       $conn = parent::connect();
       $sql = "INSERT INTO pedido_menu (id_menu, id_pedido, id_decoracion) 
VALUES (:id_menu, :id_pedido, :id_decoracion);";
        try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":id_menu", $this->data["id_menu"], PDO::PARAM_INT); 
            $st->bindValue( ":id_pedido", $this->data["id_pedido"], PDO::PARAM_INT );
            $st->bindValue( ":id_decoracion", $this->data["id_decoracion"], PDO::PARAM_INT );
            $st->execute();
            parent::disconnect( $conn );
          } catch ( PDOException $e ) {
            parent::disconnect( $conn );
            die( "Query failed: " . $e->getMessage() );
          }
}
       }
      
?>