<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "swift_events_login";

// MySQL database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

//variables for update and delete functions in organizer dahsboard
$change = false;
$id = 0;

if (!$connection) {
    die("<script> alert('connection failed')</script>");
}

//deleteing an event
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $del = "DELETE from events WHERE event_ID = $id";
    mysqli_query($connection, $del);

    echo '<script> alert("EVENT DELETED");
    window.location.href="organizer.php";
    </script>';
}
//updating an event
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $change = true;
    $update = "SELECT * from events WHERE event_ID = $id";
    $result = mysqli_query($connection, $update);

    $row = mysqli_fetch_array($result);
    $eventName = $row['event_name'];
    $eventType = $row['event_type'];
    $eventColor = $row['event_color'];
    $eventImg = $row['event_img'];
    $eventLocation = $row['event_location'];
    $eventStart = $row['event_start'];
    $eventTime = $row['event_time'];
    $eventEnd = $row['event_end'];
    $eventDuration = $row['event_duration'];
}
//deleting an event
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $eventName = $_POST['eventName'];
    $eventType = $_POST['eventType'];
    $eventColor = $_POST['colTemp'];
    $eventImg = $_POST['eventImage'];
    $eventLocation = $_POST['eventLocation'];
    $eventStart = $_POST['eventDateS'];
    $eventTime = $_POST['eventTime'];
    $eventEnd = $_POST['eventDateE'];
    $eventDuration = $_POST['eventDuration'];

    mysqli_query($connection, "UPDATE events SET event_name = '$eventName', event_type = '$eventType',event_color = '$eventColor', 
    event_img = '$eventImg', event_location = '$eventLocation', event_start = '$eventStart', event_time = '$eventTime',event_end = '$eventEnd', event_duration = '$eventDuration' WHERE event_ID = $id");

    echo '<script> alert("EVENT UPDATED");
    window.location.href="organizer.php";
    </script>';
}
// //viewing reserved event
// if (isset($_GET['view'])) {
//     $id = $_GET['view'];
//     $view = "SELECT * from reservations WHERE Event_ID = $id";
//     $result = mysqli_query($connection, $view);

//     header ("Location: viewEvent.php"); //redirecting to the view page

// }
