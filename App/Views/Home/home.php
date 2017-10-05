<!DOCTYPE html>
<html>
<head>
	<title><?=$dados['titulo']?></title>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL?>assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		Variável: <?=$dados['senha']?>
		<br>
		<?php foreach($dados['usuarios'] as $usuario):?>
			<p><strong>Nome: </strong><?=$usuario['nome']?></p>
			<p><strong>E-mail: </strong><?=$usuario['email']?></p>
		<?php endforeach; ?>
	</div>
</body>
</html>