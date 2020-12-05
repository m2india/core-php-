<?php

require 'connections.php'; 

error_reporting(0);


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["attache_file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {

  if (move_uploaded_file($_FILES["attache_file"]["tmp_name"], $target_file)) {
    //    echo "<center><i><h4>The file ". basename( $_FILES["attache_file"]["name"]). " has been uploaded.</h4></i></center>";
    } else {
        echo "<center>Sorry, there was an error uploading your file.</font></center>";
    }
}

$task_name = $_POST['task_name']; //die();
$t_current_date = $_POST['t_current_date'];
$descriptions = $_POST['descriptions'];
$task_type = $_POST['task_type'];
$client_name = $_POST['client_name'];
$response = $_POST['response'];
$priority_type = $_POST['priority_type'];
$due_date = $_POST['due_date'];
$attache_file = $_FILES["attache_file"]["name"];
$hours_spend = $_POST['hours_spend'];
$status = $_POST['status'];


$sql = "SELECT task_name FROM project_info where  task_name ='".$task_name."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0)
 {
  //	echo  $name_error = " Sorry... username already taken ";


	//echo '<a href="http://localhost/task/">Back</a>';

	echo ("<script LANGUAGE='JavaScript'>
          window.alert('Already existed');
          window.location.href='http://localhost/task/';
          </script>");

  	exit();

} 	  



 	$sql = "INSERT INTO project_info (task_name, t_current_date,task_type,client_name,response,priority_type,due_date,attache_file,hours_spend) VALUES ('$task_name', '$t_current_date', '$task_type','$client_name','$response','$priority_type','$due_date','$attache_file','$hours_spend')";

 	   

 	// $last_id = mysqli_insert_id($conn);
	


	if ($conn->query($sql) === TRUE ) {

		$last_id = $conn->insert_id;

		$sql1 = "INSERT INTO descriptions (descriptions, project_info_id, status) VALUES ('$descriptions', '$last_id', '$status')";

		if ($conn->query($sql1) === TRUE ) {

		//	header('Location: http://localhost/task/');

			echo ("<script LANGUAGE='JavaScript'>
          window.alert('Data inserted');
          window.location.href='http://localhost/task/';
          </script>");
		}


	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}








//}

?>