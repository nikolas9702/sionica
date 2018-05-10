$(document).ready(()=>{
	$(document).on ("click" , "#contactenos" , ( event ,) => {
		event.preventDefault();
		$.map({"name":"","correo":"","telefono":"","ciudad":"","mensaje":""}, function(item, index) {
			$(`[name='${index}']`).removeClass('error');
			$(`[name='error_${index}']`).removeClass('error_span').html('');
		});

		$.ajax({
			url: '/sionica/procesarUsuario.php',
			type: 'POST',
			dataType: 'json',
			data: $("#formContactenos").serialize(),
		})
		.done(function( response ) {
			if (typeof response.mensaje != undefined) {
				$("#mensajeRepuesta") .html (`			<div class="alert alert-success">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Exito</strong> Información almacena exitosamente
					</div>`);
			}else {
				$.map(response, function(item, index) {
					$(`[name='${index}']`).addClass('error');
					$(`[name='error_${index}']`).addClass('error_span').html(item);
				});
			}

			// $(response).map(function(index, elem) {
			// 	console.log(index);
			// 	console.log(elem);
			// });
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});
});