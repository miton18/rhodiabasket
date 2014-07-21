<?php
	require 'inc/lessc.inc.php';
	try {
	     lessc::ccompile('style/main.less', 'style/main.css');
	     lessc::ccompile('style/mobile.less', 'style/mobile.css');
	} catch (exception $ex) {
	     exit('lessc fatal error:'.$ex->getMessage());
	}
?>
<html>
	<head>
		<!--	CSS	-->
		<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
		
		<link href="style/main.css"   rel="stylesheet" type="text/css" />
		<link href="style/mobile.css" rel="stylesheet" type="text/css" />
		<!-- GOOGLE FONT -->
		<!--link href='http://fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" type="text/css" href="style/bootstrap-theme.css">

		<link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script-->



		<meta charset="utf_8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Site web du club de basket du RHODIA"/>
		<meta name="author" CONTENT="Auteur : Rémi collignon ;" />
		<meta name="copyright" content="© rhodiabasket" />
		<meta name="revisit" content="1 days" />

		<title>rhodiabasket - Site du club</title>

		<link rel="icon" type="image/png" href="img/fav.jpg" />
		<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="img/fav.jpg" /><![endif]-->
	</head>
	<body>
		<div class="container">
			<!--http://twbscolor.smarchal.com/scss?bd=4b58f5&bh=2113ca&cd=d7dbff&ch=ffffff-->
			<nav class="navbar navbar-default" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
				</button>
				<a class="navbar-brand" href=""><span id="brand"><img src="img/global/logo-s.png">RhodiaClub Basket</span></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="">Planning des matchs</a></li>
					<li><a href="">Link</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="">Contact</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</nav>

			<?php
				if ( isset ($_GET['P']) && file_exists ("view/" + $_GET['P']) )
				{
					require_once ("view/" + $_GET['P']);
				}
				else
				{
					require_once ("view/404");
				}
			?>	
		</div>
		<script type="text/javascript" src="bootstrapmin.js"></script>	
	</body>
</html>