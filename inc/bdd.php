<?php
	require_once('inc/config.php');
	error_reporting(E_ALL);
	$rep = array();

	//  PERMET DE FAIRE DES REQUETTES DE TYPE "SELECT" DANS LA BASE DE DONNÉE
	function Select( $string )
	{
		try
		{
			if( D_sql ) echo "<code>$string</code>";
			// On se connecte à MySQL
			$db  = new PDO('mysql:host=' . host . ';dbname='. dbname, userdb, passwd, array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			$tmp = $db->query( $string );

			if($tmp != FALSE)
			{
				$rep = $tmp->fetchAll() ;
				if(D_sql) print_r( $rep ); 		//DEBUG
			}
			$db  = NULL;
			return ( isset($rep) ) ? json_encode( $rep ) : False;
		}
		catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
			echo 	('Impossible de se connecter à la base de donnée!');
	        die 	('Erreur : '.$e->getMessage() );
		}
	}

	//  PERMET DE FAIRE DES REQUETTES DE TYPE "INSERT" "UPDATE" OU "DELETE" DANS LA BASE DE DONNÉE
	function Ins( $string )
	{
		try
		{	
			if( D_sql ) echo "<code>$string</code>";
			// On se connecte à MySQL
			$db = 	new PDO('mysql:host=' . host . ';dbname='. dbname, userdb, passwd);
			$nb = 	$db->exec( utf8_decode( $string ) );
			return 	$db->lastInsertId();
		}
		catch( Exception $e )
		{
			// En cas d'erreur, on affiche un message et on arrête tout
			echo('Impossible de se connecter à la base de donnée!');
	        die ('Erreur : '.$e->getMessage());
		}
	}


?>