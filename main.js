var App = angular.module('App', ['ui.bootstrap'] );

// CONTROLEUR NAVIGATION
App.controller('navControl', function( $scope )
{
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
});

// CONTROLEUR VIEW EQUIPE
App.controller('equipe', function( $scope ) 
{
	$scope.Entraineur = [
		{
			"nom"	: "Edith",
			"poule" : " ",
			"role"	: "Présidente",
			"mail"  : "---", 
			"photo"	: "img/global/personne.png"
		},
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
			"photo" : "img/face/valerie.jpg"
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
			"photo" : "img/face/charlotte.jpg"
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
			"photo" : "img/face/cyrielle.jpg"
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
			"photo" : "img/face/loris.jpg"
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
App.controller('mapi', function( $scope )
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
	$scope.selected = -1;
	$scope.pointeurs = null;
	$scope.posSel = $scope.gymnases[1];

	$scope.select= function(index) {
   		$scope.selected = index; // recupere l'index selectionné

   		// CHANGEMENT DE REPERE

   		$scope.posSel = $scope.gymnases[index];
   		$scope.map.panTo( new google.maps.LatLng( $scope.posSel['lat'], $scope.posSel['lon'], false));
   		$scope.map.setZoom(13);

		if ($scope.pointeur)	// SI POINTEUR EXISTE LE SUPPRIME
		{
			$scope.pointeur.setMap(null);
		}

   		$scope.pointeur = new google.maps.Marker({
   			position 	: new google.maps.LatLng( $scope.posSel['lat'], $scope.posSel['lon']),
      		map 		: $scope.map,
      		Animation 	: google.maps.Animation.BOUNCE, // drop bounce
      		title 		: $scope.posSel['nom']
   		});
		new google.maps.InfoWindow({
				content: '<h5>' + 
							$scope.posSel['nom'] +
					 '</h5>'+
					 '<a href="geo:' +
					  	$scope.posSel['lat'] +
					  	',' +
					  	$scope.posSel['lon'] +
					 '" style="font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif;" title="Uniquement disponnible sous Android"><span class="glyphicon glyphicon-phone"></span>'+ 
					 	$scope.posSel['adr'] +
					 '</a>'

			}).open( $scope.map , $scope.pointeur);
	};

	function initialize() 
    {
        var mapOptions = 
        {
          center: new google.maps.LatLng(45.378040, 4.811272), 
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.HYBRID
        };
        
        $scope.map = new google.maps.Map( document.getElementById("map-canvas"), mapOptions);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
});

App.controller('gestion', function( $scope, $http, $timeout )
{
	$http.get('inc/json.php').success(function(data){
		$scope.list = data;
		$scope.currentPage = 1; //current page
		$scope.entryLimit = 20; //max no of items to display in a page
		$scope.filteredItems = $scope.list.length; //Initially for no filter
		$scope.totalItems = $scope.list.length;
	});
	$scope.setPage = function(pageNo) {
		$scope.currentPage = pageNo;
	};
	$scope.filter = function() {
	$timeout(function() {
		$scope.filteredItems = $scope.filtered.length;
	}, 10);
	};
	$scope.sort_by = function(predicate) {
		$scope.predicate = predicate;
		$scope.reverse = !$scope.reverse;
	};

	//
	$scope.change = function( id ){
		alert("modif" + id);
	};
	$scope.delete = function( id )
	{
		alert("del" + id);
	}
});

App.filter('startFrom', function() {
 return function(input, start) {
 if(input) {
 start = +start; //parse to int
 return input.slice(start);
 }
 return [];
 }
});