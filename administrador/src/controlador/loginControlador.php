<?php

require_once('../modelo/usuario.php');
require_once('../modelo/bdRepositorio.php');
$usuario=new Usuario();
$repositorio=new Repositorio();

$password=$_POST['clave'];
$usuario->setNombre($_POST['usuario']);

$resultado=$repositorio->autentificarUsuario($usuario);
if ($resultado) {
    foreach($resultado as $registro){
       session_start();
       $_SESSION['idUsuario']=$registro['id'];
       $_SESSION['nombreUsuario']=$registro['nombre'];
       
       if (password_verify($password,$registro['clave'])) {

        header("Location:../vistas/menuprincipal.php");
       }
       else {

        header("Location:../../../index.php");
       }
    }
}
else{
    header("Location:../../../index.php");
}

?>