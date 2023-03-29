<?php

require_once('../modelo/bdRepositorio.php');
require_once('../modelo/usuario.php');
$repositorio=new Repositorio();
$usuarios=new Usuario();

if (isset($_POST['registrar'])) {
    
    $usuarios->setNombre($_POST['usuario']);
    $usuarios->setClave($_POST['clave']);

    $repositorio->registrarUsuarios($usuarios);
    header("Location:../../../index.php");
}

?>