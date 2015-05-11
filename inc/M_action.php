<?php
	session_start();
	if( isset($_SESSION['login']) and $_SESSION['login'] == true)  // SI l'utilisateur  est connécté
	{
		require_once( "bdd.php" );

		if( !empty( $_POST['match_action']) && $_POST['match_action']) //
		{
			$identifiant 	= ( !empty($_POST['identifiant']))	? $_POST['identifiant'] : null;
			$nom_v 			= ( !empty($_POST['nom_v']))		? $_POST['nom_v'] 		: null;
			$lieux			= ( !empty($_POST['lieux']))		? $_POST['lieux'] 		: null;
			$score_v		= ( !empty($_POST['score_v']))		? $_POST['score_v'] 	: null;
			$score_l		= ( !empty($_POST['score_l']))		? $_POST['score_l']		: null;
			$date			= ( !empty($_POST['date']))			? $_POST['date']		: null;
			$categorie		= ( !empty($_POST['categorie']))	? $_POST['categorie']	: null;

			switch ( $_POST['match_action'] )
			{
				case 'add':
					add();
					break;
				case 'del':
					del;
					break;
				case 'edit':
					edit();
					break;
				case 'listAll':
					listAll();
					break;
			}
		}
	}
	function add()
	{
		Insert("INSERT INTO match (identifiant, nom_v, lieux, score_v, score_l, date, categorie)
				VALUES ('$identifiant', '$nom_v', '$lieux', '$score_v', '$score_l', '$date', '$categorie')");
	}
	function edit()
	{
		$id	= $_POST['id'];

		Insert("UDATE match
				SET identifiant='$identifiant', nom_v='$nom_v', lieux='$lieux', score_v='$score_v', score_l='$score_l', date='$date', categorie=$categorie
				WHERE id=$id");
	}
	function del()
	{
		$id 	= $_POST['id'];
		$test 	= Select("SELECT id FROM match WHERE id=$id");
		if( !empty( $test[0][0] ) )
		{
			Insert("DELETE FROM match WHERE id=$id ");
		}
	}
	function listAll() {

		header('Content-Type: application/json');
		//$date = date_create('2000-01-01');
		$req = Select("SELECT * from `match` ORDER BY date");
		echo json_encode( $req );
	}

?>
