<?php 

$namesContactForm   = strip_tags(addslashes($_POST['namesContactForm']));
$emailContactForm   = strip_tags(addslashes($_POST['emailContactForm']));
$numberContactForm  = strip_tags(addslashes($_POST['numberContactForm']));
$cityContactForm    = strip_tags(addslashes($_POST['cityContactForm']));
$messageContactForm = strip_tags(addslashes($_POST['messageContactForm']));

if (
	!empty($namesContactForm)  &&
	!empty($emailContactForm)  &&
	!empty($numberContactForm) &&
	!empty($cityContactForm)   &&
	!empty($messageContactForm)
) {
	$nombre = "FACE CUTE - Portal Web";
	$mensaje = "¡Hola! en el portal FACE CUTE (https://jhoemsoftware.com/FaceCute/) han diligenciado el formulario de contacto en este instante.";
	$toSent = "www.jhonlive90@gmail.com";
	$theMessajePHP = "Notificación de Contacto * FACE CUTE";

	$sent = "De: $nombre \n";
	$sent .= "Mensaje: $mensaje \n";
	$sent .= "Nombres: $namesContactForm \n";
	$sent .= "Email: $emailContactForm \n";
	$sent .= "Número de Contacto: $numberContactForm \n";
	$sent .= "Ciudad: $cityContactForm \n";
	$sent .= "Mensaje: $messageContactForm \n";

	mail($toSent, $theMessajePHP, $sent);
	header("Location: response.php?nm=$namesContactForm");

} else {
	header("Location: response.php?er=1");
}

?>