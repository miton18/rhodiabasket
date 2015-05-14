var App = angular.module('App', ['ui.bootstrap', 'ui.bootstrap.datetimepicker'] );


var Cats = [
		{ "nom" : "poussins"			},
		{ "nom" : "poussines"			},
		{ "nom" : "benjamins"			},
		{ "nom" : "benjamines"			},
		{ "nom" : "cadets"				},
		{ "nom" : "cadettes"			},
		{ "nom" : "minimes (garcon)"	},
		{ "nom" : "minimes (fille)"		},
		{ "nom" : "seniors (garcon)"	},
		{ "nom" : "seniors (fille)"		},
		{ "nom" : "dirigeant"			}
	];


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
			"nom"	: "Christelle",
			"poule" : "cadettes",
			"mail"  : "---",
			"role"  : "Entraineur",
			"photo"	: "img/face/christelle.jpg"
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
			"photo" : "img/face/anthony.jpg"
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
			"photo" : "img/face/malik.jpg"
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

// CONTROLLER VIEW PHOTOS
App.controller('galerie', function( $scope, $http, $animate, $modal)
{
	$scope.myInterval 			= 3000;
	$scope.nb_photos 			= 0;
	$scope.photo_current 		= 0;
	var slides = $scope.slides 	= [];

	$http(
	    {method: 'GET', url: 'inc/galerie_json.php', dataType: "json" })
		.success( function( data ) 
		{
	    	$scope.photos 	 = data;

			$scope.nb_photos =  $scope.photos.length;

			angular.forEach($scope.photos, function(value, key) {
  				console.log(key + ': ' + value['nom']);
  				$scope.addSlide( "img/photo/" + value['nom'] );
			});
		})
		.error(function(data, status, headers, config) 
	  	{
	  		alert('error' + status);
	    	// called asynchronously if an error occurs
	    	// or server returns response with an error status.
		});

	$scope.addSlide = function( img_name ) {
	    var newWidth = 600 + slides.length;
	    slides.push({
	    	image: img_name,
	    	text: img_name
	    });
	};

	$scope.$watch(function () {
	  for (var i = 0; i < slides.length; i++) {
	    if (slides[i].active) {
	      return slides[i];
	    }
	  }
	}, function (currentSlide, previousSlide) {
	  if (currentSlide !== previousSlide) {
	    console.log('currentSlide:', currentSlide);
	    $scope.current_img = currentSlide.text;
	    //alert($scope.current_img );
	  }
	});

	$scope.keep_photo = function ( str )
	{
		$scope.photo_current = str;
	};
});

