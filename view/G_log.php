<?php
	//session_cache_expire(30);
	session_start();


	require_once('../inc/bdd.php');

	if ( !empty ($_POST['user']) and !empty ($_POST['pass']) )
	{
		$_SESSION['login_error'] = true;
		$reponse 				 = Select("SELECT  `password` FROM  `user` WHERE  `login` =  '" . $_POST['user'] . "'");

		//print_r($reponse);
		//echo sha1($_POST['pass']);
		//echo sha1("toor");
		if( isset($reponse[0] ) and sha1($_POST['pass']) == $reponse[0][0] )
		{
			$_SESSION['login']		 = true;
			$_SESSION['login_error'] = false;
			header("location:../index.php?P=G_panel");
		}
		else {
			$_SESSION['login'] 		 = false;
			header("location:../index.php?P=gestion");
		}
	}
	if(isset( $_GET['action'] ) and $_GET['action'] == "logout")
	{
		session_destroy();
	}

	header("location:../index.php?P=gestion");
?>
