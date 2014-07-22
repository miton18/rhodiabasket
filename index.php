<?php
	require 'inc/lessc.inc.php';
	try {
	     lessc::ccompile('style/main.less', 'style/main.css');
	     lessc::ccompile('style/mobile.less', 'style/mobile.css');
	} 
	catch (exception $ex) 
	{
	    exit('lessc fatal error:'.$ex->getMessage());
	}
?>
<html>
	<head>
		<!--	CSS	-->
		<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="style/bootstrap-responsive.min.css">
		<link rel="stylesheet" type="text/css" href="style/main.css">
		
		<link rel="stylesheet" type="text/css" href="style/mobile.css">
		<!-- GOOGLE FONT -->
		<!--link href='http://fonts.googleapis.com/css?family=Istok+Web' rel='stylesheet' type='text/css'>
		
				<link href='http://fonts.googleapis.com/css?family=Telex' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'-->

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
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" id="acceuil" href="index.php">
							<span id="brand">
								<img src="img/global/logo-s.png">RhodiaClub Basket
							</span>
						</a>
					</div>
					<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a id="plan" href="index.php?P=plan">Planning des matchs</a>
							</li>
							<li>
								<a id="equipe" href="index.php?P=equipe">Equipe</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a id="contact" href="index.php?P=contact">Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>

			<?php
				if ( isset ($_GET['P'])  )
				{
					if ( file_exists ("view/" + $_GET['P']) )
					{
						require_once ("view/" + $_GET['P']);
					}
					else
					{
						require_once ("view/404");
					}
				}
				else
				{
					require_once("view/acceuil");
				}
			?>	
		</div>
		<script type="text/javascript" src="jquery.min.js"  ></script>
		<script type="text/javascript" src="bootstrap.min.js"></script>		
		<script type="text/javascript">
			$(function(){
				var page = "<?= $_GET['P']?>";	  
				$("#" + page).parent().addClass("active");
			});
		</script>
	</body>
</html>