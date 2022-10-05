const moduleProduct = (() => {
        const CalcularPrecioPago = () => {
            let valorProductoCompra = $('#valorProductoCompra').val();
            let cantidadProductoCompra = $('#cantidadProductoCompra').val();
            let nombreProductoSolicitado = $('#nombreProductoSolicitado').val();
            const valorDomicilio = 12000;
            const mensaje1 = $('#MensajeAlertaSucc');
            const mensaje2 = $('#MensajeAlertaDang');

            //mensaje1.removeAttr('hidden');	ver
            //mensaje1.attr('hidden',true);		ocultar

            console.log("Cantidad productos: " + cantidadProductoCompra);
            console.log("Valor producto: " + valorProductoCompra);

            if (cantidadProductoCompra === "") {
                mensaje2.removeAttr('hidden');
                mensaje1.attr('hidden',true);
                $('#textoErrorAlerta2').text('Debes seleccionar la cantidad de productos que deseas');
            } else if(cantidadProductoCompra <= 0) {
                mensaje2.removeAttr('hidden');
                mensaje1.attr('hidden',true);
                $('#textoErrorAlerta2').text('La cantidad debe ser mayor a CERO');
            } else {

                if (nombreProductoSolicitado === "Loción Limpiadora y Aclarante FACE CUTE") {
                    if (cantidadProductoCompra >= 6) {
                        valorProductoCompra = valorProductoCompra - 5000;
                    }
                }

                let valorCompraSinDomicilio = valorProductoCompra * cantidadProductoCompra;

                let resultadoPagarTotal = (valorProductoCompra * cantidadProductoCompra) + valorDomicilio;

                let ResultadoPagarTotalTexto = resultadoPagarTotal.toString().replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1,');

                let ResultadoPagarDomicilioTexto = valorDomicilio.toString().replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1,');

                let ResultadoPagarTotalSinDomicilioTexto = valorCompraSinDomicilio.toString().replace(/(?<!\..*)(\d)(?=(?:\d{3})+(?:\.|$))/g, '$1,');
                
                mensaje1.removeAttr('hidden');
                mensaje2.attr('hidden',true);
                
                $('#textoErrorAlerta1').text("El valor de su compra es: $"
                                                + ResultadoPagarTotalSinDomicilioTexto + 
                                                " El valor del envío es: $" 
                                                + ResultadoPagarDomicilioTexto + 
                                                " El valor total a pagar es: $" 
                                                + ResultadoPagarTotalTexto );
                //$('#FormAddCompra').submit();
            }
        }

        const productoValidar = () => {
            const elementoInput = document.getElementById('cantidadProductoCompra');
            elementoInput.addEventListener('blur', CalcularPrecioPago);
        }
       
        /*así capturo un evento
        $('#btnComprar').click(function(e) {
            e.preventDefault();
            console.log('Clic Botón Solicitar');

        });*/
    return {
        productoValor : productoValidar()
    } 
})
();