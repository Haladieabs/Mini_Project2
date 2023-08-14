<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $firstName = $_POST['first_name'];
  $middleName = $_POST['middle_name'];
  $lastName = $_POST['last_name'];
  $familyName = $_POST['family_name'];
  $password = $_POST['password'];
  $passwordConfirm = $_POST['password_confirm'];
  $day = $_POST['day'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $userType = $_POST['user_type'];
  $dayErr = $monthErr = $yearErr = ""; // Added semicolon at the end of the line

  // Validate form data
  // Implement validation logic for each field (e.g., email, mobile, name, password, password confirmation, date of birth)

  // Example validation for email
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format');
  }

  // Example validation for mobile
  if (!preg_match("/^[0-9]{14}$/", $mobile)) {
    die('Invalid mobile format');
  }

  // Example validation for name fields
  // Implement your own validation logic for first_name, last_name, and family_name

  // Example validation for password
  if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/", $password)) {
    die('Invalid password format');
  }

  // Example validation for password confirmation
  if ($password !== $passwordConfirm) {
    die('Password confirmation does not match');
  }

  // Validate date of birth
  if (empty($day) || empty($month) || empty($year)) {
    die('Please select a valid date of birth');
  } else {
    // Create a DateTime object with the user's input
    $dob = DateTime::createFromFormat('d/m/Y', $day.'/'.$month.'/'.$year);

    // Calculate the age based on the current date and user's date of birth
    $age = $dob->diff(new DateTime())->y;

    // Check if the age is less than 16
    if ($age < 16) {
      die('You must be at least 16 years old');
    }
  }

  // Connect to the database
  $servername = "localhost";
  $username = "root";
  $dbpassword = "";
  $dbname = "login_system";

  $conn = new mysqli($servername, $username, $dbpassword, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert user data into the database
  $sql = "INSERT INTO userinfo (email, mobile, first_name, middle_name, last_name, familyname, password, dob, user_type) VALUES ('$email', '$mobile', '$firstName', '$middleName', '$lastName', '$familyName', '$password', '$year-$month-$day', '$userType')";
  if ($conn->query($sql) === TRUE) {
    // Redirect the user to the login page
    header("Location: login.html");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}
?>