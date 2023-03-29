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
    <title>Documento</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
        <div class="col">
          <?php
          $repoDoc->setId($_GET['id']);
          $resultado=$repositorio->obtenerRepositoriosId($repoDoc);
          foreach ($resultado as $registro) {
            $repoDoc->setTitulo($registro['titulo']);
            $repoDoc->setDescripcion($registro['descripcion']);
            $repoDoc->setAutor($registro['autor']);
            $repoDoc->setCategoria($registro['categoria']);
            $repoDoc->setFecha($registro['fecha']);
            $repoDoc->setArchivo($registro['archivo']);

            $fecha = date("d-m-Y", strtotime($repoDoc->getFecha()));
          }
          ?>
            <?php
            if (strpos($repoDoc->getArchivo(), "pdf")) { ?> 

            <embed src="../multimedios/documentos/<?php echo $repoDoc->getArchivo();?>" 
              height="450px" width="500px" type="application/pdf"/><br>
             <a href="../multimedios/documentos/<?php echo $repoDoc->getArchivo();?>" target="_blank">Ver completo</a>

             <?php } ?>

             <?php if (strpos($repoDoc->getArchivo(), "jpg") or strpos($repoDoc->getArchivo(), "png")){ ?>

             <img height="500px" width="500px" src="../multimedios/fotos/<?php echo $repoDoc->getArchivo();?>">

             <?php } ?>

             <?php if (strpos($repoDoc->getArchivo(), "mp4")){ ?>
              
              <video src="../multimedios/videos/<?php echo $repoDoc->getArchivo();?>" poster="" width="500px" height="500px" controls></video>

             <?php } ?>
        </div>
        <div class="col">
          <div>
            <h4 class="d-flex justify-content-center">Titulo</h4>
            <p class="blockquote text-muted d-flex justify-content-center"><?php echo $repoDoc->getTitulo(); ?></p>
          </div>
           <br>

          <div>
            <h4 class="d-flex justify-content-center">Autor</h4>
            <p class="blockquote text-muted d-flex justify-content-center"><?php echo $repoDoc->getAutor(); ?></p>
          </div>
          <br>

          <div>
            <h4 class="d-flex justify-content-center">Descripción</h4>
            <p class="blockquote text-muted d-flex justify-content-center"><?php echo $repoDoc->getDescripcion(); ?></p>
          </div>
           <br>

          <div>
            <h4 class="d-flex justify-content-center">Categoría</h4>
            <p class="blockquote text-muted d-flex justify-content-center"><?php echo $repoDoc->getCategoria(); ?></p>
          </div>
           <br>
           
          <div>
            <h4 class="d-flex justify-content-center">Fecha</h4>
            <p class="blockquote text-muted d-flex justify-content-center"><?php echo $fecha; ?></p>
          </div>
        </div>
    </div>
 </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>