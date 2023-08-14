<link rel="stylesheet" href="welcome.css">
  <?php
 
 session_start();
 if (isset($_SESSION['email']) && isset($_SESSION['name'] ) && isset($_SESSION['familyName'])) {
   $email = $_SESSION['email'];
   $name = $_SESSION['name'];
   $familyName = $_SESSION['familyName'];
   
   // Extract the first name, middle name, last name, and family name from the full name
   $nameParts = explode(' ', $name);
   $firstName = $nameParts[0];
   $middleName = $nameParts[1];
   $lastName = $nameParts[2];
 
   $fullName = $firstName . ' ' . $middleName . ' ' . $lastName . ' ' . $familyName;
 
   // Display the user information
   echo "<h1>Welcome, $firstName</h1>";
   echo "<p>Email: $email</p>";
   echo "<p>Full Name: $fullName</p>";
  
  } 
   else {
   echo "<h2>Welcome!</h2>";
 }
 ?>

</body>
</html>