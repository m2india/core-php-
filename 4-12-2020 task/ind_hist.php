<?php 
    // Include the database config file 
    require 'connections.php'; 

//    error_reporting(0);
     
    $id = $_GET['id'];
    $query4 = "SELECT * FROM descriptions  WHERE d_id =".$id ; 
    $result4 = $conn->query($query4);

    //print_r($result); die();

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
      <th scope="col">S.No</th>
      <th scope="col">Comments</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
    <tbody>
  <?php 
  		$i = 1;
	    if ( isset($result4->num_rows) && $result4->num_rows >0){ 

	        while($row4 = $result4->fetch_assoc()){  

	        	
?>    	
    <tr>
      <th scope="row"><?php echo $i; $i++; ?></th>
 	
<?php
	            echo '<td>'.$row4['descriptions'].'</td>';
              ?>

	           <?php echo '<td>'.$row4['status'].'</td>';
	            //echo '<td><a href='.$row['client_name'].'</td>';

$previous = "javascript:history.go(-1)";
if(isset($_SERVER['HTTP_REFERER'])) {
$previous = $_SERVER['HTTP_REFERER'];
}

?>	

			 <td><a href="<?= $previous ?>">Back</a>
</td> 
		
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
