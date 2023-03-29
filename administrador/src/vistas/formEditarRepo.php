<?php
require_once('../modelo/usuario.php');
require_once('../modelo/repositorio.php');
$user=new Usuario();
$repoDoc=new RepositorioDoc();

$repoDoc->setId($_GET['id']);

session_start();
  if(isset($_SESSION['nombreUsuario'])){
    $user->setNombre($_SESSION['nombreUsuario']);
    $user->setId($_SESSION['idUsuario']);
  }
  else{
    if ($user->getNombre()=='') {
      header("Location:../../../index.php");
    }
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/formRepo.css">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="menuprincipal.php">ADMINISTRADOR</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-body-tertiary" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="../controlador/salir.php">Salir</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
 <br><br><br><br><br>
     
   <div class="container">
    <form class="form-repo bg-info" action="../controlador/editarRepoControlador.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col">
                <div class="">
                    <input type="hidden" class="form-control" name="idUsuario" value="<?php echo $user->getId(); ?>" id="exampleInputEmail1" readonly>
                  </div>
                  <div class="">
                    <input type="hidden" class="form-control" name="idRepo" value="<?php echo $repoDoc->getId(); ?>" id="exampleInputEmail1" readonly>
                  </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titulo</label>
                    <input type="text" class="form-control" name="titulo" id="exampleInputEmail1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Autor</label>
                    <input type="text" class="form-control" name="autor" id="exampleInputEmail1">
                  </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Categoría</label>
                    <input type="text" class="form-control" name="categoria" id="exampleInputEmail1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Fecha</label>
                    <input type="date" class="form-control" id="start" name="trip-start"
                    min="2023-01-01" max="2030-12-31">
                  </div>
                  <div class="mb-3">
                    <label for="file" class="form-label">Contenido</label>
                    <input class="form-control" type="file" name="archivo" id="file">
                  </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary" name="guardar">Guardar cambios</button>
        </div>
      </form>
   </div>
    <script src="../js/bootstrap.bundle.min.js"></script>