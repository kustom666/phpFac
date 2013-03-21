<?php
	include 'loader.php';

	$template = $twig->loadTemplate("upload.html.twig");
	echo $template->render(array());

?>