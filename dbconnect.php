<?php

	 $DBhost = "localhost";
	 $DBuser = "ruchiwal_quantum";
	 $DBpass = "quantum@123";
	 $DBname = "ruchiwal_quantumsydney";
	 
	 $DBcon = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($DBcon->connect_errno) {
         die("ERROR : -> ".$DBcon->connect_error);
     }
