<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quantumsdyney";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
// $sql = "CREATE TABLE pr_add_job (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
// work_title VARCHAR(30) NOT NULL,
// description VARCHAR(250) NOT NULL,
// image blob,
// role VARCHAR(30) NOT NULL,
// job_type VARCHAR(30) NOT NULL
// )";
$sql = "ALTER TABLE pr_add_job
ADD location varchar(100),ADD state varchar(100),ADD status varchar(20),ADD hec varchar(50),ADD date date,ADD jeopardy varchar(50), ADD ncr Varchar(50)";
if ($conn->query($sql) === TRUE) {
    echo "Table job created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>