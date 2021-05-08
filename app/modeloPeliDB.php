<?php

include_once 'config.php';
include_once 'Pelicula.php';

class ModeloUserDB {


    private static $dbh = null; 
    private static $consulta_peli = "Select * from peliculas where codigo_pelicula = ?";
    private static $buscar_genero = "Select * from peliculas where genero = ?";
    private static $buscar_director = "Select * from peliculas where director = ?";
    private static $buscar_titulo = "Select * from peliculas where nombre = ?";
    private static $insert_peli   = "Insert into peliculas (nombre,director,genero,imagen)". "VALUES (?,?,?,?)";

  /*
     private static $delete_peli   = "Delete from Usuarios where id = ?"; 
     private static $insert_user   = "Insert into Usuarios (id,clave,nombre,email,plan,estado)".
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
    if ($stmt->execute()){
       return true;
    }
    return false; 
}



// Tabla de objetos con todas las peliculas
public static function GetAll ():array{
    // Genero los datos para la vista que no muestra la contraseña
    
    $stmt = self::$dbh->query("select * from peliculas");
    
    $tpelis = [];
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    while ( $peli = $stmt->fetch()){
        $tpelis[] = $peli;       
    }
    return $tpelis;
}


// Datos de una película para visualizar
public static function GetOne ($codigo){
    $stmt = self::$dbh->prepare(self::$consulta_peli);
    $stmt->bindValue(1,$codigo);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    $peli = $stmt->fetch();
    return $peli;   
}

public static function GetGenero ($genero){
    $stmt = self::$dbh->prepare(self::$buscar_genero);
    $stmt->bindValue(1,$genero);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    $peli = $stmt->fetch();
    return $peli;   
}

public static function GetDirector ($director){
    $stmt = self::$dbh->prepare(self::$buscar_director);
    $stmt->bindValue(1,$director);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    $peli = $stmt->fetch();
    return $peli; 
}

public static function GetTitulo ($titulo){
    $stmt = self::$dbh->prepare(self::$buscar_titulo);
    $stmt->bindValue(1,$titulo);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_CLASS, 'Pelicula');
    $peli = $stmt->fetch();
    return $peli; // Devuele una pelicula o false    
}

public static function closeDB(){
    self::$dbh = null;
}

} // class