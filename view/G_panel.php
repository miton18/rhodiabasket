<div data-ng-controller="gestion">
	<div 		  class="row" style="padding-top: 20px; padding-left: 20px; margin-right: 20px;">
		<a 		  class="btn btn-sm btn-danger"		href="index.php?P=G_log&amp;action=logout" >
			<span class="glyphicon glyphicon-off"></span> Déconnexion
		</a>
		<a 			class="btn btn-sm btn-success"	href="#modal-change" ng-click="create()" data-toggle="modal" >
			<span 	class="glyphicon glyphicon-plus-sign"></span> Ajout de licencié
		</a>
		<button 	class="btn btn-warning" ng-click="refresh_photos()">
			<span 	class="glyphicon glyphicon-camera"></span> Recharger la galerie de photos
		</button>
		<a 			class="btn btn-primary btn-sm" href="inc/resume.xls.php"><i class="icon-white icon-hdd"></i> Télécharger au format EXCEL</a>
		<a 			class="btn btn-primary btn-sm" href="index.php?P=G_match"><i class="glyphicon glyphicon-book"></i> Gestion des matches</a>
	</div>
	<hr>
	<div>
		<div 		class="row" >
			<div 	class="col-md-3">
		    	<label for="catInput">Catégorie</label>
		    	<select class="form-control" name="catInput" ng-model="filter_categorie" >
					<option value="" selected>Tous</option>
					<option ng-repeat="cat in cats">{{cat.nom}}</option>
				</select>
		    </div>
		    <div class="col-md-3 col-md-offset-1">
		    	<label>Recherche précise:</label>
		        <input class="form-control" type="text" ng-model="search" ng-change="filter()" placeholder="Nom, Prenom, Tel, Ville" />
		    </div>
		    <div class="col-md-4 ">
		        <h5><b>{{ filtered.length }}</b> joueurs affiché sur <b>{{ totalItems }}</b> au total</h5>
		    </div>
		</div>
		<br/>
		<div 		class="row">
		    <div 	class="col-md-12" ng-show="filteredItems > 0" style="padding-right: 30px;">
		        <table class="table table-striped table-bordered">
		        <thead>
			        <th>Catégorie&nbsp;<a 	ng-click="sort_by('categorie');">
			        	<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></a></th>
			        <th>nom&nbsp;<a 		ng-click="sort_by('licence');">
			        	<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></a></th>
			        <th>Prénom&nbsp;<a 		ng-click="sort_by('nom');">
			        	<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></a></th>
			        <th>Licence&nbsp;<a 	ng-click="sort_by('prenom');">
			        	<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></a></th>
			        <th>Telephone&nbsp;<a 	ng-click="sort_by('tel');">
			        	<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></a></th>
			        <th>Ville&nbsp;<a 		ng-click="sort_by('ville');">
			        	<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></a></th>
			        <th>E-Mail&nbsp;<a 		ng-click="sort_by('mail');">
			        	<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i></a></th>
		        </thead>
		        <tbody>
		            <tr ng-repeat="data in filtered = (list | filter:{categorie: filter_categorie} | filter:search | orderBy : predicate :reverse) ">
		                <td>{{data.categorie}}</td>
		                <td>{{data.nom}}</td>
		                <td>{{data.prenom}}</td>
		                <td>{{data.licence}}</td>
		                <td>0{{data.tel}}</td>
		                <td>{{data.ville}}</td>
		                <td ng-init="data.index = $index">{{data.mail}}</td>
		                <td>
							<div 		class="btn-group">
								<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
							    	Action <span class="caret"></span>
								</button>
								<ul 	class="dropdown-menu" role="menu" style="left: -120%;">
									<li>
										<a href="#modal-change" ng-click="change( data.index )" data-toggle="modal" >
											Modifier
										</a>
									</li>
									<li class="divider"></li>
									<li>
										<a ng-click="delete( data.ID )" >
											Supprimer
										</a>
									</li>
								</ul>
							</div>
		                </td>
		            </tr>
		        </tbody>
		        </table>
		    </div>
		    <div class="col-md-12" ng-show="filteredItems == 0">
		        <div class="col-md-12">
		            <h4>Aucune personne trouvée</h4>
		        </div>
		    </div>
		</div>
	</div>
	<!-- FORMULAIRE LIGHTBOX -->
	<div class="modal fade" id="modal-change" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="inc/G_action.php" class="form-horizontal">
					<div class="modal-header">
	                    <div class="modal-header">
	                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
							<h1 class="modal-title">{{action}} d'un licencié</h1>
						</div>
						<div class="modal-body">
							<div class="col-sm-6 col-sm-offset-3" style="float: none;">
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Nom</div>
								    	<input required name="nom"
								    		   class="form-control"
								    		   type="text"
								    		   value="{{modNom}}">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Prénom</div>
								    	<input required name="prenom"
								    		   class="form-control"
								    		   type="text"
								    		   value="{{modPre}}">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">N° Licence</div>
								    	<input required name="licence"
								    		   class="form-control"
								    		   type="text"
								    		   value="{{modLic}}">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Ville</div>
								    	<input required name="ville"
								    		   class="form-control"
								    		   type="text"
								    		   value="{{modVil}}">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Téléphone</div>
								    	<input required name="tel"
								    		   class="form-control"
								    		   type="tel"
								    		   value="{{modTel}}"
								    		   pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">@ E-Mail</div>
								    	<input required name="mail"
								    		   class="form-control"
								    		   type="email"
								    		   value="{{modMai}}">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Catégorie</div>
										<select required name="cat" class="form-control input-xlarge">
											<option ng-value="{{modcat}}" selected>{{modCat}}</option>
											<option ng-repeat="cat in cats">{{cat.nom}}</option>
										</select>
									</div>
								</div>
								<input type="hidden" name="identifiant" ng-value="modId">
								<div class="btn-group btn-group-justified">
									<div class="btn-group">
								    	<input type="submit" class="btn btn-success" value="Valider"/>
									</div>
									<div class="btn-group">
										<button data-dismiss="modal" aria-hidden="true" class="btn btn-danger">Annuler</button>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							* Les modifications ne seront éfféctives que lorque vous appuirez sur "Valider"
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

