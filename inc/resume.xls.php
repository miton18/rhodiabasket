<?php
	// référence à la bibliothèque de fonctions
	require_once 'Classes/PHPExcel.php';
	require_once 'Classes/PHPExcel/IOFactory.php';
	require_once('array.php');
			
	$filename = "Liste_licenciés_au_" . date("d/m/Y");
	// création des objets de base et initialisation des informations d'entête
	$classeur = new PHPExcel;
	$classeur->getProperties()->setCreator("www.rhodiabasket.fr");
	$classeur->setActiveSheetIndex(0);
	$feuille=$classeur->getActiveSheet();
	// ajout des données dans la feuille de calcul


	$feuille->setTitle('Liste des licenciers');
	$feuille->setCellValueByColumnAndRow(0, 1, 'Liste de tous les licenciés');
	//$feuille->SetCellValue('A2', 'Il est aussi possible d\'utiliser la notation LettreChiffre (ex : A2)');

	$y=0;
	foreach ($licencies[0] as $key => $value) 
	{
		if ( intval($key) == 0 )
		{
			$feuille->setCellValueByColumnAndRow( $y, 4, $key );
			$y++;
		}
	}

	$i=5;
	foreach ($licencies as $k => $v) 
	{
		$j=2;
		foreach ($v as $key => $value) 
		{
			if ( intval($key) != 0 )
			{
				$feuille->setCellValueByColumnAndRow($j, $i, $value );
				$j += 1;
			}
		}
		$i ++;
	}

	// envoi du fichier au navigateur
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
	header('Content-Disposition: attachment;filename="' . $filename . '"'); 
	header('Cache-Control: max-age=0'); 
	$writer = PHPExcel_IOFactory::createWriter($classeur, 'Excel2007'); 
	$writer->save('php://output');
?>