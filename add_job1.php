<!Doctype HTML>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <link  rel="stylesheet" href="css/FontAwesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 
</head>
<body>

<div class="container-fluid work-upload">
	<div class="container">
		<div class="work-upload-form">
			<!-- <h1>Add New Work</h1> -->
			<!-- <form action="add_job.php" method="post"> -->
				<!-- <input type="text" Placeholder="Work Title" name="work_title"> -->
				<!-- <input type="text" placeholder="Description" name="description"> -->
				<!-- <select name="job_type"> -->
				<!-- <option value="disabled">Choose any one</option> -->
				<!-- <option value="fulltime">Full Time</option> -->
			    <!-- <option value="parttime">Part Time</option> -->
				<!-- </select> -->
				<!-- <input type="file" name="image" id="fileToUpload"> -->
				<!-- <select name="role"> -->
				<!-- <option value="admin">Admin</option> -->
			    <!-- <option value="user">User</option> -->
			    <!-- <option value="employee">Employee</option> -->
				<!-- </select> -->
				
				<!-- <input type="submit" value="Submit" name="submit"> -->
			<!-- </form> -->
			<?php 
		 $DBhost = "localhost";
		 $DBuser = "root";
		 $DBpass = "";
		 $DBname = "quantumsdyney";
	 
	 $DBcon=new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     } ?>
			<?php require_once 'function.php';
			print_r( userdata(1)); ?>
		</div>
	</div>
</div>
</body>
</html>