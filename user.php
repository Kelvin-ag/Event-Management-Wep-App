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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swift-Events| users</title>
    <link rel="icon" href="./images/1530513141.svg" type="image/x-icon"> <!-- adding logo to the document title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="organizer.css">
</head>

<body>

    <!-- navbar brand for company logo, background colour light, margin set to 0 -->
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
                        <a class="nav-link active" aria-current="page" href="user.php">Home</a>
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
                <!-- display flex, flow row reverse to fix register and sign up on the far right -->
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <!-- saying hello to the user who is curreenly logged in, and making the first letter uppercase and the rest lowercase -->
                        <?php echo "<span id='welcome'>Hi, " . ucfirst(strtolower($_SESSION['user_firstName'])) . "</span>"; ?>
                        <button type="submit"><a id="register" href="logout.php">Logout</a></button>
                    </div>
                </div>
            </div>
    </nav>
    <div class="container">
        <div class="dashboard">
            <h1>Your Dashboard</h1>
            <!-- user dashboard using Bootstrap pills classes -->
            <div class="d-flex align-items-start">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="true">Account Info</button>
                    <button class="nav-link" id="v-pills-upcoming-tab" data-bs-toggle="pill" data-bs-target="#v-pills-upcoming" type="button" role="tab" aria-controls="v-pills-upcoming" aria-selected="false">Your Events</button>
                    <button class="nav-link" id="v-pills-contact-tab" data-bs-toggle="pill" data-bs-target="#v-pills-contact" type="button" role="tab" aria-controls="v-pills-contact" aria-selected="false">Contact Form</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab">
                        <?php
                        //echo users data in a table
                        echo "<table>";
                        echo "<tr>";
                        echo "<td>First Name:</td>";
                        echo "<td>" . strtoupper(($data['user_firstName'])) . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Last Name:</td>";
                        echo "<td>" . strtoupper(($data['user_lastName'])) . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Phone#:</td>";
                        echo "<td> (+233)" . strtoupper(($data['user_phoneNumber'])) . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>User Type:</td>";
                        echo "<td>" . strtoupper(($data['user_class'])) . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td>Date Registered:</td>";
                        echo "<td> ` " . strtoupper(($data['date'])) . " `  </td>";
                        echo "</tr>";
                        echo "</table>";
                        ?>
                    </div>
                    <!-- user events tab -->
                    <div class="tab-pane fade" id="v-pills-upcoming" role="tabpanel" aria-labelledby="v-pills-upcoming-tab">
                        <div class="card">
                            <div class="card-image8">
                            </div>
                            <div class="card-body">
                                <h3 style="background-color: #f5eff5">FRUIT PICKING EXCURSION</h3>
                                <span>Venue: Volta Region<br>
                                    Date: Aug 12th 2021<br>
                                    Start time: 10:00 am <br>
                                    Duration: 6 Hours
                                </span>
                                <button class="cardbtn"><a id="cardexplore" href="#">Cancel</a></button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-image2">
                            </div>
                            <div class="card-body">
                                <h3 style="background-color: #7cb8fc">COOKING WEBINAR</h3>
                                <span>Venue: Online<br>
                                    Date: May 6th 2021<br>
                                    Start time: 2:00 pm <br>
                                    Duration: 3 Hours
                                </span>
                                <button class="cardbtn"><a id="cardexplore" href="#">Cancel</a></button>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-image3">
                            </div>
                            <div class="card-body">
                                <h3 style="background-color: #fcc47c">TECH WEEK</h3>
                                <span>Venue: GCTU Abeka Campus<br>
                                    Date: June 16th 2021<br>
                                    Start time: 8:00 am <br>
                                    Duration: 1 week
                                </span>
                                <button class="cardbtn"><a id="cardexplore" href="#">Cancel</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-contact" role="tabpanel" aria-labelledby="v-pills-contact-tab">
                        <div class="row">
                            <form class="contact-form col-6" action="">
                                <div class="contact-form">
                                    <input class="contact-form-item" type="text" placeholder="Name" title="contact name" required>
                                    <input class="contact-form-item" type="email" placeholder="Email" title="email address" required>
                                </div>
                                <div class="contact-form">
                                    <input class="contact-form-item" type="text" placeholder="subject" id="contactsubject">
                                </div>
                                <div class="contact-form">
                                    <textarea class="contact-form-item" name="message" id="" cols="40" rows="5" placeholder="Your Message"></textarea>
                                </div>
                                <div>
                                    <button id="contact-bttn" type="submit">Send Message</button>
                                </div>
                            </form>
                            <div class="reachUs col-6">
                                <h3>Reach Us</h3>
                                <!-- svg Bootstrap icons icons -->
                                <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    </svg><span>Greater Accra, Accra, Ghana</span></div>
                                <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg><span>(+233)241417865</span></div>
                                <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                    </svg><span>agarak@coventry.co.uk</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <div class="container">
        <footer>
            <p>
                Copyright &copy 2021 || Designed by Mozi Kelvin Agara || Student at
                <a title="Ghana Communications Technology University" href="https://site.gctu.edu.gh/">GCTU</a>
            </p>
        </footer>
    </div>
    <!-- imported script for a scrolled navbar -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Boostrap javascript plugins -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- function to change color of navbar when scrolled -->
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