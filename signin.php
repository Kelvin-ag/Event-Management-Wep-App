<?php

include 'connect.php'; //connecting to MySQL database

session_start();
error_reporting(0); //turning off error reporting

// if (isset($_SESSION['user_firstName'])) {
//     header ("Location: logged.php");
// }

//user login credentials 
if (isset($_POST['submit'])) {
    $email = $_POST['emailid'];
    $password = md5($_POST['loginpassword']);

    // getting email and password of a registered user from users table
    $sql = "SELECT * FROM users WHERE user_email = '$email' AND password = '$password'";
    $result = mysqli_query($connection, $sql);


    //if the result of the query is the the database
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        //if the user is an organizer, they are redirected to the organizer dahsboard otherwise they are 
        // redirected to regular user dahsboard
        $_SESSION['user_firstName'] = $row['user_firstName'];
        header("Location: organizer.php");

        if ($row['user_class'] == 'attendee') {
            header("Location: user.php");
        }
    } else {
        echo "<script>alert('Email or Password is wrong')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swift-Events | Login</title>
    <link rel="icon" href="./images/1530513141.svg" type="image/x-icon"> <!-- adding logo to the document title -->
    <link rel="stylesheet" href="signin.css">
</head>

<body>
    <div class="panel">
        <div class="login-plan">
            <!-- sign in form -->
            <form method="POST">
                <h2>Member Login</h2>
                <ul class="login-features">
                    <li class="login-features-item">
                        <label for="emailaddress">EMAIL</label>
                        <input type="email" id="emailaddress" name="emailid" title="the email id used when creating your account" placeholder="Enter email" value="<?php echo $email; ?>" required>
                    </li>
                    <li class="login-features-item">
                        <label for="password">PASSWORD</label>
                        <input type="password" id="password" name="loginpassword" title="password used when creating your account" placeholder="Enter password" value="<?php echo $_POST['loginpassword']; ?>" required></li>
                    </li>
                    <span><a id="forgot" href="forgot.php">Forgot Passpord?</a></span>
                    <li class="login-features">
                        <input type="checkbox" id="remember" name="remeber">
                        <label for="remember">Remember me?</label>
                    </li>
                </ul>
                <button type="submit" name="submit" class="login-button signin">LOGIN</button>
            </form>
        </div>
        <!-- directing user to signup page if user isn't registered -->
        <div class="login-plan">
            <img src="./images/icon1.png" alt="" class="login-img">
            <h2 class="login-header">Join us for free</h2>
            <ul class="login-features">
                <li class="login-features-item">Don't have an Account?</li>
            </ul>
            <a href="signup.php" class="login-button">SIGN UP</a>
        </div>
    </div>
</body>

</html>