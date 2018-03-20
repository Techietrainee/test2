<?php
session_start();
$DBcon=new mysqli("localhost", "root", "","quantumsdyney") or die(mysqli_error($DBcon));

if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
	exit;
}

if (isset($_POST['btn-login'])) {
	
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	
	$email = $DBcon->real_escape_string($email);
	$password = $DBcon->real_escape_string($password);
	
	$query = $DBcon->query("SELECT user_id, email, password, role FROM pr_users WHERE email='$email'");
	$row=$query->fetch_array();
	
	$count = $query->num_rows; // if email/password are correct returns must be 1 row
	$_SESSION['userSession'] = $row['user_id'];
		$_SESSION['Role'] = $row['role'];
	if ((password_verify($password, $row['password']) && $count==1) ){
		
		header("Location: home.php");
	} else {
		$msg = "<div class='alert alert-danger'>
				 Invalid Username or Password !
				</div>";
	}
	$DBcon->close();
}
?><!DOCTYPE html>
<html>
<body>


<div class="signin-form">

	<div class="container wow bounceInDown">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading heading_main">Sign In.</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
		<label>Email:</label>
        <input type="email" class="form-control" placeholder="Email address" name="email" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
		<label>Password:</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
          <div class="signup_buttons">
		  <button type="submit"  name="btn-login" id="btn-login">
    		 Sign In
		  </button> 
		 <p>Not a member yet? <a href="register.php">Sign UP </a>here.</button>
          </div>   
        </div>  
        
        
      
      </form>

    </div>
    
</div>
</body>
 </html>