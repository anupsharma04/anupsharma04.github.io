<?php

// Replace with your recipient email address
$recipient_email = "anupacharya140@gmail.com";

// Get form data from POST request
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Subject for the email
$subject = "Contact form submission from $name";

// Message content with proper line breaks 
$body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

// Send email using PHP mail function
if (mail($recipient_email, $subject, $body)) {
  echo "Your message has been sent successfully!";
} else {
  echo "There was an error sending your message. Please try again.";
}

?>
<?php
$nameError = "";
$emailError = "";
$messageError = "";

// (Perform validations here)

if (empty($_POST["name"])) {
  $nameError = "Please enter your name.";
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $emailError = "Invalid email format.";
}

// (Check for other errors)

if ($nameError || $emailError || $messageError) {
  // Redirect with error messages
  header("Location: contact.php?nameError=$nameError&emailError=$emailError&messageError=$messageError");
  exit();
}

// (Process form data if no errors)

?>

