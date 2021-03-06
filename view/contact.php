<div data-ng-controller="mapi">
	<div class="row" >
		<div class="col-md-4">
			<div class="list-group">
				<a href="#" class="list-group-item" data-ng-repeat="L in gymnases | orderBy:['nom']" data-ng-click="select($index)" data-ng-class="{ active: $index == selected}" >
					<span class="glyphicon glyphicon-map-marker"></span>
					{{ L.nom }}
				</a>
			</div>
		</div>
		<div class="col-md-4 col-md-offset-3" id="contact-div" >
			<dl class="dl-horizontal">
				<dt>
					<span class="glyphicon glyphicon-envelope"></span> Mail :
				</dt>
				<dd>
					<a 	  href="mailto:rhodiabasket@gmail.com" > rhodiabasket@gmail.com </a><br>
				</dd>
				<dt>
					<span class="glyphicon glyphicon-earphone"></span> Telephone :
				</dt>
				<dd>
					<a    href="tel:0683316739" > 06 83 31 67 39 </a>
				</dd>
			</dl>
		</div>
	</div>
	<h2>Où trouver les gymnases ?</h2>
	<div class="row">
		<div id="map-canvas"></div>
	</div>

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD3q-Imx_JfkqzIiw5mxCYp37uuahnjvY"></script>
</div>
