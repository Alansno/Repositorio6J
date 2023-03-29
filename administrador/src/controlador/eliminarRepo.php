<?php

require_once('../modelo/bdRepositorio.php');
require_once('../modelo/repositorio.php');
require_once('../modelo/archivosRepo.php');
require_once('../config/bd.php');
$repositorio=new Repositorio();
$repoDoc=new RepositorioDoc();
$archivos=new Archivos();
$conectar=new Conexion();

if (isset($_GET['id'])) {
    $repoDoc->setId($_GET['id']);

    $resultado=$repositorio->obtenerRepositoriosArchivo($conectar,$repoDoc);
    foreach ($resultado as $registro) {
    if (isset($registro['archivo'])) {
        $archivoEncontrado=$registro['archivo'];
        $archivos->editarArchivo($archivoEncontrado);
    }
    }

    $repositorio->eliminarRepositorio($conectar,$repoDoc);
    header("Location:../vistas/menuprincipal.php");
}



?>