<?php
	
	include "connect.php";

	// show();

	function calculateDate($setDate){
		$h = 2;
		$i = 1;
		$j = 'on';

		while ($j != 'off') {
			$newSetDate = strtotime ( '+'.$i.' day' , strtotime ( $setDate ) ) ;
			$newSetDate = date ( 'Y-m-j' , $newSetDate );
			if (match($newSetDate) == 1) {
				$i++;
			} else {
				if ($h != 0) {
					$i++;
					$h--;
				} else {
					$j = 'off';
				}
			}
			$newSetDate = strtotime ( '+'.$i.' day' , strtotime ( $setDate ) ) ;
			$newSetDate = date ( 'Y-m-j' , $newSetDate );
			
		}
		return $newSetDate;
	}
	// match($newSetDate);

	// $date = date('Y-m-j');
	// $newdate = strtotime ( '+3 day' , strtotime ( $date ) ) ;
	// $newdate = date ( 'Y-m-j' , $newdate );
	
	// echo "setDate : ".$setDate."</br>";
	// echo "newSetDate : ".$newSetDate."</br>";
	// echo $date."</br>";
	// echo $newdate;

	function match($date){
		$query = mysql_query("SELECT * FROM holyday WHERE holyday = '$date'");
		if (mysql_num_rows($query) == 1) {
			return 1;
		} else {
			return 0;
		}
	}

	function show(){
		$query = mysql_query('SELECT * FROM holyday');

		while ($result = mysql_fetch_array($query)) {
			$holyday = $result['holyday'];
			echo $holyday."</br>";
		}
	}
?>