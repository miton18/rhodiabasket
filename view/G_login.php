<div class="row">
	<div class="col-sm-4 col-sm-offset-4">
		<!--form class="login" method="POST" action="index.php?P=G_log"-->
		<form class="login" method="POST" action="view/G_log.php">
			<div class="login-screen">
				<div class="app-title">
					<h1>Connexion entraineurs</h1>
				</div>

				<div class="login-form">
					<div class="control-group">
						<input type="text" class="login-field" name="user" placeholder="utilisateur" id="login-name">
						<label class="login-field-icon fui-user" for="login-name"></label>
					</div>

					<div class="control-group">
						<input type="password" class="login-field" name="pass" placeholder="mot de passe" id="login-pass">
						<label class="login-field-icon fui-lock" for="login-pass"></label>
					</div>

					<input type="submit" style="width:250px;"class="btn btn-primary btn-large btn-block" value="Connexion">
					<a class="login-link" href="mailto:remi@rcdinfo.fr">contacter l'administrateur</a>
				</div>
			</div>
		</form>
		<?php
			if(isset($_SESSION['login_error']) and $_SESSION['login_error'] = true )
			{
				echo '<div class="login alert alert-danger alert-dismissible" role="alert">
			  		<button type="button" class="close" data-dismiss="alert">
			  			<span aria-hidden="true">&times;</span>
			  			<span class="sr-only">Fermer</span>
			  		</button>
				  <strong>Désolé!</strong> Votre identifiant ou votre mot de passe est incorrect vous pouvez réessayer !
				</div>';
				$_SESSION['login_error'] = null;
			}
		?>
	</div>
</div>
