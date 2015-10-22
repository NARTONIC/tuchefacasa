<?php
      require_once ("DataObject.class.php");
      class Cliente extends DataObject {
        protected $data = array(
          "id_cliente" => "",
          "email" => "",
          "pass" => "",
          "nombre" => "",
          "apellidos" => "",
          "telefono" => ""
);
  
public static function getCliente() {
          $conn = parent::connect();
          $sql = "SELECT * FROM cliente;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $clientes = array();
         foreach ( $st->fetchAll() as $row ) {
           $clientes[] = new Cliente( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($clientes);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

public static function getByEmail($email) {
          $conn = parent::connect();
          $sql = "SELECT * FROM cliente  WHERE email = :email";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":email", $email, PDO::PARAM_STR );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Cliente( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }

public function authenticate() {
          $conn = parent::connect();
          $sql = "SELECT * FROM cliente WHERE email = :email AND pass = SHA(:pass);";
          try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":email", $this->data["email"], PDO::PARAM_STR );
            $st->bindValue( ":pass", $this->data["pass"], PDO::PARAM_STR );
            $st->execute();
            $row = $st->fetch();
            parent::disconnect( $conn );
            if ( $row ) return new Cliente( $row );
          } catch ( PDOException $e ) {
            parent::disconnect( $conn );
            die( "Query failed: " . $e->getMessage() );
} }

public function insert() {
       $conn = parent::connect();
       $sql = "INSERT INTO cliente (email, pass, nombre, apellidos, telefono) 
           VALUES (:email, SHA(:pass), :nombre, :apellidos, :telefono)";
try {
            $st = $conn->prepare( $sql );
            $st->bindValue( ":email", $this->data["email"], PDO::PARAM_STR); 
            $st->bindValue( ":pass", $this->data["pass"], PDO::PARAM_STR ); 
            $st->bindValue( ":nombre", $this->data["nombre"], PDO::PARAM_STR ); 
            $st->bindValue( ":apellidos", $this->data["apellidos"], PDO::PARAM_STR ); 
            $st->bindValue( ":telefono", $this->data["telefono"], PDO::PARAM_STR ); 
            $st->execute();
            parent::disconnect( $conn );
          } catch ( PDOException $e ) {
            parent::disconnect( $conn );
            die( "Query failed: " . $e->getMessage() );
          }
}

       }
      
?>
