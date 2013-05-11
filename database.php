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
}
	

?>