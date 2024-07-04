<?php
require_once "connection.php";

if (isset($_POST["register"])) {
   // echo "submitted\n";
   $email = $_POST["email"];
   $password = $_POST["password"];
}