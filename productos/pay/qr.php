<?php 
if (isset($_POST['btnComprar'])) {

	$valorUnitarioProducto 	= $_POST['valorUnitarioProducto'];
	$nombreProductoSolicitado = $_POST['nombreProductoSolicitado'];
	$codigoProducto			= $_POST['codigoProducto'];
	$NomApllCliente 		= strip_tags(addslashes($_POST['NomApllCliente']));
	$DireccCliente 			= strip_tags(addslashes($_POST['DireccCliente']));
	$BarrCliente 			= strip_tags(addslashes($_POST['BarrCliente']));
	$CiudDircCliente 		= strip_tags(addslashes($_POST['CiudDircCliente']));
	$TelefCliente			= strip_tags(addslashes($_POST['TelefCliente']));
	$cantidadProductoCompra = strip_tags(addslashes($_POST['cantidadProductoCompra']));
	$valorDomicilio			= 12000;

	if ($nombreProductoSolicitado === "Loción Limpiadora y Aclarante FACE CUTE") {
		if ($cantidadProductoCompra >= 6) {
			$valorUnitarioProducto = $valorUnitarioProducto - 5000;
		}
	} else if ($nombreProductoSolicitado === "Kit FACE CUTE") {
		if ($cantidadProductoCompra >= 6) {
			$valorUnitarioProducto = $valorUnitarioProducto - 9000;
		}
	} else {
		if ($cantidadProductoCompra >= 6) {
			$valorUnitarioProducto = $valorUnitarioProducto - 2000;
		}
	}

	$ValorTotalCompraConDomicilio = ($valorUnitarioProducto * $cantidadProductoCompra) + $valorDomicilio;
	$ValorTotalCompraSinDomicilio = $valorUnitarioProducto * $cantidadProductoCompra;

	$valorLetraTotal = number_format($ValorTotalCompraConDomicilio,0,'.',',');
	$valorLetraTotalSinDomicilio = number_format($ValorTotalCompraSinDomicilio,0,'.',',');
	$valorLetraUnitario = number_format($valorUnitarioProducto,0,'.',',');
	$valorLetraDomicilio = number_format($valorDomicilio,0,'.',',');
	
	$DireccClienteNuevo = str_replace("#", "No.", $DireccCliente);
	
	$msgWhp = "https://api.whatsapp.com/send?phone=573116298374&text=¡Hola!%20He%20realizado%20solicitud%20de%20producto%20desde%20portal%20web.%20$nombreProductoSolicitado,%20código:%20$codigoProducto,%20cantidad:%20$cantidadProductoCompra%20unidad%20(es),%20a%20nombre%20de:%20$NomApllCliente,%20Telefono:%20$TelefCliente,%20Dirección:%20$DireccClienteNuevo,%20Ciudad:%20$CiudDircCliente,%20Barrio:%20$BarrCliente,%20He%20realizado%20el%20pago%20de:%20\$$valorLetraTotal.%20Adjunto%20evidencia";

	$html = "
			<div class='container mt-5'>
				<a href='$msgWhp' class='btn btn-info' target='_blank' style='width:300px;padding-top: 15px;font-size:12px;'>
					ENVIAR COMPROBANTE PAGO
				</a>
			</div>
			";
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
				<div class="container">
					<div class="container">
						<p style="text-align:justify;">
							Antes de realizar el pago ten presente la información de tus datos para que tu pedido sea entregado, ten presente que para el pago de tus productos debe realizarse desde tu aplicación bancaria. Contamos con las siguientes opciones para la realización del pago
						</p>
						<img src="../../assets/img/bancolombia-nequi.png" style="max-width:150px;">
						<div class="container">
							<ul style="text-align:left;font-size: 17px;">
								<li><b>Nombres Cliente : </b> <?php echo $NomApllCliente; ?></li>
								<li><b>Dirección Cliente : </b> <?php echo $DireccCliente; ?></li>
								<li><b>Barrio Cliente : </b> <?php echo $BarrCliente; ?></li>
								<li><b>Ciudad Cliente : </b> <?php echo $CiudDircCliente; ?></li>
								<li><b>Teléfono Cliente : </b> <?php echo $TelefCliente; ?></li>
								<li><b>Producto Solicitad : </b> <?php echo $nombreProductoSolicitado; ?></li>
								<li><b>Valor Unit. Producto : </b>$ <?php echo $valorLetraUnitario; ?></li>
								<li><b>Cantidad de Productos : </b> <?php echo $cantidadProductoCompra; ?></li>
								<li><b>Valor de envío : </b> $<?php echo $valorLetraDomicilio; ?></li>
								<!--<li><b>Valor sin envío : </b> $<?php echo $valorLetraTotalSinDomicilio; ?></li>-->
								<li><b>Total a Pagar : </b> $<?php echo $valorLetraTotal; ?></li>
							</ul>
						</div>
					</div>
					<p>
						<a class="btn btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Pago por QR</a>
						<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Transferencia Bancaria</button>
					</p>
					
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="collapse multi-collapse" id="multiCollapseExample1">
								<div class="col-12 mb-5 align-self-center">
									<img src="../../assets/img/qr.jpeg">
									<p style="text-align:justify;margin-top: 20px;">
										Este es nuestro QR de pagos, por favor verifica que al momento de escanear el código desde tu aplicación bancaria te aparezca como persona titular de cuenta <b>LAURA VIVIANA VARGAS JIMENEZ</b> con la descripción <b>FACE CUTE_LOCION__FACE CUTE LOCION</b>
									</p>
									<p style="margin-bottom: 5px; text-align: justify;">
										Código QR para la transferencia bancaria de tu pago, al realizar tu pago no olvides enviar tu evidencia de pago (captura de pantalla) al número de WhatsApp <span style="text-shadow: 1.5px 1px #000;font-weight: bold;">(57) 311 6298374</span>
									</p>
								</div>
								<div class="col-12 mb-5 mt-5">
									<?php echo $html; ?>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="collapse multi-collapse" id="multiCollapseExample2">
								<div class="col-12 mb-5 align-self-center">
									<p style="text-align:justify;">
										Este es nuestro número de cuenta bancaria para pagos, por favor verifica que al momento de insertar el número sea el correcto para evitar anomalías. <b>CUENTA DE AHORROS BANCOLOMBIA</b> No. <b>542 1618 2475</b>
									</p>
									<p style="margin-bottom: 5px; text-align: justify;">
										Al realizar tu pago no olvides enviar tu evidencia de pago (captura de pantalla) al número de WhatsApp <span style="text-shadow: 1.5px 1px #000;font-weight: bold;">(57) 311 6298374</span>
									</p>
								</div>
								<div class="col-12 mb-5 mt-5">
									<?php echo $html; ?>
								</div>
							</div>
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
										Puedes contactarnos vía correo electrónico a <span>ventas@locionlimpiadorayaclarante.com</span> y/o nuestro Whatspp <span>(57) 317 5012259</span>
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
		<script type="text/javascript">
			window.onload = function () {

			}

		/*así capturo un evento
		$('#btnComprar').click(function(e) {
			e.preventDefault();
			console.log('Clic Botón Solicitar');

		});*/
	</script>
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
