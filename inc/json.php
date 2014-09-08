<?php
	session_start();
	if( isset($_SESSION['login']) and $_SESSION['login'] == true)
	{
		require_once( "bdd.php" );
		echo json_encode( Select( "SELECT * from joueur" ) );
	}
?>