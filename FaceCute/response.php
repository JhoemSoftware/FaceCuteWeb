<?php

$html = "";

if (isset($_GET['nm'])) {
	$usuario = $_GET['nm'];
	$html = "
	<img src='assets/img/success.png'>
	<h1>¡Hola! $usuario</h1>
	<p>
	Tu mensaje ha sido enviado correctamente
	</p>
	";
}

if (isset($_GET['er'])) {
	$error = $_GET['er'];
	$html = "
	<img src='assets/img/error.png'>
	<h1>¡Hola!</h1>
	<p>
	Tu mensaje no ha sido enviado, inténtalo nuevamente diligenciando todos los campos
	</p>
	";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FACE CUTE &reg;</title>
	<link rel="stylesheet" href="assets/css/animate.css"> <!-- FADE CONTENIDO -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="icon" type="image/jpg" href="assets/img/favicon.jpg">
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
</head>
<body id="response">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<?php echo $html; ?>
				<a href="/FaceCute/">regresar</a>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.parallax.js"></script>
	<script src="assets/js/smoothscroll.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/magnific-popup-options.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</body>
</html>