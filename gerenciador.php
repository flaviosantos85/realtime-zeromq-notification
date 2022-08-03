<!DOCTYPE html>
<html>
<head>
	<title>Criar Publicação</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div class="box_form">
		<h1>Criar Publicação:</h1>
		
		<form id="form1" method="post" enctype="multipart/form-data">
			<input type="text" name="title" id="title" placeholder="Título"><br><br>

			<textarea id="message" name="message" placeholder="Mensagem"></textarea><br><br>

			<input type="file" name="photo" id="photo"><br><br>

			<input type="submit" value="Criar Publicação">
		</form>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>

		$( '#form1' ).on( 'submit', function( e ){
			e.preventDefault();
			
			$.post( 'insert-publish.php', $( this ).serialize()  )
			.done( function( data ) {
				var resp = JSON.parse( data );
				if( resp.status === 200 ){
					alert( 'Post publicado com sucesso' );
				}
			} );
		});
		
	</script>
</body>
</html>