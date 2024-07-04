<?php
   $db_host = "localhost";
   $db_username = "root";
   $db_pass = "devPa\$\$w0rd";
   $db_name = "hackiv8_milestone_0";

   $connection = new mysqli(
      $db_host, 
      $db_username,
      $db_pass,
      $db_name
   );

   if ($connection->connect_error){
      die("Failed to connect to DB");
   }
   echo "Connection established<br>";
