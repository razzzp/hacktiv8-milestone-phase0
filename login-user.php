<?php
require_once "connection.php";

class User{
   public $firstName;
   public $lastName;
   public $email;
   public $password;

   function __tostring(){
      return $this->firstName ." ". $this->lastName." ".$this->email." ".$this->password;
   }
}

function getUser($email, $connection){
   $stmt = $connection->prepare(
      "SELECT *  FROM users WHERE email = ?"
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
   $user = null;
   foreach($stmt->get_result() as $result){
      $user = new User();
      $user->firstName = $result["first_name"];
      $user->lastName = $result["last_name"];
      $user->email = $result["email"];
      $user->password = $result["password"];
   }
   $stmt->close();
   return [$user, null];
}

function login($email, $password, $connection){
   if (isset($_POST["login"])) {
   
      [$user, $errorMsg] = getUser($email, $connection);
      if($errorMsg){
         return [null, $errorMsg];
      }
      if($user){
         // echo "$user";
         // user exists
         if ($password == $user->password){
            $name = $user->firstName;
            $successMsg = "Welcome back, $name";
            return [$successMsg, null];
         } else {
            $errorMsg = "Wrong email or password";
            return [null, $errorMsg];
         }
      } else {
         // user doesnt exist
         $errorMsg = "Wrong email or password";
         return [null, $errorMsg];
      }
   }
}

if (isset($_POST["login"])) {
   $email = $_POST["email"];
   $password = $_POST["password"];
   [$successMsg, $errorMsg] = login($email, $password, $connection);
}


