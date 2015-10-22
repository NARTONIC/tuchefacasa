<?php
      require_once ("DataObject.class.php");
      class Menu extends DataObject {
        protected $data = array(
          "id_menu" => "",
          "nombre" => "",
          "precio" => ""
);
        
        public static function getMenu(){
            $conn = parent::connect();
          $sql = "SELECT * FROM menu;";
          try {
            $st = $conn->prepare( $sql );
            $st->execute();
            $menus = array();
         foreach ( $st->fetchAll() as $row ) {
           $menus[] = new Menu( $row );
         }
         $row = $st->fetch();
         parent::disconnect( $conn );
         return array($menus);
       } catch ( PDOException $e ) {
         parent::disconnect($conn);
         die( "Query failed: " . $e->getMessage() );
}
        }
        
         public static function getById($id_menu) {
          $conn = parent::connect();
          $sql = "SELECT * FROM menu  WHERE id_menu= :id_menu";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_menu", $id_menu, PDO::PARAM_STR );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Menu( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} }
  
public static function getByMenu($id_menu){
    $conn = parent::connect();
    $sql = "SELECT platos.nombre as nombre FROM platos_menu, platos, menu
    WHERE platos_menu.id_menu = menu.id_menu AND platos_menu.id_plato = platos.id_plato
    AND menu.id_menu = :id_menu;";
    try{
        $st = $conn->prepare( $sql );
        $st->bindValue( ":id_menu", $id_menu, PDO::PARAM_STR );
        $st->execute();
        $platos = array();
        foreach ( $st->fetchAll() as $row ) {
            $platos[] = new Menu( $row );
        }
        $row = $st->fetch();
        parent::disconnect( $conn );
         return array($platos);
    } catch (PDOException $e) {
        parent::disconnect( $conn );
        die( "Query failed: ". $e->getMessage() );
    }
}

public static function getPrecio($id_menu){
     $conn = parent::connect();
          $sql = "SELECT nombre, precio FROM menu  WHERE id_menu = :id_menu";
         try {
          $st = $conn->prepare( $sql );
         $st->bindValue( ":id_menu", $id_menu, PDO::PARAM_INT );
         $st->execute();
         $row = $st->fetch();
         parent::disconnect( $conn );
         if ( $row ) return new Menu( $row );
       } catch ( PDOException $e ) {
         parent::disconnect( $conn );
         die( "Query failed: " . $e->getMessage() );
} 
}
       }
      
?>