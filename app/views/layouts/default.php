<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php use vendor\core\base\View;
		View::getMeta();
	?>
	
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>


<div class="container">
	<?php if (!empty($menu)):?>
	<ul class="nav nav-pills">
		<?php foreach ($menu as $item): ?>
			<li><a href="category/<?= $item['id'] ?>"><?= $item['title'] ?></a></li>
		<?php endforeach; ?>
	</ul>
	<?php endif;?>
	<h1>Hello, world!</h1>
	<?=$content?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<?php if (!empty($scripts)){
	foreach ($scripts as $script){
		echo $script;
	}
}?>
</body>
</html>