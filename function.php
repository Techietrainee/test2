

 <?php 
 function userdata($id)
  {
	
	 global $DBcon;
	 $query=$DBcon->query("select * from pr_users where id=$id");
	 $row = $query->fetch_assoc();
     return $row; 
}
?>
