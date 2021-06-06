<?php

include_once 'config.php';
include_once 'Pelicula.php';

class ModeloUserDB {


    private static $dbh = null; 
    private static $consulta_peli = "Select * from peliculas where codigo_pelicula = ?";
    private static $buscar_genero = "Select * from peliculas where genero = ?";
    private static $buscar_director = "Select * from peliculas where director = ?";
    private static $buscar_titulo = "Select * from peliculas where nombre = ?";
    private static $valoracion = "Select valoracion from peliculas where valoracion = ?";
    private static $update_valoracion = "Update peliculas SET valoracion = ? WHERE codigo_pelicula = ? ";
    private static $insert_peli   = "Insert into peliculas (nombre,director,genero,imagen,trailer)". "VALUES (?,?,?,?,?)";
    private static $delete_peli   = "Delete from peliculas where codigo_pelicula = ?"; 
    private static $modificar_peli = "Select * from peliculas where codigo_pelicula = ? AND Update peliculas SET (nombre,director,genero,imagen,trailer)". "VALUES (?,?,?,?,?,?)";

  /*   private static $insert_user   = "Insert into Usuarios (id,clave,nombre,email,plan,estado)".
                                     " VALUES (?,?,?,?,?,?)";
     private static $update_user    = "UPDATE Usuarios set  clave=?, nombre =?, ".
                                     "email=?, plan=?, estado=? where id =?";
  */
     
public static function init(){
   
    if (self::$dbh == null){
        try {
            // Cambiar  los valores de las constantes en config.php
            $dsn = "mysql:host=".DBSERVER.";dbname=".DBNAME.";charset=utf8";
            self::$dbh = new PDO($dsn,DBUSER,DBPASSWORD);
            // Si se produce un error se genera una excepción;
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Error de conexión ".$e->getMessage();
            exit();
        }
        
    }
    
}

public static function insert($peli):bool{
    $stmt = self::$dbh->prepare(self::$insert_peli);
    $stmt->bindValue(1,$peli->nombre);
    $stmt->bindValue(2,$peli->director);
    $stmt->bindValue(3,$peli->genero);
    $stmt->bindValue(4,$peli->imagen );
    $stmt->bindValue(5,$peli->trailer );
    if ($stmt->execute()){
       return true;
    }
    return false; 
}
public static function mod($codigo):bool{
    $stmt = self::$dbh->prepare(self::$modificar_peli);
    $stmt->bindValue(1,$peli->codigo);
    $stmt->bindValue(2,$peli->nombre);
    $stmt->bindValue(3,$peli->director);
    $stmt->bindValue(4,$peli->genero);
    $stmt->bindValue(5,$peli->imagen );
    $stmt->bindValue(6,$peli->trailer );
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    $peli = $stmt->fetch();
    return $peli; 
}

public static function Delete (String $codigo) {
    $stmt = self::$dbh->prepare(self::$delete_peli);
    $stmt->bindValue(1,$codigo);
    $stmt->execute();
    return false;
}   


public static function GetAll ():array{    
    $stmt = self::$dbh->query("select * from peliculas");
    $tpelis = [];
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    while ( $peli = $stmt->fetch()){
        $tpelis[] = $peli;       
    }
    return $tpelis;
}


public static function GetOne ($codigo){
    $stmt = self::$dbh->prepare(self::$consulta_peli);
    $stmt->bindValue(1,$codigo);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    $peli = $stmt->fetch();
    return $peli;   
}


public static function Valorar ($codigo){
    $stmt = self::$dbh->prepare(self::$valoracion);
    $stmt->bindValue(1,$codigo);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    $peli = $stmt->fetch();
    return $peli;   
}
 
public static function GetGenero ($genero){
    $stmt = self::$dbh->query("select * from peliculas where genero like = ?");
    $stmt->bindValue(1,$genero."%");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    while ( $peli = $stmt->fetch()){
        $tpelis[] = $peli;       
    }
    return $tpelis;  
}

public static function GetDirector ($director){ 
    $stmt = self::$dbh->query("select * from peliculas where director like = ?");
    $stmt->bindValue(1,$director."%");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    while ( $peli = $stmt->fetch()){
        $tpelis[] = $peli;       
    }
    return $tpelis;   
}

public static function GetTitulo ($titulo){
    $stmt = self::$dbh->query("select * from peliculas where nombre like = ?");
    $stmt->bindValue(1,$titulo."%" );    
    $tpelis = [];
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    while ( $peli = $stmt->fetch()){
        $tpelis[] = $peli;       
    }
    return $tpelis;    
}

public static function closeDB(){
    self::$dbh = null;
}

} 