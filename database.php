<?php
class database
{
	var $dbh;

	public function __construct(){
	
	}

	public function all_cine()
	{

		try {
	    $dbh = new PDO('pgsql:host=localhost;dbname=fac',"fac", "fac",array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		$rarr = [];

		try{
      		$outh = $dbh->prepare("SELECT * FROM cinema");
      		if($outh->execute())
      		{
	      		while($row = $outh->fetch()){
	      			$rarr[] = $row;
	      		}
      		}

      	}catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
		}

		return $rarr;
	}

	public function all_ville()
	{
		try {
	    $dbh = new PDO('pgsql:host=localhost;dbname=fac',"fac", "fac",array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		$rarr = [];

		try{
      		$outh = $dbh->prepare("SELECT * FROM ville");
      		if($outh->execute())
      		{
	      		while($row = $outh->fetch()){
	      			$rarr[] = $row;
	      		}
      		}

      	}catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
		}

		return $rarr;
	}

	public function ville($nom){
		try {
	    $dbh = new PDO('pgsql:host=localhost;dbname=fac',"fac", "fac",array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		$rarr = [];

		try{
      		$outh = $dbh->prepare("SELECT * FROM ville where nom = ?");
      		if($outh->execute(array($nom)))
      		{
	      		while($row = $outh->fetch()){
	      			$rarr[] = $row;
	      		}
      		}

      	}catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
		}

		return $rarr;
	}

	public function ville_par_code($code){
		try {
	    $dbh = new PDO('pgsql:host=localhost;dbname=fac',"fac", "fac",array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		$rarr = [];

		try{
      		$outh = $dbh->prepare("SELECT * FROM ville where code = ?");
      		if($outh->execute(array($code)))
      		{
	      		while($row = $outh->fetch()){
	      			$rarr[] = $row;
	      		}
      		}

      	}catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
		}

		return $rarr;
	}

	public function cinema_to_ville($code)
	{
		try {
	    $dbh = new PDO('pgsql:host=localhost;dbname=fac',"fac", "fac",array(PDO::ATTR_PERSISTENT => true));
		} catch (PDOException $e) {
		    print "Erreur !: " . $e->getMessage() . "<br/>";
		    die();
		}

		$rarr = [];

		try{
      		$outh = $dbh->prepare("SELECT * FROM cinema where code_ville = ?");
      		if($outh->execute(array($code)))
      		{
	      		while($row = $outh->fetch()){
	      			$rarr[] = $row;
	      		}
      		}

      	}catch (Exception $e) {
			echo "Failed: " . $e->getMessage();
		}

		return $rarr;
	}
}
	

?>