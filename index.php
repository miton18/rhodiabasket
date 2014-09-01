<?php
	require 'inc/lessc.inc.php';
	try 
	{
	     lessc::ccompile('style/main.less', 'style/main.css');
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

		<meta charset="utf_8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Site web du club de basket du RHODIA"/>
		<meta name="author" CONTENT="Auteur : Rémi collignon ;" />
		<meta name="copyright" content="© rhodiabasket" />
		<meta name="revisit" content="1 days" />

		<title>rhodiabasket - Site du club</title>

		<link rel="icon" type="image/png" href="img/global/logo-s.png" />
		<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="iimg/global/logo-s.png" /><![endif]-->

		<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.21/angular.min.js"></script>
		<!--script src="//localhost/SOURCES/angular.min.js"></script-->
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
								<a href="index.php?P=gal">Gallerie
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
		</div>
		<footer id="footer-Principal" class="col-sm-12">
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
		<script>
	
	var App = angular.module('App',[]);
	// CONTROLEUR VIEW EQUIPE
	App.controller('equipe', function($scope) 
	{
		$scope.Entraineur = [
			{
				"nom"   : "Tristan",
				"poule" : "Cadets",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/face/tristan.jpg"
			},
			{
				"nom"   : "Mélanie",
				"poule" : "Minimes (filles)",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/face/melanie.jpg"
			},
			{
				"nom"   : "Elsa",
				"poule" : "Poussins",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/face/elsa.jpg"
			},
			{
				"nom"   : "Valérie",
				"poule" : "Poussins / Poussines",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/global/personne.png"
			},
			{
				"nom"   : "Anthony",
				"poule" : "Benjamins",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/global/personne.png"
			},
			{
				"nom"   : "Charlotte",
				"poule" : "Minimes (garçons)",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/global/personne.png"
			},
			{
				"nom"   : "Coralie",
				"poule" : "Minimes (garçons)",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/face/coralie.jpg"
			},
			{
				"nom"   : "Cyrielle",
				"poule" : "Benjamines",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/global/personne.png"
			},
			{
				"nom"   : "Karine",
				"poule" : "Cadets",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/global/personne.png"
			},
			{
				"nom"   : "Loris",
				"poule" : "Benjamines",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/global/personne.png"
			},
			{
				"nom"   : "Malik",
				"poule" : "Benjamins",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/global/personne.png"
			},
			{
				"nom"   : "Nicolas",
				"poule" : "Minimes (filles)",
				"mail"  : "---",
				"role"  : "Entraineur / Resp. technique",
				"photo" : "img/face/nicolas.jpg"
			},
			{
				"nom"   : "Ousmane",
				"poule" : "Seniors (filles)",
				"mail"  : "---",
				"role"  : "Entraineur",
				"photo" : "img/face/ousmane.jpg"
			}
			/*{
				"nom"   : "Rémi Collignon",
				"poule" : "http://remi.rcdinfo.fr",
				"mail"  : "contact@rcdinfo.fr",
				"role"  : "Developpeur web",
				"photo" : "https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xfp1/t1.0-1/c27.0.160.160/p160x160/10308337_10202773982822199_7573237223106598054_n.jpg"
			}*/
		];
	});
	// CONTROLEUR VIEW CONTACT
	App.controller('mapi', function($scope)
	{

		$scope.gymnases = [
			{
				"nom": "Gymnase Frédéric MISTRAL",
				"adr": "rue Victor Renelle 38550 St Maurice l’Exil",
				"lat": "45.396264",
				"lon": "4.780496"
			},
			{
				"nom": "Gymnase Bacquet",
				"adr": "avenue Beyle Stendhal 38150 Roussillon",
				"lat": "45.365006",
				"lon": "4.806152"
			},
			{
				"nom": "Gymnase Joseph Plat",
				"adr": "impasse Jean Bouin 38150 Salaise sur Sanne",
				"lat": "45.342242",
				"lon": "4.815425"
			},
			{
				"nom": "Gymnase Pierre Quinon",
				"adr": "rue Edouard Aubert 38150 Salaise sur Sanne.",
				"lat": "45.339812",
				"lon": "4.819527"
			}
		];
		function initialize() 
	    {
	        var mapOptions = 
	        {
	          center: new google.maps.LatLng(45.378040, 4.811272), 
	          zoom: 12,
	          mapTypeId: google.maps.MapTypeId.HYBRID
	        };
	        var map = new google.maps.Map( document.getElementById("map-canvas"), mapOptions);

	        //pointeurs gymnases
	        /*
	        Gymnase Frédéric MISTRAL, rue Victor Renelle 38550 St Maurice l’Exil
			Gymnase Bacquet, avenue Beyle Stendhal 38150 Roussillon
			Gymnase Joseph Plat, impasse Jean Bouin 38150 Salaise sur Sanne
			Gymnase Pierre Quinon, rue Edouard Aubert 38150 Salaise sur Sanne.
	        */
	        /*var marker1 = new google.maps.Marker(
	        {
	      		position: new google.maps.LatLng(45.396264, 4.780496),
	      		map: map,
	      		title: 'Gymnase Frédéric MISTRAL'
	  		});
	  		google.maps.event.addListener(marker1, 'click', function() 
		    {
		    	new google.maps.InfoWindow(
		    	{
		    		content: '<h5>' + marker1.title + '</h5>'
		  		}).open(map,marker1);
		  	});	

	        var marker2 = new google.maps.Marker(
	        {
	      		position: new google.maps.LatLng(45.365006, 4.806152),
	      		map: map,
	      		title: 'Gymnase BACKET'
	  		});
	  		google.maps.event.addListener(marker2, 'click', function() 
		    {
		    	new google.maps.InfoWindow(
		    	{
		    		content: '<h5>' + marker2.title + '</h5>'
		  		}).open(map,marker2);
		  	});	

	        var marker3 = new google.maps.Marker(
	        {
	      		position: new google.maps.LatLng(45.342242, 4.815425),
	      		map: map,
	      		title: 'Gymnase Joseph PLAT'
	  		});
	  		google.maps.event.addListener(marker3, 'click', function() 
		    {
		    	new google.maps.InfoWindow(
		    	{
		    		content: '<h5>' + marker3.title + '</h5>'
		  		}).open(map,marker3);
		  	});	

	        var marker4 = new google.maps.Marker(
	        {
	      		position: new google.maps.LatLng(45.339812, 4.819527),
	      		map: map,
	      		title: 'Gymnase Pierre QUINON'
	  		});
	  		google.maps.event.addListener(marker4, 'click', function() 
		    {
		    	new google.maps.InfoWindow(
		    	{
		    		content: '<h5>' + marker4.title + '</h5>'
		  		}).open(map,marker4);
		  	});	*/
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	});

</script>
	</body>
</html>