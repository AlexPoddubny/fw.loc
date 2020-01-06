<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$title?></title>
	
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>


<div class="container">
	<h1>Hello, world!</h1>
	<?=$content?>
	<div>
		<?= debug(\vendor\core\Db::$countSql)?>
	</div>
	<div>
		<?= debug(\vendor\core\Db::$queries)?>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>