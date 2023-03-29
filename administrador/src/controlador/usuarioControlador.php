<?php

require_once('../modelo/usuario.php');
require_once('../modelo/bdRepositorio.php');
$validUsuario=new Usuario();
$rep=new Repositorio();

$validUsuario->setNombre($_POST['usuario']);

$res=$rep->validarCorreo($validUsuario);
if ($res) {
    foreach($res as $registro){
       $id=$registro['idusuario'];
    }
    header("Location:../vistas/cambiarClave.php?id=$id");
}
else {
    header("Location:../../../index.php");
}

?>