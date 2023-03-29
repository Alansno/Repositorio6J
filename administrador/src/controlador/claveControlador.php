<?php

require_once('../modelo/usuario.php');
require_once('../modelo/bdRepositorio.php');
$nuevoUsuario=new Usuario();
$repoClave=new Repositorio();

$nuevoUsuario->setId($_POST['idUsuario']);
$nuevoUsuario->setClave($_POST['password']);
$confirmClave=$_POST['confirmPassword'];

if ($nuevoUsuario->getClave()==$confirmClave) {
    $repoClave->cambiarClave($nuevoUsuario);
    header("Location:../../../index.php");
}

?>