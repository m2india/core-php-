<?php 
    // Include the database config file 
    require 'connections.php'; 

//    error_reporting(0);

   $id = $_GET['id']; 
     
    // Fetch all the country data 
    $query = "SELECT project_info.id,project_info.descriptions,project_info.task_type ,project_info.task_name,client_name.client_name,client_name.c_id, project_info.t_current_date,project_info.client_name,project_info.response,project_info.priority_type,project_info.due_date,project_info.hours_spend,project_info.status,project_info.attache_file FROM project_info JOIN client_name ON project_info.client_name=client_name.c_id JOIN project_name ON client_name.c_id=project_name.client_id  where project_info.id ='".$id."'"; 
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

<?php
	while($row = $result->fetch_assoc()){

?>
<div class="container-sm">
	<form method="post" action="update.php?id=<?php echo $row['id']; ?>" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="formGroupExampleInput">New Task</label>
	    <input type="text" class="form-control" name="task_name" value="<?php echo $row['task_name']; ?>" id="formGroupExampleInput" placeholder="Example input placeholder">
	  </div>
	  <div class="form-group">
	    <label for="formGroupExampleInput">Date & Time</label>
	    <input type="date" class="form-control" name="t_current_date" id="formGroupExampleInput" value="<?php echo $row['t_current_date']; ?>">
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Description</label>
		<textarea class="form-control" name="descriptions" value="" id="exampleFormControlTextarea1" rows="3"><?php 

		$query2 = "SELECT max(descriptions.d_id)d_id FROM project_info JOIN descriptions ON project_info.id=descriptions.project_info_id  where project_info.id ='".$id."' "; 
        
        $result2 = $conn->query($query2); 

        // while($row2 = $result2->fetch_assoc()){
        // 	echo $row2['descriptions']; 
        // }
        $row2 = $result2->fetch_assoc();

//        echo $row2['d_id'];

        $query2a = "SELECT descriptions FROM descriptions where d_id ='".$row2['d_id']."' "; 
        
        $query2a = $conn->query($query2a);

        $row2a = $query2a->fetch_assoc();

        echo $row2a['descriptions'];

    //    mysqli_insert_id

        
        
     //   echo $row2['descriptions'];


		?></textarea>
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Task Type</label>
		<?php 

	//	while($row=mysql_fetch_array($result)){

	//	echo	$row['task_type'];
	//	}

		?>
		  	<select name="task_type" id="">
		  		<option>--Select--</option>
		  		<option value="Bug"<?=$row['task_type'] == 'Bug' ? ' selected="selected"' : '';?>>Bug</option>
		  		<option value="New_Feature"<?=$row['task_type'] == 'New_Feature' ? ' selected="selected"' : '';?>>New_Feature</option>

		  		<option value="Additional"<?=$row['task_type'] == 'Additional' ? ' selected="selected"' : '';?>>Additional</option>
	  		

		  		<option value="Testing"<?=$row['task_type'] == 'Testing' ? ' selected="selected"' : '';?>>Testing</option>

		  		<option value="API"<?=$row['task_type'] == 'API' ? ' selected="selected"' : '';?>>API</option>

		  			<option value="Implementation"<?=$row['task_type'] == 'Implementation' ? ' selected="selected"' : '';?>>Implementation</option>
		  		
		  		<option value="Estimation"<?=$row['task_type'] == 'Estimation' ? ' selected="selected"' : '';?>>Estimation</option>
		  	</select>
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Client Name</label>
		<?php  // echo $row['client_name']; ?>
		  	<select name="client_name" id="client_name">
		  		<option>--Select--</option>
	<?php 


	$query = "SELECT * FROM client_name ORDER BY Client_Name ASC"; 
    $result = $conn->query($query);
	    if($result->num_rows > 0){ 
	        while($row1 = $result->fetch_assoc()){
	?>
		

	<option value="<?php echo $row1['c_id']; ?>"<?=$row['client_name'] == $row1['c_id'] ? ' selected="selected"' : '';?>><?php echo $row1['Client_Name']; ?></option>

<?php
	 } 
	    }

    ?>
	
		</select>
	  </div>
	  <div class="form-group">
		<label for="exampleFormControlTextarea1">Project Name</label>
		  	<select name="response" id="response">
		  		<option>--Select--</option>
		  			<?php 


	$query = "SELECT * FROM project_name ORDER BY project_name ASC"; 
    $result = $conn->query($query);
	    if($result->num_rows > 0){ 
	        while($row1 = $result->fetch_assoc()){
	?>
	<option value="<?php echo $row1['id']; ?>"<?=$row['response'] == $row1['id'] ? ' selected="selected"' : '';?>><?php echo $row1['project_name']; ?></option>
<?php
	 } 
	    }

    ?>
    	  	</select>
	  </div>

	  <div class="form-group">
	    <label for="formGroupExampleInput">Priority Type</label>
	    <input type="text" class="form-control" value="<?php echo $row['priority_type']; ?>" name="priority_type" id="formGroupExampleInput" placeholder="Example input placeholder">
	  </div>

	    <div class="form-group">
	    <label for="formGroupExampleInput">Due Date</label>
	    <input type="date" class="form-control" value="<?php echo $row['due_date']; ?>" name="due_date" id="formGroupExampleInput" placeholder="Example input placeholder">
	  </div>
	  <div class="form-group">
    		<label for="exampleFormControlFile1">Attachment</label>
    		<input type="text" readonly class="form-control" value="<?php echo $row['attache_file']; ?>" name="attache_file1" id="" placeholder="Example input placeholder">


    		<input type="file" class="form-control-file"  name="attache_file" id="attache_file">

  	  </div>
  	   <div class="form-group">
    		<label for="exampleFormControlFile1">Hour of Spending</label>
    		<input type="text" class="form-control" value="<?php echo $row['hours_spend']; ?>" name="hours_spend" id="formGroupExampleInput" placeholder="Example input placeholder">
  	  </div>
  	    <div class="form-group">
		<label for="exampleFormControlTextarea1">Status</label>

		<?php
			// $query = "SELECT * FROM descriptions"; 
   //  		$result = $conn->query($query);
   //  		$row1 = $result->fetch_assoc();
    		//print_r($row1);
    	?>


<select name="status" id="">
		  		<option>--Select--</option>

    	<?php
    	$query3 = "SELECT descriptions.status FROM project_info JOIN descriptions ON project_info.id=descriptions.project_info_id where project_info.id ='".$id."' group by descriptions.status"; 
        
        $result3 = $conn->query($query3);

     //   $row3 = $result3->fetch_assoc();
   //     print_r($row3);
        while($row3 = $result3->fetch_assoc()){ ?>

        	<!-- echo $row3['status'];  -->
        	

		  		<option value="Open"<?=$row3['status'] == 'Open' ? ' selected="selected"' : '';?>>Open</option>
		  		<option value="Close"<?=$row3['status'] == 'Close' ? ' selected="selected"' : '';?>>Close</option>
		  		<option value="Rework"<?=$row3['status'] == 'Rework' ? ' selected="selected"' : '';?>>Rework</option>

		  		<option value="Testing"<?=$row3['status'] == 'Testing' ? ' selected="selected"' : '';?>>Testing</option>
		  		<option value="Retesting"<?=$row3['status'] == 'Retesting' ? ' selected="selected"' : '';?>>Retesting</option>
		  		<option value="In_Progress"<?=$row3['status'] == 'In_Progress' ? ' selected="selected"' : '';?>>In_Progress</option>
		  		<option value="Hold"<?=$row3['status'] == 'Hold' ? ' selected="selected"' : '';?>>Hold</option>


        <?php }

    	?>
		  	</select>
		  	
	  </div>

	  <button type="submit" name="update" class="btn btn-primary">Update</button>
	  <!-- <button type="submit" name="update" class="btn btn-primary">Cancel</button> -->
	  <input type="button" ... value="Cancel" onclick="history.back();" />
	</form>
<?php
}
?>	
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