<?php 
    // Include the database config file 
    require 'connections.php'; 

//    error_reporting(0);
     
    // Fetch all the country data 
    $query = "SELECT project_info.id,project_info.task_name,client_name.client_name, project_info.t_current_date FROM project_info JOIN client_name ON project_info.client_name=client_name.c_id  "; 
    $result = $conn->query($query);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<title></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Client Form</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Add<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="view.php">View</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="history.php">History</a>
      </li>
    </ul>
  </div>
</nav>


<div class="container-sm">
	<table class="table">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Task Name</th>
      <th scope="col">Client Name</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>

    </tr>
  </thead>
    <tbody>
  <?php 
  		$i = 1;
	    if($result->num_rows > 0){ 

	        while($row = $result->fetch_assoc()){  

	        	
?>    	
    <tr>
      <th scope="row"><?php echo $i; $i++; ?></th>
 	
<?php
	            echo '<td>'.$row['task_name'].'</td>';
	            echo '<td>'.$row['client_name'].'</td>';
	          //  echo '<td>'.$row['descriptions'].'</td>';
	          //  echo '<td>'.$row['status'].'</td>';
	            //echo '<td><a href='.$row['client_name'].'</td>';

?>	
			<td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a></td>
			<td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
		
    </tr>
<?php
	        }
	    }
    ?>
    
  </tbody>
</table>
</div>	
</body>
</html>
