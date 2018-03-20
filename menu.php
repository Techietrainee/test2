<?php
if (isset($_SESSION['userSession']) && $_SESSION['userrole'] == 'admin') {
$query_menu = $DBcon->query("SELECT * FROM pr_users WHERE user_id=".$_SESSION['userSession']);
$userRow_menu=$query_menu->fetch_Assoc();
$DBcon->close();
	?>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney"><img src="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/images/newlogo.png" style="width:100px;height:auto;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">		 
		   <li class="active" ><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/home.php">My account</a></li>
           <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/register.php">Create New User</a></li>
		   <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/admin/add_job.php">Create job</a></li>
		   <li><a href="#">User's List</a></li>
		   <li><a href="#">View Records</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $userRow_menu['firstname']; ?></a></li>
            <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/logout.php?logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<?php
}
else
{
?>
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          
          <a class="navbar-brand" href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney"><img src="images/newlogo.png" style="width:100px;height:auto;"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">		 
		   <li class="active" ><a href="http://www.codingcage.com/search/label/PHP">My account</a></li>
           <li><a href="<?php echo "http://" . $_SERVER['SERVER_NAME']; ?>/quantum-sydney/register.php">My jobs</a></li>
		   <li><a href="register.php">View Records</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $userRow['firstname']; ?></a></li>
            <li><a href="logout.php?logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<?php
}
?>
