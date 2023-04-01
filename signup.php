<?php

include 'connect.php';  //connecting to MySQL database

error_reporting(0); //turning off error reporting

session_start();

if (isset($_SESSION['user_firstName'])) {
    header("Location: signin.php"); //redirecting  user to signin page if they are already signed in
}

if (isset($_POST['submit'])) {

    // user values gotten from the form fields to be inseerted in database
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userclass = $_POST['userclass'];
    $phonenumber = $_POST['phonenumber'];
    $company = $_POST['company'];
    $password = md5($_POST['password']); // use md5 hash generator to encode password in database
    $compassword = md5($_POST['compassword']);

    // checking if both passwords the user inputs are a match, alert an error message if they aren't
    if ($password == $compassword) {

        $sql = "SELECT * FROM users WHERE user_email = '$email'";
        $result = mysqli_query($connection, $sql);

        //chekcing if user email already exists in the database with the above query
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (user_firstName, user_lastName, user_email, user_phoneNumber, company, user_class, password)
            VALUES('$firstname', '$lastname', '$email', '$phonenumber', '$company', '$userclass', '$password')";

            // taking users details and saving data in users table in database
            $result = mysqli_query($connection, $sql);
            if ($result) {
                // echo an alert if registration was successful and redirect user to signin page 
                echo '<script> alert("Registration Successful");
                        window.location.href="signin.php";
                        </script>';
            } else {
                echo "<script>alert('Something went Wrong')</script>";  // echo an alert if registration was unsuccessful
            }
        } else {
            echo "<script>alert('Email id already exists')</script>"; // echo an alert if the email is already in database
        }
    } else {
        echo "<script>alert('Passwords do not match')</script>"; //echo an alert if both passwords aren't a match
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swift-Events | Register</title>
    <link rel="icon" href="./images/1530513141.svg" type="image/x-icon"> <!-- adding logo to the document title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <div class="container">
        <h1 class="display-1">Sign Up</h1>
        <!-- the signup form -->
        <form method="POST">
            <div class="row g-1">
                <div class="form-group col-md-6">
                    <label id="label" for="firstname">*FIRST NAME</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="<?php echo $firstname; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label id="label" for="lastname">*LAST NAME</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="<?php echo $lastname; ?>" required>
                </div>
            </div>
            <div class="row g-1">
                <div class="form-group col-md-7">
                    <label id="label" for="email">*EMAIL</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group col-md-5">
                    <label id="label" for="userclass">YOU ARE?</label>
                    <select class="form-select" id=userclass name="userclass" value="<?php echo $userclass; ?>" required>
                        <option value="">Select</option>
                        <option value="attendee">Regular User</option>
                        <option value="organizer">Organizer</option>
                    </select>
                </div>
            </div>
            <div class="row g-1">
                <div class="form-group col-md-6">
                    <label id="label" for="phonenumber">*PHONE NUMBER</label>
                    <input type="number" class="form-control" id="phonenumber" name="phonenumber" placeholder="(+233)" value="<?php echo $phonenumber; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label id="label" for="company">COMPANY</label>
                    <input type="text" class="form-control" id=company name="company" placeholder="*Organizers Only*" value="<?php echo $company; ?>">
                </div>
            </div>
            <div class="row g-1">
                <div class="form-group col-md-6">
                    <label id="label" for="password">*PASSWORD</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label id="label" for="compassword">*CONFIRM PASSWORD</label>
                    <input type="password" class="form-control" id="compassword" name="compassword" placeholder="Retype Password" value="<?php echo $_POST['compassword']; ?>" required>
                </div>
            </div>
            <span><a id="already" href="signin.php">Already a member? Sign in</a></span>
            <button type="submit" name="submit" value="signup" class="signup-button">REGISTER</button>
        </form>
    </div>

    <!-- Bootstrap plugin -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>