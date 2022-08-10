<?php	
       include ('../controller/config/config.php');
	   
	   $selectedStateID = trim($_POST['selectedStateID']);
	   
	    $sql = ("SELECT * FROM `cities` WHERE StateID='$selectedStateID'");
		$result = mysqli_query($link, $sql);
		$json_array = array();
		
		while($row = mysqli_fetch_assoc($result)) {
			$json_array[] = $row;
		}
		
		echo json_encode ($json_array);
		
		
		
		/*echo '<pre>';
		 print_r($json_array);
		echo '</pre>';*/
		
		
	?>				  