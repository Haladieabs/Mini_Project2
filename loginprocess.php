<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "login_system";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Process login form submission
$email = $_POST['email'];
$password = $_POST['password'];

// Validate user credentials
// Your validation logic goes here

// Assuming the user is authenticated and the credentials are valid
$sql = "SELECT first_name, middle_name, last_name, familyname, user_type FROM userinfo WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Check if the 'user_type' key exists in the result
  if (isset($row['user_type'])) {
    $userType = $row['user_type'];

    if ($userType === 'super_user') {
      header("Location: viewuser.php");
    } else {
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'];
      $_SESSION['familyName'] = $row['familyname'];
      header("Location: welcome.php");
    }
  } else {
    // Handle the situation when 'user_type' key is not found
    // Display an error message or redirect to an appropriate page
    echo "Invalid user type";
  }
} else {
  // User does not exist or invalid email
  // Handle accordingly (e.g., display an error message)
  echo "Invalid email";
}

$conn->close();
?>