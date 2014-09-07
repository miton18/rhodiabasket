<?php
	require_once( "bdd.php" );
	$datas = Select( "SELECT * from joueur" );
	echo json_encode($datas);
?>