<?php

$idUsuario=$_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <div class="blockquote" style="margin-top: 150px;">Introduce tu nueva contraseña</div>
                <form action="../controlador/claveControlador.php" method="POST" enctype="application/x-www-form-urlencoded" class="signin-form" style="margin-top: 70px;">
                <div class="form-group mb-3">
                        <input type="hidden" class="form-control" name="idUsuario" value="<?php echo $idUsuario ?>">
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">Contraseña</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">Confirmar contraseña</label>
                        <input type="password" class="form-control" name="confirmPassword" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3">Confirmar</button>
                    </div>     
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>

    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/popper.js"></script>
</body>
</html>