<?php
  
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "loginsystem";


    $conn = mysqli_connect($servername, $username, $password, $databasename);


    if (!$conn) 
    {
    	die("Connectuin failed: ".mysqli_connect_error());
    }
    else
    {
    	//echo "success";
    }


?>