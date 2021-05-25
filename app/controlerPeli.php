<?php


include_once 'config.php';
include_once 'modeloPeliDB.php'; 
include_once 'Pelicula.php';


function ctlPeliAlta (){
    if  ($_SERVER['REQUEST_METHOD'] == 'GET'){
        include_once 'plantilla/nuevapeli.php';
    } else {
        $peli = new Pelicula();
        $peli->nombre   = $_POST['nombre'];
        $peli->director = $_POST['director'];
        $peli->genero   = $_POST['genero'];
        if ( isset($_FILES['imagen']['name']) ) {        
            $peli->imagen = $_FILES['imagen']['name'];            
        } else {
            $peli->imagen = NULL;
        }
        ModeloUserDB::Insert($peli);
        header('Location: index.php');
  }
}


function ctlPeliBorrar(){
    $codigo_peli = $_GET['codigo'];
    $peli = ModeloUserDB::Delete($codigo_peli);
    include_once 'plantilla/verpeliculas.php';

}

function ctlPeliDetalles (){
    $codigo_peli = $_GET['codigo'];
    $peli = ModeloUserDB::GetOne($codigo_peli); 
    include_once 'plantilla/detallesPeliculas.php';

}


function ctlPeliCerrar(){
    session_destroy();
    modeloUserDB::closeDB();
    header('Location:index.php');
}


function ctlPeliVerPelis (){
    $peliculas = ModeloUserDB::GetAll(); 
    include_once 'plantilla/verpeliculas.php';
   
}


function ctlBuscarGenero (){
    $genero = $_GET['busqueda'];
    $peli = ModeloUserDB::GetGenero($genero); 
    include_once 'plantilla/verpeliculas.php';
    
    
}
function ctlBuscarDirector (){
    $director = $_GET['busqueda'];
    $peli = ModeloUserDB::GetDirector($director); 
    include_once 'plantilla/verpeliculas.php';
  
    
}
function ctlBuscarTitulo (){
    $titulo = $_GET['busqueda'];
    $peli = ModeloUserDB::GetTitulo($titulo); 
    include_once 'plantilla/verpeliculas.php';
    
    
}