// CONTROLEUR VIEW CONTACT
App.controller('mapi', function( $scope )
{
	$scope.gymnases = [
		{
			"nom": " Gymnase Bacquet",
			"adr": "rue Victor Renelle 38550 St Maurice l’Exil",
			"lat": "45.396264",
			"lon": "4.780496"
		},
		{
			"nom": " Gymnase Frédéric MISTRAL",
			"adr": "avenue Beyle Stendhal 38150 Roussillon",
			"lat": "45.365006",
			"lon": "4.806152"
		},
		{
			"nom": " Gymnase Joseph Plat",
			"adr": "impasse Jean Bouin 38150 Salaise sur Sanne",
			"lat": "45.342242",
			"lon": "4.815425"
		},
		{
			"nom": " Gymnase Pierre Quinon",
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
					 '</a>',
				maxWidth: "200"

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

// CONTROLLER VIEW GESTION MEMBRES
App.controller('gestion', function( $rootScope, $scope, $http, $timeout )
{
	function loadData(){
		$http.get('inc/json.php').success( function(data){
			$scope.list 			= data;
			$scope.currentPage 		= 1; //current page
			$scope.entryLimit 		= 5; //max no of items to display in a page
			$scope.filteredItems 	= $scope.list.length; //Initially for no filter
			$scope.totalItems 		= $scope.list.length;
		});
	}
	loadData(); // initialise les données
	$scope.cats = Cats;

	$scope.setPage = function(pageNo) {
		$scope.currentPage = pageNo;
	};
	$scope.filter = function() {
		$timeout(function() {
			$scope.filteredItems = $scope.filtered.length;
		}, 1);
	 };
	 $scope.sort_by = function(predicate) {
	 	$scope.predicate = predicate;
	 	$scope.reverse = !$scope.reverse;
	};
	//
	$scope.change = function( id ){
		$scope.modCat = ($scope.list[ id ])[ 'categorie'];
		$scope.modNom = ($scope.list[ id ])[ 'nom'		];
		$scope.modPre = ($scope.list[ id ])[ 'prenom'	];
		$scope.modLic = ($scope.list[ id ])[ 'licence'	];
		$scope.modTel = ($scope.list[ id ])[ 'tel'		];
		$scope.modVil = ($scope.list[ id ])[ 'ville'	];
		$scope.modMai = ($scope.list[ id ])[ 'mail'		];
		$scope.modId  = ($scope.list[ id ])[ 'ID'		];
		$scope.action = "Modification";
	};
	$scope.create = function(){
		$scope.modCat = "";
		$scope.modNom = "";
		$scope.modPre = "";
		$scope.modLic = "";
		$scope.modTel = "";
		$scope.modVil = "";
		$scope.modMai = "";
		$scope.modId  = "-1";
		$scope.action = "Création";
	};
	$scope.delete = function( id )
	{
		$http.get('inc/G_action.php?del=' + id )
		.success( function(result)
		{
			alert('La personne a bien été supprimé de la liste');
			loadData();
		})
		.error(function()
		{
			alert('une erreur est survenue sur l\'action demandée.');
		});
	}

	$scope.refresh_photos = function()
	{
		$http.get('inc/galerie.php').success( function(data){
			$scope.message 			= data;
			alert(data);
		})
		.error( function()
		{
			console.log("erreur de rechargement de la galerie");
		});
	}
});


App.controller('match_gestion', function( $rootScope, $scope, $http ){

	$scope.cats = Cats;
	console.log($scope.cats );

	loadData();

	$scope.change = function ( index )
	{
		console.info( "change: " + $scope.matchs[ index ].id ); // LOG
		$scope.editData = $scope.matchs[index];
		var date = new Date( $scope.editData.date );
		/*$scope.editData.jour  = date.getDay() + "-" + date.getMonth() + "-" + date.getFullYear();
		$scope.editData.heure = date.getHours() + ":" + date.getMinutes();*/
	}
	$scope.delete = function ( index )
	{
		var r = confirm("Etes vous sur de vouloir supprimer ce match?");
		if( r == true)
		{
			console.info( "delete: " + $scope.matchs[ index ].id );
			$http({
				url: 'inc/M_action.php',
				method: "POST",
				headers: {'Content-Type': 'application/x-www-form-urlencoded'},
				data: $.param({match_action : 'del'})
			})
			.success(function(response) {

			}).error(function(response) { // optional

			});
		}
	}

	$scope.saveEdit = function() {

	}
	$scope.cancel = function() {

	}
	function loadData() {
		$http({
			url: 'inc/M_action.php',
			method: "POST",
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			data: $.param({match_action : 'listAll'})
		})
		.success(function(response) {
				$scope.matchs = response;
				 angular.forEach( $scope.matchs, function(val, key) {
        			val.date = new Date( val.date );
    			});
				console.log( $scope.matchs );
		},
		function(response) { // optional
				console.error(response);
		});
	}


	$scope.isOpen = false;

    $scope.openCalendar = function(e) {
        e.preventDefault();
        e.stopPropagation();

        $scope.isOpen = true;
    }
});


App.filter('startFrom', function() {
	return function(input, start) 
	{
 		if(input) {
 			start = +start; //parse to int
 			return input.slice(start);
 		}
 		return [];
 	}
});

App.filter('extensionLess', function () {
        return function (text, start, end) {
                return String(text).substring( start , text.length - end); // 10 pour le chemin et 3 pour l'extension
        }
});
