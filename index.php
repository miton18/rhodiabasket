<?php
	require 'inc/lessc.inc.php';
	try 
	{
		lessc::ccompile('style/login.less', 'style/login.css');
	    lessc::ccompile('style/main.less', 'style/main.css');
	} 
	catch (exception $ex) 
	{
	    exit('lessc fatal error:'.$ex->getMessage());
	}
?>
<html data-ng-app="App">
	<head>
		<title>rhodiabasket - Site du club</title>
		<!--	CSS	-->
		<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style/bootstrap-theme.css">
		<link rel="stylesheet" type="text/css" href="style/bootstrap-responsive.min.css">
		<link rel="stylesheet" type="text/css" href="style/bootstrap-lightbox.min.css">
		<link rel="stylesheet" type="text/css" href="style/main.css">

		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="google-site-verification" content="EyrTXAHP2jU4hp5H7NuWMy1wYtgd-9zQP2hUcHrVp80" />
		<!-- SEO -->
		<meta name="description" content="Site web du club de Basket du RHODIA à Salaise-sur-sanne"/>
		<meta name="author" CONTENT="Rémi collignon" />
		<meta name="revisit-after" content="1 days" />
		<meta name="keywords" content="basket,sport,equipe,rhodia,salaise-sur-sanne,roussillon,le peage,">

		<link rel="icon" type="image/png" href="img/global/logo-s.png" />
		<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="iimg/global/logo-s.png" /><![endif]-->

		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
		<!--script src="//localhost/SOURCES/angular.min.js"></script-->
	</head>
	<body>
		<div class="container">
			<!--http://twbscolor.smarchal.com/scss?bd=4b58f5&bh=2113ca&cd=d7dbff&ch=ffffff-->
			<nav class="navbar navbar-default" data-ng-controller="navControl" role="navigation">
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
								<img alt="logo du rhodiabasket" src="img/global/logo-s.png"> RhodiaClub Basket
							</span>
						</a>
					</div>
					<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php">Accueil</a>
							</li>
							<li>
								<a href="index.php?P=news">
								Evènements</a>
							</li>
							<li id="planM" >
								<a href="index.php?P=planM">Planning des matchs 
								</a>
							</li>
							<li id="planE" >
								<a href="index.php?P=planE">Planning entrainements 
								</a>
							</li>
							<li id="equipe" ><a class="dropdown-toggle"  data-toggle="dropdown" href="#">Encadrement 
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu" >
  									<li role="presentation">
  										<a role="menuitem" tabindex="-1" href="index.php?P=equipe#B">Le bureau</a>
  									</li>
  									<li role="presentation">
  										<a role="menuitem" tabindex="-1" href="index.php?P=equipe#E">Les entraineurs</a>
  									</li>
  								</ul>
							</li>
							<li id="gal" >
								<a href="index.php?P=gal">Galerie
								</a>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<!--li>
								<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Newsletter</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<div role="menuitem" tabindex="-1" class="input-group">
											<span class="input-group-addon">@</span>
											<input type="email" class="form-control" placeholder="Mail">
										</div>
									</li>
								</ul>
							</li-->
							<li>
								<a id="contact" href="index.php?P=contact">Contact</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
			<?php
				if ( isset ($_GET['P']) and $_GET['P'] != "" )
				{
					if ( file_exists ("view/" . $_GET['P']) or file_exists ("view\\" . $_GET['P']) )
					{
						require_once ("view/" . $_GET['P']);
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

			<div class="row">
				<div class="col-sm-4 col-sm-offset-4" style="background-color: white;padding-bottom: 30px;padding-top: 30px;" >
					<form method="post" action="http://rhodiabasket.fr/NEWSLETTER/subscribe.php" target="_BLANK" id="news_form">
						<fieldset>
							<legend>Inscription à la newsletter</legend>
							<p id="notif"></p>
							<div class="input-group">
								<span class="input-group-addon">@</span>
								<input type="text" id="email" maxlength="100" class="form-control" placeholder="Adresse E-mail">
							</div>
							<br>
							<input type="radio" name="action" value="inscription" checked="checked" /> Inscription <br />
							<input type="radio" name="action" value="desinscription" /> Désinscription <br />
							<input class="btn btn-primary btn-lg" type="submit" name="wanewsletter" value="Valider" />
						</fieldset>
					</form>
				</div>
			</div>

			<footer id="footer-Principal" class="col-sm-12" style="z-index:100000;">
					<div class="container-fluid">
						<p class="muted credit text-center">
							<a href="index.php?P=gestion">Gestion des licensiés</a>
							RhodiaBasket, site officiel du club de basket du rhodia, créé par 
							<a href="http://remi.rcdinfo.fr" target="_blank">Collignon Rémi</a>
							Copyright réservé Rhodiabasket
						</p>
					</div>
			</footer>
		</div>
		<script type="text/javascript" src="jquery.min.js"  >
		</script>
		<script type="text/javascript" src="bootstrap.min.js">
		</script>
		<script type="text/javascript" src="bootstrap-lightbox.min.js"> 
		</script>
		<script type="text/javascript" src="ui-bootstrap-tpls-0.11.0.min.js">
		</script>		
		<script type="text/javascript" src="main.js">
		</script>	
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-55921970-2', 'auto');
		  ga('send', 'pageview');

		</script>
		<script>
			$(document).ready( function()
			{
				$('#news_form').on('submit', function(e)
				{
					var form = $(this);
					e.preventDefault();
					$.ajax({
						url : form.attr('action'),
						type: 'POST',
						data: {
							email: $('#email').val(),
							liste: 1,
							format: 2,
							action: 'inscription'
						}
					})
					.done(function()
					{
						$('#notif').html("Pris en compte!");
					})
					.fail(function()
					{
						alert( "Une erreur s'est produite, l'action demandée n'a pas été éxécutée" );
					});
				});
			});

		</script>
	</body>
</html>
