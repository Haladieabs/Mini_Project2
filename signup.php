<!DOCTYPE html>
<html>
<head>
  <title>Sign Up</title>
</head>
<link rel="stylesheet" href="signup.css">
<body>
  
  <form action="register.php" method="POST" class="form">
  <img src="image44.png" alt=""><br>
  <h2>Sign Up</h2>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="mobile">Mobile:</label>
    <input type="tel" id="mobile" name="mobile" pattern="[0-9]{14}" required>
    <!-- <small>Format: 12345678901234</small> --><br><br>

    <!-- Full Name fields -->
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

    <label for="middle_name">Middle Name:</label>
    <input type="text" id="middle_name" name="middle_name"><br><br>

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    <label for="family_name">Family Name:</label>
    <input type="text" id="family_name" name="family_name" required><br><br>

    <!-- Password fields -->
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$" required>
   <br><br>

    <label for="password_confirm">Confirm Password:</label>
    <input type="password" id="password_confirm" name="password_confirm" required><br><br>

    <!-- Date of Birth field -->
    <label for="dob">Date of Birth:</label>
    <select id="day" name="day" required>
    <option value="">Day</option>
    <?php
    for ($i = 1; $i <= 31; $i++) {
      echo "<option value='$i'>$i</option>";
    }
    ?>
  </select>
  <select id="month" name="month" required>
    <option value="">Month</option>
    <?php
    $months = array(
      "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    );
    foreach ($months as $index => $month) {
      $monthNumber = $index + 1;
      echo "<option value='$monthNumber'>$month</option>";
    }
    ?>
  </select>
  <select id="year" name="year" required>
    <option value="">Year</option>
     <?php
     $dayErr = $monthErr = $yearErr = "";
   $currentYear = date("Y");
    for ($i = $currentYear; $i >= 1900; $i--) {
      echo "<option value='$i'>$i</option>";
    }
    ?>
  </select>
  <span class="error"><?php echo "$dayErr $monthErr $yearErr"; ?></span>

  <br><br>
  
    <!-- User Type field -->
    <label for="user_type">User Type:</label>
    <select id="user_type" name="user_type" required>
      <option value="">Select User Type</option>
      <option value="user">User</option>
      <option value="super_user">Super User</option>
    </select><br><br>

    <input type="submit" value="Sign Up" id="button">
  </form>
</body>
</html>