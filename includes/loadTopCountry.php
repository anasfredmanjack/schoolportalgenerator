<?php	
       include ('../controller/config/config.php');
	   
	    $sql = ("SELECT * FROM `countries`");
		$result = mysqli_query($link, $sql);
		$count = mysqli_num_rows($result);
		$json_array = array();
		
		while($row = mysqli_fetch_assoc($result)) {
			$json_array[] = $row;
		}
		
		echo json_encode ($json_array);
		
		
		
		/*echo '<pre>';
		 print_r($json_array);
		echo '</pre>';*/
		
		
	?>				  