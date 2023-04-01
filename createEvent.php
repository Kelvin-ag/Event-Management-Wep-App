<?php

include 'connect.php';

error_reporting(0); //turning off error reporting

session_start();


if (isset($_POST['submit'])) {

    $eventName = $_POST['eventName'];
    $eventType = $_POST['eventType'];
    $eventColor = $_POST['colTemp'];
    $eventImg = $_POST['eventImage'];
    $eventLocation = $_POST['eventLocation'];
    $eventStart = $_POST['eventDateS'];
    $eventTime = $_POST['eventTime'];
    $eventEnd = $_POST['eventDateE'];
    $eventDuration = $_POST['eventDuration'];

    if (isset($_POST['onlineEvent']))
        $eventLocation = $_POST['onlineEvent'];

    $sql = "INSERT INTO events (event_name, event_type, event_color, event_img, event_location, event_start, event_time, event_end, event_duration)
            VALUES('$eventName', '$eventType', '$eventColor', '$eventImg', '$eventLocation', '$eventStart', '$eventTime', '$eventEnd', '$eventDuration')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo '<script> alert("Event Created");
        window.location.href="organizer.php";
        </script>';
    } else {
        echo "<script>alert('Something went Wrong')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swift-Events | Create Event</title>
    <link rel="icon" href="./images/1530513141.svg" type="image/x-icon"> <!-- adding logo to the document title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="createEvent.css">
</head>

<body>
    <!-- navbar brand for company logo, background colour light, margin right set to 0 -->
    <nav id="mainNav" class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" id="logo">
                <img src="./images/1530513141.svg" alt="" width="50" height="38"> SWIFT-EVENTS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-4 px-5">
                    <li class="nav-item">
                        <a class="nav-link" href="organizer.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logged_events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">About</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input type="search" placeholder="Search" aria-label="Search">
                    <button id="seearchBtn" type="submit">Search</button>
                </form>
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <!-- saying hello to the user who is curreenly logged in, and making the first letter uppercase and the rest lowercase -->
                        <?php echo "<span id='welcome'>Hi, " . ucfirst(strtolower($_SESSION['user_firstName'])) . "</span>"; ?>
                        <button type="submit"><a id="register" href="logout.php">Logout</a></button>
                    </div>
                </div>
            </div>
    </nav>
    <section>
        <div class="container">
            <div class="inside">
                <h1 class="display-1">Create<span id="green">Your</span><span id="blue">Event</span></h1>
                <form id="eventForm" action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="events">
                        <label for="eventName">Event Name:</label>
                        <input type="text" name="eventName" id="eventName" value="<?php echo $eventName; ?>" required>
                    </div>
                    <div class="events">
                        <label for="eventType">Event Type:</label>
                        <select name="eventType" id="eventType" value="<?php echo $eventType; ?>" required>
                            <option value="">Select</option>
                            <option value="sports">Sporting Event</option>
                            <option value="Vgames">Video Gaming Event</option>
                            <option value="seminar">Seminar</option>
                            <option value="class">School</option>
                            <option value="excursion">School Exscursion</option>
                            <option value="webinar">Webinar</option>
                            <option value="cooking">Cooking Expose</option>
                            <option value="party">Party</option>
                            <option value="">Other</option>
                        </select>
                        <!-- <input type="text" name="othertype" placeholder="otherwise state ...">  -->
                    </div>
                    <div class="events">
                        <label for="colTemp">Pick a Color Template for youe Event</label>
                        <input type="color">
                        <input type="text" id="colTemp" name="colTemp" placeholder="copy the hex value in here" value="<?php echo $eventColor; ?>" required>
                    </div>
                    <div class="events">
                        <label for="eventImage">Event Cover Image URL/Image Address</label>
                        <input type="text" name="eventImage" id="eventImage" value="<?php echo $eventImg; ?>" required>
                    </div>
                    <div class="events">
                        <label for="eventLocation">Location:</label>
                        <input type="text" name="eventLocation" id="eventLocation" value="<?php echo $eventLocation; ?>">
                        <label for="online">Online</label>
                        <input type="checkbox" id="online" name="onlineEvent" value="online">
                    </div>
                    <div class="events">
                        <label for="eventDateS">Event start Date:</label>
                        <input type="date" name="eventDateS" id="eventDateS" value="<?php echo $eventStart; ?>" required>
                    </div>
                    <div class="events">
                        <label for="eventTime">Start Time:</label>
                        <input type="time" name="eventTime" id="eventTime" value="<?php echo $eventStart; ?>" required>
                    </div>
                    <div class="events">
                        <label for="eventDateE">Event End Date:</label>
                        <input type="date" name="eventDateE" id="eventDateE" value="<?php echo $eventEnd; ?>" required>
                    </div>
                    <div class="events">
                        <label for="eventDuration">Duration:</label>
                        <input type="text" name="eventDuration" id="eventDuration" placeholder="weeks, days, hours, minutes" value="<?php echo $eventDuration; ?>">
                    </div>
                    <?php if ($change == true){ ?>
                        <button id="eventButton" name="update" type="submit">UPDATE</button>
                    <?php
                     } else { ?>
                    <button id="eventButton" name="submit" type="submit">CREATE</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="about">
                <table cellpadding="20">
                    <thead">
                        <tr>
                            <th> </th>
                            <th>Company</th>
                            <th>About</th>
                            <th>Social Media</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td rowspan="2"><img src="./images/1530513141.svg" alt="" width="50" height="38"><span id="tabLogo"><a name="About">SWIFT-EVENTS</a></span></td>
                                <td class="about-item">Our Features</td>
                                <td class="about-item">Background</td>
                                <td><svg id="tabSVG" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg></td>
                            </tr>
                            <tr>
                                <td class="about-item">Services</td>
                                <td class="about-item">Learn more</td>
                                <td valign="center"><svg id="tabSVG" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </section>
    <div class="container">
        <footer>
            <p>
                Copyright &copy 2021 || Designed by Mozi Kelvin Agara || Student at <a title="Ghana Communications Technology University" href="https://site.gctu.edu.gh/">GCTU</a>
            </p>
        </footer>
    </div>
    <!-- imported script for a scrolled navbar -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Boostrap javascript plugins -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $(document).scroll(function() {
                var $nav = $("#mainNav");
                $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
            });
        });
    </script>
</body>

</html>