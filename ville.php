<?php
	include "loader.php";
	include "database.php";

	$ville = $_GET["ville"];
	$db = new database();
	$outv = $db->ville($ville);
	$template = $twig->loadTemplate("ville.html.twig");
	echo $template->render(array("villes" => $outv));
?>