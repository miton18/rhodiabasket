<div 	 class="col-lg-12" data-ng-controller="equipe" >
	<div class="row">
		<h2>Membres du bureau:</h2>
		<div class="col-sm-10 col-sm-offset-1">
			<img id="photo_membre" src="img/global/bureau.jpg" title="membres du bureau">
		</div>
	</div>
	<div class="row">
		<h2>Entraineurs:</h2>
	</div>
	<div class="row" id="personnes">
		<div 	  class="col-sm-3 thumbnail" data-ng-repeat="P in Entraineur | orderBy:['poule', 'nom']" id="E">
			<span class="label label-primary">{{ P.role }}</span>
			<img  class="hidden-xs img-circle" alt="photo de l'entraineur" data-ng-src="{{P.photo}}" src="img/global/personne.png" style="min-height: 200px; min-width: 200px;!important" >
			<div  class="caption">
				<aside>
					<p>{{ P.nom  }}</p>
					<p>
						<a data-ng-href="mailto:{{ P.mail }}" >{{ P.mail }}</a>
					</p>
					<p>
						<span class="label label-success"> Equipe: {{ P.poule  }} </span>
					</p>
				</aside>
			</div>
		</div>
	</div>
</div>
