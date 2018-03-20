<?php
session_start();
require_once '../config/dbconnect.php';
?>
<?php include('../header.php'); ?>
<?php include('../menu.php'); ?>


<div class="admin-form">
<?php 


if(isset($_POST["submit"])) {
	
	$j_title = $_POST['job_title'];
	$j_des = $_POST['job_description'];
	$j_type = $_POST['job_type'];
	$filename = $_FILES["fileToUpload"]["name"];
	$save_f_name = $j_title.'_'.$filename;
	$j_assign = $_POST['assign_to'];
	
	$target = "uploads_job/";
	$target_dir = "uploads_job/".$j_title.'_';
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	$msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	exit;
	}
	else
	{
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$msg = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	} else {
	$msg = "Sorry, there was an error uploading your file.";
	}
	}
	

}

?>
	<div class="container">

        
       <form action="" class="form-signin add-job" method="post" id="add-job-form" enctype="multipart/form-data">
      
		<h2 class="form-signin-heading heading_main">Add New Work</h2>
		<div class="messages"><?php if($msg != ''){echo $msg;}?></div>
			<div class="form-group">
			<label>Job Title:</label>
			<input type="text" class="form-control" Placeholder="Job Title" name="job_title">
			</div>
			<div class="form-group">
			<label>Job Description:</label>
			<textarea class="form-control" placeholder="Description" name="job_description"></textarea>
			</div>
			<div class="form-group">
			<label>Job Type:</label>
			<select class="form-control" name="job_type">
				<option class="form-control" value="">Choose Job type:</option>
				<option class="form-control" value="fulltime">Full Time</option>
			    <option class="form-control" value="parttime">Part Time</option>
			</select>
			</div>
			
			<div class="form-group">
			<label>Select Image:</label>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<img id="blah" src="http://placehold.it/150" alt="your image" />
            <img src='<?php echo $image_src;  ?>' >
			</div>
			<div class="form-group">
			<label>Assign To:</label>
			<select class="form-control" name="assign_to">
				<option class="form-control" value="">Assign Job to:</option>
				<?php print_r($DBcon);?>
					<?php	$sqlselect = $DBcon->query("SELECT user_id,email FROM pr_users");
					print_r($sqlselect);
					
					?>
			</select>
			</div>
			
			<div class="form-group addjob_button">
				<button  type="submit"  name="submit"> Submit Job</button>
			</div>	
			</form>
		</div>
</div>

 
<?php include('../footer.php'); ?>
