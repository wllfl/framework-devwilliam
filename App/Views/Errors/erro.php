<!DOCTYPE html>
<html>
<head>
	<title>Página de Erro</title>
	<style>
		.container{
			width: 1200px;
			margin : 5px auto;
			background-color: #ECECEC;
			color: #444;
			padding: 10px;
			border-radius: 3px;	
			font-family: Arial;
			box-shadow: 2px 2px 2px #ccc;
		}

		h3{
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3>Encontramos um erro:</h3>
		<p><?=$erro?></p>
	</div>
</body>
</html>