<?php
   $db_host = "localhost";
   $db_username = "root";
   $db_pass = "devPa\$\$w0rd";
   $db_name = "hacktiv8_milestone_0";

   $connection = new mysqli(
      $db_host, 
      $db_username,
      $db_pass,
      $db_name
   );

   if ($connection->connect_error){
      $errorMsg = "Failed to connect to DB". $connection->connect_error;
   }
   // echo "Connection established<br>";
