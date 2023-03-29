<?php

require_once('../modelo/bdRepositorio.php');
require_once('../modelo/repositorio.php');
require_once('../modelo/archivosRepo.php');
require_once('../config/bd.php');
$repositorio=new Repositorio();
$repoDoc=new RepositorioDoc();
$archivos=new Archivos();
$conectar=new Conexion();

if (isset($_POST['guardar'])) {
    $idUsuario=$_POST['idUsuario'];
    $repoDoc->setId($_POST['idRepo']);
    $repoDoc->setTitulo($_POST['titulo']);
    $repoDoc->setDescripcion($_POST['descripcion']);
    $repoDoc->setAutor($_POST['autor']);
    $repoDoc->setCategoria($_POST['categoria']);
    $repoDoc->setFecha($_POST['trip-start']);
    $repoDoc->setArchivo($_FILES['archivo']['name']);

    $tipo_archivo=$_FILES['archivo']['type'];

    $repositorio->editarRepositoriosNoArchivo($conectar,$repoDoc,$idUsuario);

    $resultado=$repositorio->obtenerRepositoriosArchivo($conectar,$repoDoc);
    foreach ($resultado as $registro) {
        if (isset($registro['archivo'])) {
            $archivoEncontrado=$registro['archivo'];
            $archivos->editarArchivo($archivoEncontrado);
        }
    }
    
    $archivos->guardarArchivo($tipo_archivo,$repoDoc);
    $repositorio->editarRepositoriosArchivo($conectar,$repoDoc);
    header("Location:../vistas/menuprincipal.php");
}

?>