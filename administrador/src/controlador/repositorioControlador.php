<?php

require_once('../modelo/repositorio.php');
require_once('../modelo/bdRepositorio.php');
require_once('../modelo/archivosRepo.php');
$repoDoc=new RepositorioDoc();
$repositorio=new Repositorio();
$archivos=new Archivos();

if (isset($_POST['guardar'])) {
    
    $idUsuario=$_POST['idUsuario'];
    $repoDoc->setTitulo($_POST['titulo']);
    $repoDoc->setDescripcion($_POST['descripcion']);
    $repoDoc->setAutor($_POST['autor']);
    $repoDoc->setCategoria($_POST['categoria']);
    $repoDoc->setFecha($_POST['trip-start']);
    $repoDoc->setArchivo($_FILES['archivo']['name']);

    $tipo_archivo=$_FILES['archivo']['type'];

    if (strpos($tipo_archivo, "pdf") or strpos(!$tipo_archivo, "jpeg") or strpos(!$tipo_archivo, "png") or strpos(!$tipo_archivo, "mp4")) {
       
        $archivos->guardarArchivo($tipo_archivo,$repoDoc);
        $repositorio->guardarRepositorios($repoDoc,$idUsuario);

        header("Location:../vistas/menuprincipal.php");
    }
    else {
        header("Location:../vistas/menuprincipal.php?msj=error");
    }

}

?>