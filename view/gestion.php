<div>
	<?php
		session_start();

		if ( isset( $_SESSION['login']) and $_SESSION['login'] == true)
		{
			require_once("view/G_panel");
		}
		else
		{
			require_once("view/G_login");
		}
	?>

</div>