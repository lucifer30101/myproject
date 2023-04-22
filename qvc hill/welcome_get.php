
<!DOCTYPE HTML>  
<html>
<body>

Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><br>
your phone number is: <?php echo $_POST["phone"];?><br>
your dob is: <?php echo $_POST["date"]; ?><br>

<?php 
$nameErr = $emailErr = $phoneErr = $dateErr = "";
$name = $email = $phone = $date = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
    
    if (empty($_POST["phone"])) {
      $phone = "";
    } else {
      $phone = test_input($_POST["phone"]);
    }
  
    if (empty($_POST["date"])) {
      $genderErr = "date is required";
    } else {
      $gender = test_input($_POST["date"]);
    }
  }
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  
?>
</body>
</html>