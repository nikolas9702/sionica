$(document).ready(()=>{
	$(document).on ("click" , "#contactenos" , ( event ,) => {
		event.preventDefault();
		console.log($("#formContactenos").serialize());
		$.ajax({
			url: '/sionica/procesarUsuario.php',
			type: 'POST',
			dataType: 'json',
			data: {param1: 'value1'},
		})
		.done(function() {
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