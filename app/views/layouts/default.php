<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php use fw\core\base\View;
		View::getMeta();
	?>
	
	<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>
<div class="container">
	<!-- MENU begin -->
	<ul class="nav nav-pills">
		<li><a href="/">Home</a></li>
		<?php if (!isset($_SESSION['user'])):?>
			<li><a href="/user/signup">Sign Up</a></li>
			<li><a href="/user/login">Login</a></li>
		<?php endif;?>
		<?php if (isset($_SESSION['user'])):?>
			<li><a href="/user"><?=$_SESSION['user']['login']?></a></li>
			<li><a href="/user/logout">Logout</a></li>
			<?php if ('admin' == $_SESSION['user']['role']):?>
				<li><a href="/admin">ADmin</a></li>
			<?php endif;?>
		<?php endif;?>
		<li><a href="/fbparse">FB Parser</a></li>
	</ul>
	<!-- MENU end -->
	<!-- MESSAGES begin -->
	<?php if (isset($_SESSION['error'])):?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo $_SESSION['error'];
				unset($_SESSION['error'])
			?>
		</div>
	<?php endif;?>
	<?php if (isset($_SESSION['success'])):?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo $_SESSION['success'];
				unset($_SESSION['success'])
			?>
		</div>
	<?php endif;?>
	<!-- MESSAGES end -->
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