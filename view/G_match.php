<div class="row col-sm-12" style="background-color: white;" data-ng-controller="match_gestion">
	<div class="row">
		<h1>Gestion des matches</h1>
		<a href="index.php?P=gestion" class="btn btn-warning btn-large">
			<i class="icon-arrow-left"></i> Retour à la liste des membres
		</a>
        <a class="btn btn-sm btn-success"	href="#modal-match" ng-click="create()" data-toggle="modal" >
			<span class="glyphicon glyphicon-plus-sign"></span> Ajout de matchs
		</a>
	</div>
	<hr>
	<div class="row">
		<table class="table table-striped table-bordered">
		        <thead>
			        <th>Identifiant&nbsp;
			        	<a ng-click="sort_by('identifiant');">
			        		<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>
			        	</a>
			        </th>
			        <th>Date&nbsp;
			        	<a 	ng-click="sort_by('date');">
			        		<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>
			        	</a>
			        </th>
			        <th>Catégorie&nbsp;
			        	<a 		ng-click="sort_by('categorie');">
			        		<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>
			        	</a>
			        </th>
			        <th>Lieux&nbsp;
			        	<a 	ng-click="sort_by('lieux');">
			        		<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>
			        	</a>
			        </th>
			        <th>Nom visiteurs&nbsp;
			        	<a ng-click="sort_by('nom_v');">
			        		<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>
			        	</a>
			        </th>
			        <th>Score Rhodia&nbsp;
			        	<a 		ng-click="sort_by('score_l');">
			        		<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>
			        	</a>
			        </th>
			        <th>Score visiteur&nbsp;
			        	<a 		ng-click="sort_by('score_v');">
			        		<i class="glyphicon glyphicon-sort-by-alphabet-alt"></i>
			        	</a>
			        </th>
			        <th>Action</th>
		        </thead>
		        <tbody>
		            <tr ng-repeat="match in matchs">
		            	<td ng-bind="match.identifiant"></td>
		            	<td ng-bind="(match.date) | date:'dd-MM-yyyy   HH:mm' "></td>
						<td ng-bind="match.categorie"></td>
						<td ng-bind="match.lieux"></td>
						<td ng-bind="match.nom_v"></td>
						<td ng-bind="match.score_l"></td>
						<td ng-bind="match.score_v"></td>
						<td>
							<div class="btn-group">
								<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
							    	Action <span class="caret"></span>
								</button>
								<ul class="dropdown-menu" role="menu" style="left: -120%;">
									<li>
										<a href="#modalForm" ng-click="change( $index )" data-toggle="modal" >Modifier</a>
									</li>
									<li class="divider"></li>
									<li>
										<a ng-click="delete( $index )" >Supprimer</a>
									</li>
								</ul>
							</div>
		                </td>
					</tr>
				</tbody>
		</table>
	</div>
	<!-- FORMULAIRE LIGHTBOX -->
	<div class="modal fade" id="modal-match" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" ng-submit="saveEdit()" class="form-horizontal">
					<div class="modal-header">
	                    <div class="modal-header">
	                    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
								<span class="glyphicon glyphicon-remove"></span>
							</button>
							<h1 class="modal-title">Edition de matches</h1>
						</div>
						<div class="modal-body">
							<div class="col-sm-8 col-sm-offset-2" style="float: none;">
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Identifiant</div>
								    	<input required name="identifiant"
								    		   class="form-control"
								    		   type="text"
								    		   data-ng-model="editData.identifiant">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">date / heure</div>
										<input type="text" class="form-control" datetime-picker="dd-MM-yyyy HH:mm" ng-model="editData.date" is-open="isOpen"  />
										<span class="input-group-btn">
											<button type="button" class="btn btn-default" ng-click="openCalendar($event, prop)"><i class="glyphicon glyphicon-pencil"></i></button>
										</span>
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Lieux</div>
								    	<input required name="lieux"
								    		   class="form-control"
								    		   type="text"
								    		   data-ng-model="editData.lieux">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Score visiteur</div>
								    	<input required name="score_v"
								    		   class="form-control"
								    		   type="text"
								    		   data-ng-model="editData.score_v">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Score Rhodia</div>
								    	<input required name="score_l"
								    		   class="form-control"
								    		   type="text"
								    		   data-ng-model="editData.score_l">
									</div>
								</div>
								<div class="form-group">
								    <div class="input-group">
								    	<div class="input-group-addon">Nom visiteur</div>
								    	<input required name="nom_v"
								    		   class="form-control"
								    		   type="text"
								    		   data-ng-model="editData.nom_v">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group">
										<div class="input-group-addon">Catégorie</div>
										<select required name="categorie" class="form-control input-xlarge">
											<option selected>{{editData.categorie}}</option>
											<!--option ng-repeat="cat in cats">{{cat.nom}}</option-->
											<option data-ng-repeat="cat in cats">{{ cat.nom }}</option>
										</select>
									</div>
								</div>
								<div class="btn-group btn-group-justified">
									<div class="btn-group">
								    	<input type="submit" class="btn btn-success" value="Valider"/>
									</div>
									<div class="btn-group">
										<button data-dismiss="modal" aria-hidden="true" class="btn btn-danger" ng-click="cancel()">Annuler</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
