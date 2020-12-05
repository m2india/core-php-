<?php
   require 'connections.php'; 
//    error_reporting(0);
     
    // Fetch all the country data 
//    $id = $_GET['id'];

    $id = $_POST["id"];

    $query = "SELECT * FROM project_name where client_id = '".$id."' "; 
    $result = $conn->query($query); 

    // echo "<select>";
    //     foreach($result as $value){
    //         echo "<option>". $value . "</option>";
    //     }
    //     echo "</select>";

    while($row = $result->fetch_assoc()){  
	    echo '<option value="'.$row['id'].'">'.$row['project_name'].'</option>'; 
	//  echo json_encode($result);
	//	    return;
	}

//	return $result;

 //   print_r($aaa);

// $conn->close(); 





?>