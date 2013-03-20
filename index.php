<?php
	include 'loader.php';

	$template = $twig->loadTemplate("index.html.twig");
	echo $template->render(array());

?>