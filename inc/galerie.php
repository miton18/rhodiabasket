<?php
 /* ouverture du repertoire courant */
  $photos = array();
  $SD 		= scandir("../img/photo");
  $i      = 0 ;
  $nb     = 0;

  array_shift($SD);
  array_shift($SD);

  foreach ($SD as $k) 
  {
	$photos[$i] = utf8_encode($k);
	$i ++;
  }
    //echo "$entree<br>";

  //print_r($photos);

 /* fermeture du repertoire repere par $pointeur */

  $fp 		= fopen('galerie_json.php', 'w');
  $chaine 	= "";
  fwrite( $fp, utf8_encode("[") );

  foreach ($SD as $key => $val) 
  {
  	$chaine .= '{ "nom" : "'. $val .'"},' ;
    $nb ++;
  }

  $chaine = substr( $chaine, 0, strlen( $chaine ) - 1 );
  fwrite( $fp, utf8_encode($chaine) );

  fwrite( $fp, utf8_encode("]") );

  fclose( $fp );

  echo( "l'import c'est bien passé: \n Nombre de photos traitées: " . $nb );
?>