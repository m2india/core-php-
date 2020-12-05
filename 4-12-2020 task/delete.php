<?php
require 'connections.php'; 

$id = $_GET['id']; 


$sql = "DELETE FROM project_info WHERE id=".$id;

if ($conn->query($sql) === TRUE) {
  // echo "Record deleted successfully";
  // echo "<br/>";
  // echo '<a href="http://localhost/task/">Click Home page</a>';

	echo ("<script LANGUAGE='JavaScript'>
          window.alert('Data Deleted');
          window.location.href='http://localhost/task/';
          </script>");

} else {
  echo "Error deleting record: " . $conn->error;
}


?>