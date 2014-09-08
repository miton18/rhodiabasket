<?php
	session_start();
	if( isset($_SESSION['login']) and $_SESSION['login'] == true)
	{
		require_once( "bdd.php" );
		
		if( isset( $_GET['del'] ) )
		{
			$temp = (int) $_GET['del'];
			if( $temp != 0 )
			{
				Insert( "DELETE FROM joueur where id='". $temp ."'" );
				echo "ok";
			}
			else
			{
				echo("Une erreur est survenue id=" . $_GET['del'] );
			}
		}
		if( isset( $_GET['edi'] ) )
		{

		}
	}
?>