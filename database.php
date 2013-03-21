<?php

	try {
	    $dbh = new PDO('pgsql:host=localhost;dbname=fac',"fac", "fac",array(PDO::ATTR_PERSISTENT => true));
	} catch (PDOException $e) {
	    print "Erreur !: " . $e->getMessage() . "<br/>";
	    die();
	}	

?>