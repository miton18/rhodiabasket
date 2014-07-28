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
<html ng-app="App">
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

		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
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
								<img src="img/global/logo-s.png"> RhodiaClub Basket
							</span>
						</a>
					</div>
					<div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Accueil</a></li>
							<li id="planM" >
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Planning des matchs 
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu" >
  									<li role="presentation">
  										<a role="menuitem" tabindex="-1" href="index.php?P=planM&amp;T=M">Masculin</a>
  									</li>
  									<li role="presentation">
  										<a role="menuitem" tabindex="-1" href="index.php?P=planM&amp;T=F">Féminin</a>
  									</li>
  								</ul>
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
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Gallerie
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu" >
  									<li role="presentation">
  										<a role="menuitem" tabindex="-1" href="index.php?P=gal&amp;T=M">Masculin</a>
  									</li>
  									<li role="presentation">
  										<a role="menuitem" tabindex="-1" href="index.php?P=gal&amp;T=F">Féminin</a>
  									</li>
  								</ul>
							</li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a  class="dropdown-toggle" data-toggle="dropdown" href="#">Newsletter</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<div role="menuitem" tabindex="-1" class="input-group">
											<span class="input-group-addon">@</span>
											<input type="email" class="form-control" placeholder="Mail">
										</div>
									</li>
								</ul>
							</li>
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
		</div>
		<footer class="col-sm-12">
			<div class="container-fluid">
				<p class="muted credit text-center">
					RhodiaBasket, site officiel du club de basket du rhodia, créé par 
					<a href="http://remi.rcdinfo.fr" target="_blank">Collignon Rémi</a>
				</p>
			</footer>
		</div>
		<script type="text/javascript" src="jquery.min.js"  ></script>
		<script type="text/javascript" src="bootstrap.min.js"></script>	
		<script type="text/javascript">
			$(document).ready( function () {
				$.urlParam = function(sParam){
				    var sPageURL = window.location.search.substring(1);
				    var sURLVariables = sPageURL.split('&');
				    for (var i = 0; i < sURLVariables.length; i++)
				    {
				        var sParameterName = sURLVariables[i].split('=');
				        if (sParameterName[0] == sParam)
				        {
				            return sParameterName[1];
				        }
				        else
				        {
				        	return false;
				        }
				    }
				}
				/*	Fonce le menu par rapport a la page active	*/
				$(function(){ 
					$( "#" + $.urlParam('P') ).addClass("active");
				});

				$(function(){
					var ancre = $.urlParam('T');
					if( ancre != false ){
					    $('html,body').animate(
					    {
					    	scrollTop: $(ancre).offset().top
					    }, 'slow' );
					}  
				});
			});
		</script>
	</body>
</html>