<?php
	include "loader.php";
	include "database.php";

	$db = new database();
	$outr = $db->all_cine();
	$template = $twig->loadTemplate("recherche.html.twig");
	echo $template->render(array("cinemas" => $outr));
?>