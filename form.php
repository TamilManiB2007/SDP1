<!DOCTYPE html> 
<html>

<head>
  <title>Tamil Mani University - Registration Form</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="script.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

<h1>REGISTRATION FORM</h1>

<?php
// Initialize variables for error messages and form values
$firstName = $lastName = $email = $password = $gender = $category = $dob = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validation
    if (empty($_POST["first_name"])) {
        $errors[] = "First name is required.";
    } else {
        $firstName = htmlspecialchars($_POST["first_name"]);
    }

    if (empty($_POST["last_name"])) {
        $errors[] = "Last name is required.";
    } else {
        $lastName = htmlspecialchars($_POST["last_name"]);
    }

    if (empty($_POST["email"])) {
        $errors[] = "Email is required.";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }
    }

    if (empty($_POST["password"])) {
        $errors[] = "Password is required.";
    } else {
        $password = htmlspecialchars($_POST["password"]);
    }
    if(empty($_POST["Address"])){
        $errors[] = "Address.";
    }
    if(empty($_POST["Marks"])){
        $errors[] = "10TH Mark.";
    }
    if(empty($_POST["Marks"])){
        $errors[] = "12TH Mark.";
    }


    if (empty($_POST["gender"])) {
        $errors[] = "Gender is required.";
    } else {
        $gender = $_POST["gender"];
    }

    if (empty($_POST["category"])) {
        $errors[] = "Community category is required.";
    } else {
        $category = $_POST["category"];
    }

    if (empty($_POST["dob"])) {
        $errors[] = "Date of birth is required.";
    } else {
        $dob = $_POST["dob"];
    }

    if (empty($_POST["check"])) {
        $errors[] = "You must agree to the terms and conditions.";
    }
    if(empty($_POST["register"])){
        $errors[] = "Please click the submit button after checking the giving details are correct.";
    }

    // If no errors, process the form
    if (empty($errors)) {
        echo "<h2>Registration Successful!</h2>";
        echo "<p>Name: " . $firstName . " " . $lastName . "</p>";
        echo "<p>Email: " . $email . "</p>";
        echo "<p>Gender: " . $gender . "</p>";
        echo "<p>Community: " . $category . "</p>";
        echo "<p>Date of Birth: " . $dob . "</p>";
    } else {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

  <ol>
    <li><label>First Name: <input type="text" name="first_name" value="<?php echo $firstName; ?>"></label></li><br><br>
    <li><label>Last Name: <input type="text" name="last_name" value="<?php echo $lastName; ?>"></label></li><br><br>
    <li><label>Email: <input type="email" name="email" value="<?php echo $email; ?>"></label></li><br><br>
    <li><label>Password: <input type="password" name="password"></label></li><br><br>
    <li><label>Address: <input type = "Address" name = "Address"></label></li><br><br>

    <li><label>Gender:</label></li>
    <label><input type="radio" name="gender" value="male" <?php if ($gender == "male") echo "checked"; ?>>Male</label><br><br>
    <label><input type="radio" name="gender" value="female" <?php if ($gender == "female") echo "checked"; ?>>Female</label><br><br>
    <label><input type="radio" name="gender" value="other" <?php if ($gender == "other") echo "checked"; ?>>Others</label><br><br>

    <li><label>Community:</label></li>
    <label>OC <input type="radio" name="category" value="OC" <?php if ($category == "OC") echo "checked"; ?>>OC</label><br><br>
    <label>BC <input type="radio" name="category" value="BC" <?php if ($category == "BC") echo "checked"; ?>>BC</label><br><br>
    <label>BCM <input type="radio" name="category" value="BCM" <?php if ($category == "BCM") echo "checked"; ?>>BCM</label><br><br>
    <label>MBC <input type="radio" name="category" value="MBC" <?php if ($category == "MBC") echo "checked"; ?>>MBC</label><br><br>
    <label>SC <input type="radio" name="category" value="SC" <?php if ($category == "SC") echo "checked"; ?>>SC</label><br><br>
    <label>ST <input type="radio" name="category" value="ST" <?php if ($category == "ST") echo "checked"; ?>>ST</label><br><br>
    <label>SCA <input type="radio" name="category" value="SCA" <?php if ($category == "SCA") echo "checked"; ?>>SCA</label><br><br>

    <li><label>Date of Birth: <input type="date" name="dob" value="<?php echo $dob; ?>"></label></li>
    <br>

    <li><label>I agree to the terms and conditions <input type="checkbox" name="check"></label></li>
    <br>
    <li><label>Please click the submit button after checking the giving details are correct.<input type="submit" value="register"></label></li>
             <br>

    <li><input type="submit" value="Register"></li>
  </ol>

</form>

</body>
</html>