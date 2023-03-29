<?php
require_once('../modelo/usuario.php');
require_once('../modelo/bdRepositorio.php');
require_once('../modelo/repositorio.php');
$user=new Usuario();
$repositorio=new Repositorio();
$repoDoc=new RepositorioDoc();

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
    <title>Menu Principal</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">ADMINISTRADOR</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-body-tertiary" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="formRepositorio.php">Formulario</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../controlador/salir.php">Salir</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

 <br><br><br><br><br>

      <div class="container">
        <div class="row">
          <?php
            $resultado=$repositorio->obtenerRepositorios();
            foreach ($resultado as $registro) {
              $repoDoc->setFecha($registro['fecha']);
              $repoDoc->setTitulo($registro['titulo']);
              $repoDoc->setDescripcion($registro['descripcion']); 
              $repoDoc->setId($registro['id']);
              $fecha = date("d-m-Y", strtotime($repoDoc->getFecha()));
          ?>
            <div class="col-sm-12 col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $repoDoc->getTitulo(); ?></h5>
                      <h6 class="card-subtitle mb-2 text-muted"><?php echo $fecha;?></h6>
                      <p class="card-text"><?php echo $repoDoc->getDescripcion(); ?></p>
                      <a href="vistaRepositorio.php?id=<?php echo $repoDoc->getId();?>" class="btn btn-info">Ver</a>
                      <a href="formEditarRepo.php?id=<?php echo $repoDoc->getId();?>" class="btn btn-warning">Editar</a>
                     <a href="../controlador/eliminarRepo.php?id=<?php echo $repoDoc->getId();?>" class="btn btn-danger">Eliminar</a>
                    </div>
                  </div>
            </div>
           <?php } ?>
        </div>
      </div>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>