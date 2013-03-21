<?php
	require_once 'Twig/lib/Twig/Autoloader.php';
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem('templates/');
	$twig = new Twig_Environment($loader);
?>