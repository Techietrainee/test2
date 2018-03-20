<?php
session_start();
if ((isset($_SESSION['userSession'])!= "") && ($_SESSION['Role']) != "admin" ) {
	header("Location: home.php");
}
$DBcon=new mysqli("localhost", "root", "","quantumsdyney") or die(mysqli_error($DBcon));

if(isset($_POST['btn-signup'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mobileno = $_POST['mobileno'];
	$timezone = date_default_timezone_get();
	$date = date("Y-m-d");
	$email =$_POST['email'];
	$upass =$_POST['password'];
	$role  = $_POST['role'];
	
	$hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version
	
	$check_email = $DBcon->query("SELECT email FROM pr_users WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if ($count==0) {
		
		$query = "INSERT INTO pr_users(firstname,lastname,email,password,mobileno,timezone,date,role) VALUES('$firstname','$lastname','$email','$hashed_password','$mobileno','$timezone','$date','$role')";

		if ($DBcon->query($query)) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered !
					</div>";
		}else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering !
					</div>";
		}
		
	} else {
		
		
		$msg = "<div class='alert alert-danger'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; sorry email already taken !
				</div>";
			
	}
	
	$DBcon->close();
}
?>
<!DOCTYPE html>
<html>
<body>


<div class="signin-form">

	<div class="container">
     
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading heading_main">Sign Up</h2><hr />
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
          
        <div class="form-group">
		<label>Firstname:</label>
        <input type="text" class="form-control" placeholder="Enter your Firstname" name="firstname" required  />
        </div>
		<div class="form-group">
		<label>Lastname:</label>
        <input type="text" class="form-control" placeholder="Enter your Lastname" name="lastname" required  />
        </div>
		<div class="form-group">
		<label>Email:</label>
        <input type="email" class="form-control" placeholder="Email address" name="email" required  />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
		<label>Password:</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required  />
        </div>
		<div class="form-group">
		<label>Mobile no:</label>
        <input type="text" class="form-control" placeholder="Enter Mobile no" name="mobileno" required  />
        </div>
		<div class="form-group">
		<label>Timezone:</label>
        <input type="text" class="form-control" name="timezone"  value="<?php echo date("Y-m-d");?>" disabled />
        </div>
		<div class="form-group">
		<label>Date:</label>
        <input type="text" class="form-control" name="date"  value="<?php echo date_default_timezone_get();?>" disabled />
        </div>
		<div class="form-group">
		<label>User Role:</label>
		<select class="form-control" name="role">
			<option value="">Select User Role</option>
			<option value="admin">Admin</option>
			<option value="employee">Employee</option>
		</select>
        </div>
		
        
       
        
     	<hr />
        
        <div class="form-group">
         <div class="signup_buttons">   <button type="submit" name="btn-signup">
    	     Sign Up
			</button> 
		 <p>Already have an account? <a href="index.php"> Sign In</a> here.</p>
        </div> 
		</div>
      
      </form>

    </div>
    
</div>
</body>
 </html>