<?php 
    // Include the database config file 
    require 'connections.php'; 

//    error_reporting(0);
     
    // Fetch all the country data 
    $query = "SELECT * FROM client_name ORDER BY Client_Name ASC"; 
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
	<form method="post" action="insert.php" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="formGroupExampleInput">New Task</label>
	    <input type="text" class="form-control" name="task_name" id="formGroupExampleInput" placeholder="Example input placeholder">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput">Date & Time</label>
	    <input type="date" class="form-control" name="t_current_date" id="formGroupExampleInput" placeholder="Example input placeholder">
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Description</label>
		<textarea class="form-control" name="descriptions" id="exampleFormControlTextarea1" rows="3"></textarea>
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Task Type</label>
		  	<select name="task_type" id="">
		  		<option>--Select--</option>
		  		<option value="Bug">Bug</option>
		  		<option value="New_Feature">New_Feature</option>
		  		<option value="Additional">Additional</option>
		  		<option value="Testing">Testing</option>
		  		<option value="API">API</option>
		  		<option value="Implementation">Implementation</option>
		  		<option value="Estimation">Estimation</option>
		  	</select>
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Client Name</label>
		  	<select name="client_name" id="client_name">
		  		<option>--Select--</option>
	<?php 
	    if($result->num_rows > 0){ 
	        while($row = $result->fetch_assoc()){  
	            echo '<option value="'.$row['c_id'].'">'.$row['Client_Name'].'</option>'; 
	        } 
	    }else{ 
	        echo '<option value="">Client name available</option>'; 
	    } 
    ?>
		  		
		  	</select>
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Project Name</label>
		  	<select name="response" id="response">
		  		<option>--Select--</option>
    	  	</select>
	  </div>

	  <div class="form-group">
	    <label for="formGroupExampleInput">Priority Type</label>
	    <input type="text" class="form-control" name="priority_type" id="formGroupExampleInput" placeholder="Example input placeholder">
	  </div>

	    <div class="form-group">
	    <label for="formGroupExampleInput">Due Date</label>
	    <input type="date" class="form-control" name="due_date" id="formGroupExampleInput" placeholder="Example input placeholder">
	  </div>
	  <div class="form-group">
    		<label for="exampleFormControlFile1">Attachment</label>
    		<input type="file" class="form-control-file" name="attache_file" id="attache_file">
  	  </div>
  	   <div class="form-group">
    		<label for="exampleFormControlFile1">Hour of Spending</label>
    		<input type="text" class="form-control" name="hours_spend" id="formGroupExampleInput" placeholder="Example input placeholder">
  	  </div>
  	    <div class="form-group">
		<label for="exampleFormControlTextarea1">Status</label>
		  	<select name="status" id="">
		  		<option>--Select--</option>
		  		<option value="Open">Open</option>
		  		<option value="Close">Close</option>
		  		<option value="Rework">Rework</option>
		  		<option value="Testing">Testing</option>
		  		<option value="Retesting">Retesting</option>
		  		<option value="In_Progress">In_Progress</option>
		  		<option value="Hold">Hold</option>
		  	</select>
	  </div>

	  <button type="submit" name="submit" class="btn btn-primary">Add</button>

	  <input type="button" ... value="Cancel" onclick="history.back();" />

	</form>
</div>
</body>
</html>
<script>
$(document).ready(function(){
    $("#client_name").change(function(){
        var selectedCountry = $(".country option:selected").val();
        $.ajax({
            type: "POST",
            url: "project_name.php",
        //    data: { country : selectedCountry } 
            data :	{"id":$('#client_name').val()}
        }).done(function(data){
            $("#response").html(data);
        });
    });
});
</script>