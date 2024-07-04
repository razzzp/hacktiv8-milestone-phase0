<?php
require_once "connection.php";

if (isset($_POST["register"])) {
   $name = $_POST["name"];
   $role = $_POST["role"];
   $availability = $_POST["availability"];
   $age = $_POST["age"];
   $location = $_POST["location"];
   $experience = $_POST["experience"];
   $email = $_POST["email"];

   $stmt = $connection->prepare(
      "UPDATE users SET 
         name=?, 
         role=?,
         availability=?,
         age=?,
         location=?,
         years_exp= ?,
         email=?
         WHERE id =?
      "
   );
   if ($stmt == false) {
      die("error preparing statement" . $connection->error);
   }
   $stmt->bind_param(
      "sssisisi",
      $name,
      $role,
      $availability,
      $age,
      $location,
      $experience,
      $email,
      $id
   );

   if ($stmt->execute()) {
      echo "Data updated successfully.";
   } else {
      echo "Failed to update data.";
   }
   $stmt->close();
   header('Location: ' . 'index.php');
}

$sql = "UPDATE users SET 
      name='$name', 
      role='$role',
      availability='$availability',
      age=$age,
      location='$location',
      years_exp='$experience',
      email='$email'
      WHERE id = $id
   ";
