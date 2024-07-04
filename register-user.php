<?php
require_once "connection.php";

function doesUserExist($email, $connection){
   $stmt = $connection->prepare(
      "SELECT COUNT(*) AS count FROM users WHERE email = ?"
   );
   if ($stmt == false) {
      $errorMsg = "Error preparing statement: " . $connection->error;
      return [null , $errorMsg];
   }
   $stmt->bind_param("s",$email);
   if (!$stmt->execute()) {
      $errorMsg = "Failed to register user: ". $connection->error;
      return [null , $errorMsg];
   }
   foreach($stmt->get_result() as $result){
      if ($result["count"] > 0){
         $retval =  [true, null];
      } else {
         $retval =  [false, null];
      }
   }
   $stmt->close();
   return $retval;
}

if (isset($_POST["register"])) {
   // echo "submitted\n";
   $firstName = $_POST["firstName"];
   $lastName = $_POST["lastName"];
   $email = $_POST["email"];
   $password = $_POST["password"];
   $confirmPassword = $_POST["confirmPassword"];

   if ($password !== $confirmPassword) {
      $errorMsg = "Confirmed password is different";
      // echo $errorMsg;
   } else {
      // echo "$firstName<br>$lastName<br>$email<br>$password<br>$confirmPassword<br>";

      [$userExists, $err ]= doesUserExist($email, $connection);
      if ($err) {
         // error occurred
         $errorMsg = "Somethin went wrong: $userExistResult[1]";
      }
      if ($userExists){
         $errorMsg = "Email already registered";
         // echo $errorMsg;
      }

      $stmt = $connection->prepare(
         "INSERT INTO users (first_name, last_name, email, password)
         VALUES (?,?,?,?)"
      );
      if ($stmt == false) {
         $errorMsg = "Error preparing statement: " . $connection->error;
      }
      $stmt->bind_param(
         "ssss",
         $firstName,
         $lastName,
         $email,
         $password
      );

      if (!$stmt->execute()) {
         $errorMsg = "Failed to register user: ". $connection->error;
      }
      $stmt->close();
      $successMsg = "Welcome to the club $firstName!";
   }
}
