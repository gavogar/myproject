<html>
<head>
	<title>Show Books</title>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>


	<a href="#" id="book-button">Load Books</a>
	<div id="nombre"></div>
	
	
	<input type="text" name="nombre" value="" id="textNombre"/>
	<input type="button" name="Submit" value="Submit" id="enviar"/>
	<div id="message"></div>

	<script>
		$(function(){
		$('#book-button').on('click', function(e){
				e.preventDefault();//preventDefaul anula el evento madre, en este caso no se abre en una nueva página
			$('#nombre').html('loading...');

			$.get('books', function(users){  //por qué es $.get()
					var nombre = '';
				$.each(users, function(){

					nombre += this.nombre + '<br>';					
					
				});

			$('#nombre').html(nombre);
			
			$('#book-button').hide();

			});
			});
		
			
		
		function sendAjax () {
				 	
		  $.post('books',
		  		{ 
		  			nombre: $('#textNombre').val() 
		  		},
		  		function (message) {
					$("#message").html(message);
				}, 
				"json"
				);
		}
		
		$("#enviar").on("click", function () {
		  			
		  			sendAjax();
		  			
				});  
		});
		
	</script>

</body>
</html>