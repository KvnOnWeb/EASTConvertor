<?php

	$xslDoc = new DOMDocument();
	//Import du Fichier de transformation 
	$xslDoc->load( 'convertor.xsl' );

	$xmlDoc = new DOMDocument();
	//Import du Fichier à transormer 
	$xmlDoc->load( 'content.xml' );

	$proc = new XSLTProcessor();
	$proc->importStylesheet( $xslDoc );
	$xmlEast = $proc->transformToXML( $xmlDoc );

	$filename = 'east.xml';

	if (!$file = fopen( $filename, 'w' )) {
		echo "Impossible d'ouvrir le fichier ($filename)";
		exit;
	} else {
		// Ecrivons quelque chose dans notre fichier.
		if (fwrite($file, $xmlEast) === FALSE) {
			echo "Impossible d'écrire dans le fichier ($filename)";
			exit;
		}

		echo "L'écriture de ($somecontent) dans le fichier ($filename) a réussi";

		fclose($file);
	}

?>