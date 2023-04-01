<?php

include 'connect.php'; //connecting to MySQL database using connect file

session_start(); //starting php session

//if user isn't signed in redirect back to the index home page
if (!isset($_SESSION['user_firstName'])) {
    header("Location: index.php");
}

//getting data on the logged in user from users database table
$currUser = $_SESSION['user_firstName'];
$sql = "SELECT user_firstName, user_lastName, user_phoneNumber, company, user_class, date from users WHERE user_firstName='$currUser'";
$result = mysqli_query($connection, $sql);
$data = mysqli_fetch_array($result);

//getting data on the event record from events database table
$sqli = "SELECT event_ID, event_name, event_location, event_start, event_end, event_img from events";
$eventRecord = mysqli_query($connection, $sqli);

//getting data from reservations table
$sqlq = "SELECT * from reservations where Event_ID = '$id'";
$reserve = mysqli_query($connection, $sqlq);
$events = mysqli_fetch_array($reserve);

//viewing reserved event
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $view = "SELECT * from reservations WHERE user_ID = '$id'";
    $reserve = mysqli_query($connection, $view);
    $events = mysqli_fetch_array($reserve);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swift-Events| View Reservation</title>
    <link rel="icon" href="./images/1530513141.svg" type="image/x-icon"> <!-- adding logo to the document title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="organizer.css">
</head>

<body>
    <div class="container">
        <div class="dashboard">
            <!-- printing out the event details to see who has reservered -->
            <table border="1" align="center" cellpadding="20">
                <tr>
                    <th>
                        User id
                    </th>
                    <th>
                        User First name
                    </th>
                    <th>
                        User Last name
                    </th>
                    <th>
                        Event ID
                    </th>
                    <th>
                        Event Name
                    </th>
                </tr>
                <tr>
                    <td> <?php echo $events['user_ID']; ?></td>
                    <td> <?php echo $events['user_FirstName']; ?></td>
                    <td> <?php echo $events['user_LastName']; ?></td>
                    <td> <?php echo $events['Event_ID']; ?></td>
                    <td> <?php echo $events['Event_Name']; ?></td>
                    <td><a id="viewEvent" href="organizer.php">Back to Dashboard</a></td>
                </tr>
            </table>
        </div>
    </div>

</body>

</html>