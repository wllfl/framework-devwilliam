<!DOCTYPE html>
<html>
<head>
	<title><?=$dados['titulo']?></title>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1><?php foreach($dados['usuarios'] as $usuario):?></h1>
			<p><?=$usuario->nome?></p>
		<h1><?php endforeach;?></h1>

		<span class='label label-danger'><?=$_SESSION['privilegio']?></span>

		<a href="#" class='btn btn-success'>Meu Link</a>
	</div>
</body>
</html>