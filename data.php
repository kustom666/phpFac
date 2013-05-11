<?php
	include "loader.php";
	include "database.php";

	$db = new database();
	$outr = $db->all_cine();
	$outv = $db->all_ville();
	$template = $twig->loadTemplate("data.html.twig");
	echo $template->render(array("cinemas" => $outr, "villes" => $outv));
?>