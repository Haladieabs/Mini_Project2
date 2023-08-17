<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <h1 id="h1">Welcome To Admin Page</h1>
</body>
</html>
<link rel="stylesheet" href="viewuser.css"> -->
<!-- <?php
// $servername = "localhost";
// $username = "root";
// $dbpassword = "";
// $dbname = "login_system";

// $conn = new mysqli($servername, $username, $dbpassword, $dbname);
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // Check if the user is a super user
// // Replace 'user_type_column' with the actual column name in your database that represents the user type
// $sql = "SELECT user_type FROM userinfo WHERE user_type = 'super_user'";
// $result = $conn->query($sql);

// // If the user is a super user, display the table
// if ($result->num_rows > 0) {
//   $sql = "SELECT * FROM userinfo";
//   $result = $conn->query($sql);

//   if ($result->num_rows > 0) {
//     echo "<table>";
//     echo "<tr><th>Email</th><th>Mobile</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Family Name</th><th>Date of Birth</th><th>user_type</th></tr>";

//     while ($row = $result->fetch_assoc()) {
//       echo "<tr>";
//       echo "<td>" . $row['email'] . "</td>";
//       echo "<td>" . $row['mobile'] . "</td>";
//       echo "<td>" . $row['first_name'] . "</td>";
//       echo "<td>" . $row['middle_name'] . "</td>";
//       echo "<td>" . $row['last_name'] . "</td>";
//       echo "<td>" . $row['familyname'] . "</td>";
//       echo "<td>" . $row['dob'] . "</td>";
//       echo "<td>" . $row['user_type'] . "</td>";
//       echo "</tr>";
//     }

//     echo "</table>";
//   } else {
//     echo "No users found.";
//   }
// } else {
//   echo "You are not authorized to view this table.";
// }

// $conn->close();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="viewuser.css">
  <style>
    /* Add your custom CSS styles for cards here */
    .user-card {
      border: 1px solid #ccc;
      padding: 10px;
      margin: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>
  <!-- Add a Logout button/link -->
<button id="one"><a href="logout.php" id="logout">Logout</a></button>

<img src="dieabs-logo__1_-removebg-preview (2).png" alt="" >
  <h1 id="h1">Welcome To<span> Admin</span> Page</h1>

<?php
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "login_system";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the user is a super user
// Replace 'user_type_column' with the actual column name in your database that represents the user type
$sql = "SELECT user_type FROM userinfo WHERE user_type = 'super_user'";
$result = $conn->query($sql);

// If the user is a super user, display the cards
if ($result->num_rows > 0) {
  $sql = "SELECT * FROM userinfo";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo "<div class='user-card'>";
      echo "<p>Email: " . $row['email'] . "</p>";
      echo "<p>Mobile: " . $row['mobile'] . "</p>";
      echo "<p>First Name: " . $row['first_name'] . "</p>";
      echo "<p>Middle Name: " . $row['middle_name'] . "</p>";
      echo "<p>Last Name: " . $row['last_name'] . "</p>";
      echo "<p>Family Name: " . $row['familyname'] . "</p>";
      echo "<p>Date of Birth: " . $row['dob'] . "</p>";
      echo "<p>User Type: " . $row['user_type'] . "</p>";
      echo "</div>";
    }
  } else {
    echo "No users found.";
  }
} else {
  echo "You are not authorized to view this data.";
}

$conn->close();
?>

</body>
</html>

