<?php
require 'connections.php'; 

echo $id = $_GET['id'];

//die();

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["attache_file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["update"])) {

  if (move_uploaded_file($_FILES["attache_file"]["tmp_name"], $target_file)) {
    //    echo "<center><i><h4>The file ". basename( $_FILES["attache_file"]["name"]). " has been uploaded.</h4></i></center>";
    } else {
        echo "<center>Sorry, there was an error uploading your file.</font></center>";
    }
}

$task_name = $_POST['task_name'];
$t_current_date = $_POST['t_current_date'];
$descriptions = $_POST['descriptions'];
$task_type = $_POST['task_type'];
$client_name = $_POST['client_name'];
$response = $_POST['response'];
$priority_type = $_POST['priority_type'];
$due_date = $_POST['due_date'];
$hours_spend = $_POST['hours_spend'];
$status = $_POST['status'];
$aaa = date("Y-m-d");


$sql = "SELECT task_name FROM project_info where  task_name ='".$task_name."' and id !='".$id."' ";
$result = $conn->query($sql);

if ($result->num_rows > 0)
 {
    //echo  $name_error = " Sorry... username already taken ";


    //echo '<a href="http://localhost/task/">Back</a>';

     echo ("<script LANGUAGE='JavaScript'>
          window.alert('Already existed');
          window.location.href='http://localhost/task/';
          </script>");

    exit();

} 



$attache_file1 = $_POST['attache_file1'];

$attache_file = $_FILES["attache_file"]["name"];

if( $_FILES["attache_file"]["size"] == 0 )
{
       $sql = "UPDATE project_info SET attache_file='$attache_file1' WHERE id='".$id."'";
       if ($conn->query($sql) === TRUE) {
            echo "no change";
       }
}else{
       $sql = "UPDATE project_info SET attache_file='$attache_file' WHERE id='".$id."'";
       if ($conn->query($sql) === TRUE) {
            echo "no change";
       }

}


$sql = "UPDATE project_info SET task_name='$task_name', t_current_date='$t_current_date',task_type='$task_type',client_name='$client_name',response='$response',priority_type='$priority_type',due_date='$due_date',hours_spend='$hours_spend',lastupdated_on='$aaa' WHERE id='".$id."'";
    

	if ($conn->query($sql) === TRUE) {
//	  echo "New record created successfully";
        $sql1 = "INSERT INTO descriptions (descriptions, project_info_id, status) VALUES ('$descriptions', '$id', '$status')";

        if ($conn->query($sql1) === TRUE ) {


            //header('Location: http://localhost/task/');

            echo ("<script LANGUAGE='JavaScript'>
          window.alert('Data Updated');
          window.location.href='http://localhost/task/';
          </script>");

        }

	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

//}

?>