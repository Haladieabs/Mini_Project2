function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    // Check if Email and Password are entered
    if (email === "" || password === "") {
      alert("Please enter both email and password");
      return false;
    }

    // Additional validation logic can be added here

    return true;
  }