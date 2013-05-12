<?php
	include "loader.php";
	include "database.php";

	if(!empty($_GET["ville"])){
		$ville = $_GET["ville"];
		$db = new database();
		$outv = $db->ville($ville);
	}
	else
	{
		$code = $_GET["code"];
		$db = new database();
		$outv = $db->ville_par_code($code);
	}
	$outc = $db->cinema_to_ville($outv[0]["code"]);

	$nom_ville = $outv[0]["nom"];

	$loc_json = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($nom_ville).",France&sensor=false");
	
    $locec = json_decode($loc_json,true);
	$lat = $locec["results"][0]["geometry"]["location"]["lat"];
	$lon = $locec["results"][0]["geometry"]["location"]["lng"];

	$template = $twig->loadTemplate("ville.html.twig");
	echo $template->render(array("villes" => $outv, "cinemas" => $outc, "lat" => $lat, "lon" => $lon));
?>