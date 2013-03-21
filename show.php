<?php

function show($file)
{
	$row = 1;
	if (($handle = fopen($file
		, "r")) !== FALSE) {
		echo "<table border=\"1\">";
		
	    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
	    	echo "<tr>";
	        $num = count($data);
	        $row++;
	        for ($c=0; $c < $num; $c++) {
	            echo "<td>".$data[$c]."</td>";
	        }
	        echo "</tr>";
	    }
	    fclose($handle);
	    echo "</table>";
	}
}
?>