<?php

// Connect to the database
$db = new PDO('mysql:host=localhost;dbname=contact_form', 'root', '');

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Validate the form data
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
  // Display an error message
  echo 'Please fill out all of the required fields.';
} else {
  // Insert the form data into the database
  $sql = 'INSERT INTO submissions (name, email, subject, message) VALUES (?, ?, ?, ?)';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(1, $name);
  $stmt->bindParam(2, $email);
  $stmt->bindParam(3, $subject);
  $stmt->bindParam(4, $message);
  $stmt->execute();

  // Display a success message
  echo 'Your message has been sent. Thank you!';
}

?>
