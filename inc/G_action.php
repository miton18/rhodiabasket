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
		else if( isset( $_POST['nom'		]) 
		    and  isset( $_POST['prenom'		])
		    and  isset( $_POST['licence'	])
		    and  isset( $_POST['ville'		])
		    and  isset( $_POST['tel'		])
			and  isset( $_POST['mail'		])
			and  isset( $_POST['cat'		])
			and  isset( $_POST['identifiant']) )
		{
			$nom 		= $_POST['nom'			];
			$prenom 	= $_POST['prenom'		];
			$mail 		= $_POST['mail'			];
			$licence 	= $_POST['licence'		];
			$ville 		= $_POST['ville'		];
			$tel 		= $_POST['tel'			];
			$cat 		= $_POST['cat'			];
			$id 		= $_POST['identifiant'	];
			
			if ($id == -1) // CREATION
			{
				 echo 'création';
				 $req = "INSERT INTO `joueur`( `categorie`, `licence`, `nom`, `prenom`, `tel`, `ville`, `mail`) 
				        VALUES ('$cat',	'$licence', '$nom', '$prenom', '$tel', '$ville', '$mail')";
				echo $req;
				Insert($req);

			}
			else // MODIFICATION
			{
				if (D_sql) echo 'modification';
				$Insert("UPDATE table
						 SET nom_colonne_1 = 'nouvelle valeur'
						 WHERE condition");
			}
		}
	}
	if( !D_sql) header("location:../index.php?P=gestion");
?>