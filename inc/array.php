<?php
	
	session_start();
	if( isset($_SESSION['login']) and $_SESSION['login'] == true)
	{
		require_once( "bdd.php" );
		$licencies = Select( "SELECT * from joueur ORDER BY categorie, nom" );
	}
?>