<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<?php use fw\core\base\View; View::getMeta();?>
	<link href="/blog/css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="/blog/css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<!--end slider -->
		<!--script-->
<script type="text/javascript" src="/blog/js/move-top.js"></script>
<script type="text/javascript" src="/blog/js/easing.js"></script>

<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
<!---->

</head>
<body>
<!---header---->			
<div class="header">  
	 <div class="container">
		  <div class="logo">
			  <a href="index.html"><img src="/blog/images/logo.jpg" title="" /></a>
		  </div>
			 <!---start-top-nav---->
			 <div class="top-menu">
				 <div class="search">
					 <form>
					 <input type="text" placeholder="" required="">
					 <input type="submit" value=""/>
					 </form>
				 </div>
				 <span class="menu"> </span>
				 <ul>
<!--					<li class="active"><a href="index.html">HOME</a></li>
					<li><a href="about.html">ABOUT</a></li>
					<li><a href="contact.html">CONTACT</a></li>
					<div class="clearfix"> </div>-->
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
			 </div>
			 <div class="clearfix"></div>
					<script>
					$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
					});
					</script>
				<!---//End-top-nav---->					
	 </div>
</div>
<!--/header-->
<div class="content">
	 <div class="container">
		 <div class="content-grids">
			 <div class="col-md-8 content-main">
				 <div class="content-grid">
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
					 <?=$content;?>
					 <!--<div class="content-grid-info">
						 <img src="/blog/images/post1.jpg" alt=""/>
						 <div class="post-info">
						 <h4><a href="single.html">Lorem ipsum dolor sit amet</a>  July 30, 2014 / 27 Comments</h4>
						 <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis.</p>
						 <a href="single.html"><span></span>READ MORE</a>
						 </div>
					 </div>-->
				 </div>
			 </div>
			 <div class="col-md-4 content-right">
				 <?php $this->getPart('inc/sidebar');?>
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
<!---->
<div class="footer">
	 <div class="container">
	 <p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
	 </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/blog/js/main.js"></script>
<?php if (!empty($scripts)){
	foreach ($scripts as $script){
		echo $script;
	}
}?>
</body>
</html>

	
