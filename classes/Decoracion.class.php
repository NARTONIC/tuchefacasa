<?php
      require_once ("DataObject.class.php");
      class Decoracion extends DataObject {
        protected $data = array(
          "id_decoracion" => "",
          "nombre" => "",
          "precio" => ""
);
  
public static function getDecoracion() {
          $conn = parent::connect();
          $sql = "SELECT * FROM decoracion;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $decoraciones = array();
         foreach ( $st->fetchAll() as $row ) {
           $decoraciones[] = new Decoracion( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($decoraciones);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
} }

 public static function getById($id_decoracion) {
          $conn = parent::connect();
          $sql = "SELECT * FROM decoracion  WHERE id_decoracion = :id_decoracion";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_decoracion", $id_decoracion, PDO::PARAM_INT );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Decoracion( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }

       }
?>
