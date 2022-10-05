<?php 
	$producto = "";
	$urlImagen = "";
	$valor = 0;
	if (isset($_GET['lcn'])) {
		switch ($_GET['lcn']) {
			case '1':
			$producto = "Loción Limpiadora y Aclarante FACE CUTE";
			$urlImagen = "../../assets/img/VidrioCaja3.jpg";
			$valor = 50000;
			break;
			case '2':
			$producto = "Loción Humectante FACE CUTE";
			$urlImagen = "../../assets/img/Locion2.jpg";
			$valor = 12000;
			break;
			case '3':
			$producto = "Jabón Facial FACE CUTE";
			$urlImagen = "../../assets/img/Jabon.jpg";
			$valor = 12000;
			break;
			case '4':
			$producto = "Kit FACE CUTE";
			$urlImagen = "../../assets/img/Combo.jpg";
			$valor = 74000;
			break;
			case '5':
			$producto = "Loción Limpiadora y Aclarante FACE CUTE";
			$urlImagen = "../../assets/img/ComoPlastico1.jpg";
			$valor = 50000;
			break;
		}

		if (isset($_GET['cp'])) {
			$codigoProducto = $_GET['cp'];
		}

		$valorLetra = number_format($valor,0,'.',',');
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>FACE CUTE &reg;</title>
		<link rel="stylesheet" href="../../assets/css/animate.css"> <!-- FADE CONTENIDO -->
		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		<link rel="icon" type="image/jpg" href="../../assets/img/logo.png">
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
	</head>
	<body>
		<!-- Botón de Whatsapp Genérico -->
		<a href="https://api.whatsapp.com/send?phone=573116298374&text=¡Hola!%20&#128075;%20Gracias%20por%20comunicarte%20con%20FACE%20CUTE.%20¿Cómo%20podemos%20ayudarte?" class="whatsapp" target="_blank">
			<img src="../../assets/img/whp.png" alt="logo-whatsapp">
		</a>
		<!-- Logo Página -->
		<div class="container-fluid contenedorLogo">
			<div class="wow fadeInUp" data-wow-delay=".3s">
				<img src="../../assets/img/favicon.jpg" id="logoPage" style="max-width: 150px;max-height: 150px;"/>
			</div>
		</div>
		<!-- Formulario de Pedido -->
		<main>
			<div class="container">
				<div class="container mb-5">
					<div class="col-12 mb-5">
						<h1><?php echo $producto; ?></h1>
						<hr>
						<div class="col-12 mt-5 mb-3">
							<div id="test">
								<h1>Solicitud de Compra</h1>
								<p>
									La <b><?php echo $producto; ?></b> tiene un valor de <b>$<?php echo $valorLetra; ?></b> cada una. El producto debe solicitarse diligenciando el siguiente formulario. Es importante aclarar que los datos de la persona que diligencie el formulario será la titular de la compra y a quien llegará el pedido. Por favor ingresar la información de la manera más clara y concreta posible para así facilitar el proceso de entrega. Cualquier duda o inquietud, se cuenta con el contacto de WhatsApp para la atención al usuario.
								</p>
							</div>
						</div>
						<div class="row justify-content-around mt-5 mb-5">
							<div class="col-12 col-md-5 align-self-center">
								<div id="test">
									<!-- <img src="../../assets/img/qr.jpeg"> -->
									<img src="<?php echo $urlImagen; ?>" class="imagenesContenido">
								</div>
							</div>
							<div class="col-12 col-md-6 align-self-center">
								<form action="qr.php" method="POST" enctype="multipart/form-data" id="FormAddCompra">
									<!-- Unitario -->
									<input type="hidden" id="valorProductoCompra" name="valorUnitarioProducto" value="<?php echo $valor; ?>">
									<!-- Product -->
									<input type="hidden" id="nombreProductoSolicitado" name="nombreProductoSolicitado" value="<?php echo $producto; ?>">
									<!-- -->
									<!-- Codigo Product -->
									<input type="hidden" id="codigoProducto" name="codigoProducto" value="<?php echo $codigoProducto; ?>">
									<!-- -->
									<div class="row justify-content-around">
										<div class="col-12 col-sm-6 form-group">
											<label>Nombres y Apellidos</label>
											<input type="text" name="NomApllCliente" class="form-control" tabindex="1" required>
										</div>
										<div class="col-12 col-sm-6 form-group">
											<label>Dirección</label>
											<input type="text" name="DireccCliente" class="form-control" tabindex="2" required>
										</div>
										<div class="col-12 col-sm-6 form-group">
											<label>Barrio</label>
											<input type="text" name="BarrCliente" class="form-control" tabindex="3" required>
										</div>
										<div class="col-12 col-sm-6 form-group">
											<label>Ciudad</label>
											<input type="text" name="CiudDircCliente" class="form-control" tabindex="4" required>
										</div>
										<div class="col-12 col-sm-6 form-group">
											<label>Teléfono</label>
											<input type="number" name="TelefCliente" class="form-control" tabindex="5" required>
										</div>
										<div class="col-12 col-sm-6 form-group">
											<label>Cantidad de Producto</label>
											<input type="number" name="cantidadProductoCompra" class="form-control" id="cantidadProductoCompra" tabindex="6" required>
										</div>
										<!-- BLOQUES MENSAJE ALERT -->
										<div class="col-12 form-group">
											<div class="alert alert-success" role="alert" hidden id="MensajeAlertaSucc">
												<p id="textoErrorAlerta1"></p>
											</div>
										</div>
										<div class="col-12 form-group">
											<div class="alert alert-danger mt-3" role="alert" hidden id="MensajeAlertaDang">
												<p id="textoErrorAlerta2"></p>
											</div>
										</div>
										<!-- -->
										<div class="col-12 form-group mt-3">
											<input type="submit" class="btn btn-info" value="COMPRAR" id="btnComprar" name="btnComprar" tabindex="7">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-12 mt-5">
						<a href="../" style="color: #2F2F30;text-shadow: 1px .5px #30dfb3;">volver atrás</a>
					</div>
					<div class="col-12 mt-3 mb-5">
						<a href="../../" style="color: #2F2F30;text-shadow: 1px .5px #30dfb3;">regresar al inicio</a>
					</div>
				</div>
			</div>
		</main>
		<!-- Footer -->
		<footer>
			<div class="container mt-5" id="contactenos">
				<h1 style="color:#fff">CONTACTO</h1>
				<hr>
				<div class="row justify-content-around mt-5">
					<div class="col-12 col-md-6 align-self-center">
						<div id="test">
							<div class="row justify-content-center">
								<div class="col-2 col-sm-2">
									<a href="https://www.facebook.com/facecutelocion/" target="_blank">
										<img src="../../assets/img/facebook.png" class="iconoSocial">
									</a>
								</div>
								<div class="col-2 col-sm-2">
									<a href="https://www.instagram.com/facecutecolombia/" target="_blank">
										<img src="../../assets/img/instagram.png" class="iconoSocial">
									</a>
								</div>
								<div class="col-12">
									<p>
										Síguenos y entérate de consejos, tips y beneficios de nuestros productos
									</p> 
								</div>
								<div class="col-12">
									<p>
										Puedes contactarnos vía correo electrónico a <span>ventas@locionlimpiadorayaclarante.com</span> y/o nuestro Whatspp <span>(57) 311 6298374</span>
									</p>
								</div>
								<div class="col-12 mt-3 fabricante d-none d-md-block">
									<img src="../../assets/img/formula.png">
									<p style="text-align:center; margin-top: 10px;">
										<b>FACE CUTE &reg;</b> es un producto de <b>FM Fórmula Magistral</b>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 align-self-center mb-3">
						<p class="mb-3 mt-3">
							Los campos con asterísco (<span>*</span>) son obligatorios
						</p>
						<form method="POST" action="contact.php">
							<div class="row">
								<div class="form-group col-12 col-sm-6">
									<label>Nombres y Apellidos <span>*</span></label>
									<input type="text" class="form-control" required="required" name="namesContactForm">
								</div>
								<div class="form-group col-12 col-sm-6">
									<label>Correo Electrónico <span>*</span></label>
									<input type="email" class="form-control" required="required" name="emailContactForm">
								</div>
								<div class="form-group col-12 col-sm-6">
									<label>Número de Contacto <span>*</span></label>
									<input type="number" class="form-control" required="required" name="numberContactForm">
								</div>
								<div class="form-group col-12 col-sm-6">
									<label>Ciudad Ubicación <span>*</span></label>
									<input type="text" class="form-control" required="required" name="cityContactForm">
								</div>
								<div class="form-group col-12">
									<label>Mensaje <span>*</span></label>
									<textarea class="form-control" rows="3" required="required" name="messageContactForm"></textarea>
								</div>
								<div class="form-group col-12">
									<button type="submit" class="btn btn-info">CONTACTAR</button>
								</div>
							</div>
						</form>					
					</div>
					<div class="col-12 mt-3 mb-3 fabricante d-md-none">
						<img src="../../assets/img/formula.png">
						<p style="text-align:center; margin-top: 10px;">
							<b>FACE CUTE &reg;</b> es un producto de <b>FM Fórmula Magistral</b>
						</p>
					</div>
					<div class="col-12">
						<p id="creditos">
							Portal web desarrollado por <a href="https://jhoemsoftware.com/" target="_blank">Jhoem Software &reg;</a>
						</p>
					</div>
				</div>
			</div>
		</footer>
	<script src="../../../assets/js/jquery.js"></script>
	<script src="../../../assets/js/bootstrap.min.js"></script>
	<script src="../../../assets/js/jquery.parallax.js"></script>
	<script src="../../../assets/js/smoothscroll.js"></script>
	<script src="../../../assets/js/jquery.magnific-popup.min.js"></script>
	<script src="../../../assets/js/magnific-popup-options.js"></script>
	<script src="../../../assets/js/wow.min.js"></script>
	<script src="../../../assets/js/custom.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
	<script src="../../assets/js/products-min.js"></script>
	<script>
		window.onload = () => moduleProduct.productoValor();
	</script>
</body>
</html>

<?php

} else {

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>FACE CUTE &reg;</title>
		<link rel="stylesheet" href="../../assets/css/animate.css"> <!-- FADE CONTENIDO -->
		<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
		<link rel="icon" type="image/jpg" href="../../assets/img/favicon.jpg">
		<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="../../assets/css/index.css">
	</head>
	<body>
		<!-- Logo Página -->
		<div class="container-fluid contenedorLogo">
			<div class="wow fadeInUp" data-wow-delay=".3s">
				<img src="../../assets/img/favicon.jpg" id="logoPage"/>
			</div>
		</div>
		<div class="col-12 mt-5">
			<h1>Estás navegando de forma errónea en nuestra plataforma, regresa e inténtalo nuevamente</h1>
		</div>
		<div class="col-12 mt-5 mb-5">
			<a href="../">regresar</a>
		</div>

		<script src="../../../assets/js/jquery.js"></script>
		<script src="../../../assets/js/bootstrap.min.js"></script>
		<script src="../../../assets/js/jquery.parallax.js"></script>
		<script src="../../../assets/js/smoothscroll.js"></script>
		<script src="../../../assets/js/jquery.magnific-popup.min.js"></script>
		<script src="../../../assets/js/magnific-popup-options.js"></script>
		<script src="../../../assets/js/wow.min.js"></script>
		<script src="../../../assets/js/custom.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
	</body>
	</html>

	<?php

}

?>
