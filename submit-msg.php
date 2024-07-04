<?php
require_once "connection.php";

if (isset($_POST["submit-msg"])) {
   // echo "submitted\n";
   $firstName = $_POST["firstName"];
   $lastName = $_POST["lastName"];
   $email = $_POST["email"];
   $phoneNumber = $_POST["phoneNumber"];
   $subject = $_POST["subject"];
   $message = $_POST["message"];


   $stmt = $connection->prepare(
      "INSERT INTO messages (first_name, last_name, email, phone_number, subject, message)
      VALUES (?,?,?,?,?,?)"
   );
   if ($stmt == false) {
      $errorMsg = "Error preparing statement: " . $connection->error;
   }
   $stmt->bind_param(
      "ssssss",
      $firstName,
      $lastName,
      $email,
      $phoneNumber,
      $subject,
      $message
   );

   if (!$stmt->execute()) {
      $errorMsg = "Failed to submit message: ". $connection->error;
   }
   $stmt->close();
   $successMsg = "Your message has been received. We'll get back to you shortly, $firstName!";
}