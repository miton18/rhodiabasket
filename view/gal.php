<div ng-controller="galerie">
    <div class="row jumbotron">
        <div class="col-lg-6">
            <carousel interval="myInterval" >
                <slide ng-repeat="slide in slides" active="slide.active" on-change="alert(current-index)">
                    <img ng-src="{{slide.image}}" style="margin:auto; overflow: hidden" ng-click="update_photo($index)">
                </slide>
            </carousel>
        </div>
        <div class="col-sm-6">
            <h3 ng-bind="current_img | extensionLess:10:3"></h3>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-sm-4" ng-repeat="photo in photos" >
            <div class="thumbnail">
                <img ng-src="img/photo/{{photo.nom}}" style="width: 294px; height: 193px; " alt="...">
                <div class="caption">
                    <p style="height: 40px;" >{{photo.nom}}</p>
                    <p>
                        <a href="#modal-show" data-toggle="modal" ng-click="keep_photo(photo.nom)" class="btn btn-sm btn-success">
                            <span class="glyphicon glyphicon-fullscreen"></span> Agrandir
                        </a>
                    </p>
                </div>
            </div>
            <!-- FORMULAIRE LIGHTBOX -->
            <div class="modal fade" id="modal-show" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            <h3 class="modal-title text-center">"{{ photo_current | extensionLess:0:3 }}"</h3>
                        </div>
                        <div class="modal-body">
                            <img style="width: 100%;" ng-src="img/photo/{{ photo_current }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
