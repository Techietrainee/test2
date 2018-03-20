<!DOCTYPE html>
<html>
<head>
<style>
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial;
}

/* Style tab links */
.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    color: white;
    display: none;
    padding: 100px 20px;
    height: 100%;
}

#Home {background-color: #337ab7;}
#News {background-color: #337ab7;}
#Contact {background-color: #337ab7;}
#About {background-color: #337ab7;}
</style>
</head>
<body>

<button class="tablink" onclick="openPage('Home', this, '#337ab7')" >User's List</button>
<button class="tablink" onclick="openPage('News', this, '#337ab7')" id="defaultOpen">All Jobs</button>
<button class="tablink" onclick="openPage('Contact', this, '#337ab7')">Assigned Jobs</button>
<button class="tablink" onclick="openPage('About', this, '#337ab7')">Accepted Jobs</button>

<div id="Home" class="tabcontent">

    
     <?php
$DBcon=mysqli_connect("localhost","root","","quantumsdyney");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM pr_add_job ORDER BY work_title";

if ($result=mysqli_query($DBcon,$sql))
  {
?>
        <div>
            <td>Login Page Database</td>
         <table border="1">
            <th> Work Title</th>
                    <th>Description</th>
                    <th>Role</th>
                     <th>Job Type</th>
                   
            </tr>

        <?php

             while($row=  mysqli_fetch_array($result))

             {
                 ?>
            <tr>
                <td><?php echo $row['work_title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td><?php echo $row['job_type'] ;?></td>
                
            </tr>
        <?php
             }
             ?>
    </table><?php
  // Free result set
  mysqli_free_result($result);
}

mysqli_close($DBcon);
?>

</div></div>

<div id="News" class="tabcontent">
  <h3>News</h3>
  <p>Some news this fine day!</p> 
</div>

<div id="Contact" class="tabcontent">
  <h3>Contact</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
</div>

<div id="About" class="tabcontent">
  <h3>About</h3>
  <p>Who we are and what we do.</p>
</div>

<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
