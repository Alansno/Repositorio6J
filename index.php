<!doctype html>
<html lang="es-MX">
  <head>
  	<title>Respositorio 6J</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="administrador/src/css/bootstrap.min.css">
	<link rel="stylesheet" href="administrador/src/css/style.css">

	</head>
	<body>
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<!--<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Repositorio 6J</h2>
					</div>-->
				</div>
				<div class="row justify-content-center">
					<div class="col-md-12 col-lg-10"> <!-- responsivo md = mediam, lg = large-->
						<div class="wrap d-md-flex">
							<div style="text-align: center;">
								<img class="imglogo" src="administrador/src/images/bg-1.png" alt="logoFCA">
							</div>
							<!--<div class="img" <style="background-image: url(images/bg-1.jpeg);">
				      </div>-->
							<div class="login-wrap p-4 p-md-5">
								<div class="d-flex">
									<div class="w-100">
										<h3 class="mb-4">Iniciar sesión</h3>
									</div>
									<div class="w-100">
										<p class="social-media d-flex justify-content-end">
											<a href="#"
												class="social-icon d-flex align-items-center justify-content-center"><span
													class="fa fa-facebook"></span></a>
											<a href="#"
												class="social-icon d-flex align-items-center justify-content-center"><span
													class="fa fa-twitter"></span></a>
										</p>
									</div>
								</div>
								<form action="administrador/src/controlador/loginControlador.php" method="POST" enctype="application/x-www-form-urlencoded" class="signin-form">
									<div class="form-group mb-3">
										<label class="label" for="name">Usuario</label>
										<input type="text" class="form-control" name="usuario" placeholder="Username" required>
									</div>
									<div class="form-group mb-3">
										<label class="label" for="password">Contraseña</label>
										<input type="password" class="form-control" name="clave" placeholder="Password" required>
									</div>
									<div class="form-group">
										<button type="submit" class="form-control btn btn-primary rounded submit px-3">Ingresar</button>
									</div>
									<div class="form-group d-md-flex">
										<p class="text-center">¿No tienes una cuenta? <a  href="administrador/src/vistas/registrarUsuario.html">Click aquí</a></p>
										<div class="w-50 text-md-right">
											<a href="administrador/src/vistas/recuperarContraseñaForm.html">olvide mi contraseña</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	
		<script src="administrador/src/js/jquery.min.js"></script>
		<script src="administrador/src/js/popper.js"></script>
		<script src="administrador/src/js/bootstrap.min.js"></script>
		<script src="administrador/src/js/main.js"></script>
	
	</body>
</html>

