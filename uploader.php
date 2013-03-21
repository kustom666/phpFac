<?php


class uploader
{
	function __construct($files){
		include "loader.php";
		include "database.php";
		
		if($files["file"]["type"] == "text/csv"){
			if ($files["file"]["error"] > 0)
		    {
		    	$template = $twig->loadTemplate("message.html.twig");
				echo $template->render(array("message" => $files["file"]["error"]));
		    }
		    else
			{
			    if (file_exists("data/" . $files["file"]["name"]))
			    {
			      	$template = $twig->loadTemplate("message.html.twig");
					echo $template->render(array("message" => "le fichier existe déjà"));
			    }
			    else
			    {
			      	move_uploaded_file($files["file"]["tmp_name"],"data/" . $files["file"]["name"]);
			      	try{
			      		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  						$dbh->beginTransaction();
			      		$dbh->exec("INSERT INTO files(name, folder,id) VALUES ('".$files["file"]["name"]."', 'data/', nextval('files_id_seq'))");
			      		$dbh->commit();
			      	}catch (Exception $e) {
						$dbh->rollBack();
						echo "Failed: " . $e->getMessage();
					}
			      	$template = $twig->loadTemplate("message.html.twig");
					echo $template->render(array("message" => "Fichier envoyé!"));
			    }
		    }
		}
		else
		{
			$template = $twig->loadTemplate("message.html.twig");
			echo $template->render(array("message" => "Erreur : type de fichier non pris en charge"));
		}
	}
}


?>