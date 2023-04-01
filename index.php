<?php

include 'connect.php';

session_start();  //starting php session

error_reporting(0);

if (isset($_SESSION['user_firstName'])) {
    header ("Location: signin.php"); //redirecting  user to signin page if they are already signed in
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Swift-Events | Official site</title>
    <link rel="icon" href="./images/1530513141.svg" type="image/x-icon"> <!-- adding logo to the document title -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com"> <!-- using a google font on page -->
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- Bootstrap navbar brand for company logo, background colour light, margin set to 0 -->
    <nav id="mainNav" class="navbar sticky-top navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" id="logo">
                <img src="./images/1530513141.svg" alt="" width="50" height="38"> SWIFT-EVENTS
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-4 px-5">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Events We Offer
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Parties</a></li>
                            <li><a class="dropdown-item" href="#">Seminars</a></li>
                            <li><a class="dropdown-item" href="#">Weddings</a></li>
                            <li><a class="dropdown-item" href="#">School Reunion</a></li>
                            <li><a class="dropdown-item" href="events.php">View Our Events</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <!-- calling a javascript function to lert user to signup before creating events -->
                        <a id="create" onclick="register()" class="nav-link" href="index.php">Create Event</a> 
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactUs">Contact</a>
                    </li>
                </ul>
                <!-- simple google search bar-->
                <form action="https://www.google.com/search" class="d-flex">
                    <input type="search" name="q" placeholder="Google Search..." aria-label="Search">
                    <button id="seearchBtn">Search</button>
                </form>
                <!-- display flex, flow row reverse to fix register and sign up on the far right -->
                <div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <button type="submit"><a id="signin" href="signin.php">Login</a></button>
                        <button type="submit"><a id="register" href="signup.php">Register</a></button>
                    </div>
                </div>
            </div>
    </nav>
    <main>
        <!-- welcome header to website -->
        <div class="container">
            <div class="main">
                <div class="main-heading">
                    <h1 class="title">Discover</h1>
                    <h2 class="subtitle">Events all around you ...</h2>
                </div>
                <div>
                    <button class="explorer"><a id="explore" href="events.php">Explore Events</a></button>
                </div>
            </div>
        </div>
    </main>
    <!-- displaying the event cards section -->
    <section>
        <div class="container"> 
            <div class="secondsection">
                <h1>Explore Trending Events...</h1>
                <div class="row">
                    <div class="card">
                        <div class="card-image" style="background-image: url(./images/game.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #abfc7c">GAMING CONFERENCE</h3>
                            <span>Venue: Online<br>
                                Date: Aug 27th 2021<br>
                                Start time: 5:00 pm <br>
                                Duration: 10 Hours
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore" href="#">Attend</a></button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image " style="background-image: url(./images/cooking.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #7cb8fc">COOKING WEBINAR</h3>
                            <span>Venue: Online<br>
                                Date: May 6th 2021<br>
                                Start time: 2:00 pm <br>
                                Duration: 3 Hours
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore" href="#">Attend</a></button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image" style="background-image: url(./images/techweek.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #fcc47c">TECH WEEK</h3>
                            <span>Venue: GCTU Abeka Campus<br>
                                Date: June 16th 2021<br>
                                Start time: 8:00 am <br>
                                Duration: 1 week
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore" href="#">Attend</a></button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image" style="background-image: url(./images/blockparty.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #7cdefc">BLOCK PARTY</h3>
                            <span>Venue: Accra Mall<br>
                                Date: June 20th 2021<br>
                                Start time: 7:00 pm <br>
                                Duration: 6 Hours
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore" href="#">Attend</a></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="secondsection">
                <div class="row">
                    <div class="card">
                        <div class="card-image" style="background-image: url(./images/soccer.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #fc7c7c">TEACHER'S EXHIBITION GAME</h3>
                            <span>Venue: GCTU Tesano Campus<br>
                                Date: May 2nd 2021<br>
                                Start time: 12:00 pm <br>
                                Duration: 3 Hours
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore" href="#">Attend</a></button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image" style="background-image: url(./images/bookclub.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #ed7cfc">ACCRA BOOK CLUB</h3>
                            <span>Venue: Online<br>
                                Date: Jul 6th 2021<br>
                                Start time: 3:00 pm <br>
                                Duration: 1.5 Hours
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore" href="#">Attend</a></button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image" style="background-image: url(./images/womenempower.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #fcef7c">WOMEN EMPOWERMENT DAY</h3>
                            <span>Venue: North Kaneshie<br>
                                Date: June 23rd 2021<br>
                                Start time: 7:00 am <br>
                                Duration: 8 Hours
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore" href="#">Attend</a></button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-image" style="background-image: url(./images/fruitpicking.jpg);">
                        </div>
                        <div class="card-body">
                            <h3 style="background-color: #f5eff5">FRUIT PICKING EXCURSION</h3>
                            <span>Venue: Volta Region<br>
                                Date: Aug 12th 2021<br>
                                Start time: 10:00 am <br>
                                Duration: 6 Hours
                            </span>
                            <button class="cardbtn"><a onclick="attend()" id="cardexplore">Attend</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootrtap Carousel class -->
    <section>
        <div class="container">
            <div class="carousel slide carousel-fade mt-0" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./images/cara1.jpg" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/cara2.jpg" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/cara3.jpg" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/cara4.jpg" class="d-block w-100" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/cara5.jpg" class="d-block w-100" alt="">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- contact form to reach company -->
    <section>
        <div class="container">
            <div class="contactsection row">
                <div class="col-md-6">
                    <a name="contactUs">
                        <h3>Contact Us</h3>
                    </a>
                    <form class="contact-form" action="">
                        <div class="contact-form">
                            <input class="contact-form-item" type="text" placeholder="Name" title="contact name"
                                required>
                            <input class="contact-form-item" type="email" placeholder="Email" title="email address"
                                required>
                        </div>
                        <div class="contact-form">
                            <input class="contact-form-item" type="text" placeholder="subject" id="contactsubject">
                        </div>
                        <div class="contact-form">
                            <textarea class="contact-form-item" name="message" id="" cols="40" rows="5"
                                placeholder="Your Message"></textarea>
                        </div>
                        <div>
                            <button id="contact-bttn" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="reachUs col-md-6">
                    <h3>Reach Us At</h3>
                    <!-- svg Bootstrap icons icons -->
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg><span>Greater Accra, Accra, Ghana</span></div>
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-telephone-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                        </svg><span>(+233)241417865</span></div>
                    <div><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-envelope-fill" viewBox="0 0 16 16">
                            <path
                                d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                        </svg><span>agarak@coventry.co.uk</span></div>
                </div>
            </div>
        </div>
    </section>
    <!-- About section, not linked to any page -->
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
                                <td rowspan="2"><img src="./images/1530513141.svg" alt="" width="50" height="38"><span
                                        id="tabLogo"><a name="About">SWIFT-EVENTS</a></span></td>
                                <td class="about-item">Our Features</td>
                                <td class="about-item">Background</td>
                                <td><svg id="tabSVG" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                        <path
                                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                    </svg></td>
                            </tr>
                            <tr>
                                <td class="about-item">Services</td>
                                <td class="about-item">Learn more</td>
                                <td valign="center"><svg id="tabSVG" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                    </svg></td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- footer section -->
    <div class="container">
        <footer>
            <p>
                Copyright &copy 2021 || Designed by Mozi Kelvin Agara || Student at <a
                    title="Ghana Communications Technology University" href="https://site.gctu.edu.gh/">GCTU</a>
            </p>
        </footer>
    </div>
    <!-- imported script for a scrolled navbar -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <!-- Boostrap javascript plugins -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>

        <!-- function to prompt user to register before they can create event -->
    <script>
        function register () {
            document.getElementById ("create").onclick = alert("must be a registered organizer to create event");
        }
    </script>
    <!-- function to prompt user to register before they can create event -->
    <script>
        function attend () {
            document.getElementById ("cardexplore").onclick = alert("must be a registered to attend");
        }
    </script>
    <!-- function to change navbar color when scrolling, initialized with the nav id -->
    <script>
        $(function () {
            $(document).scroll(function () {
                var $nav = $("#mainNav");
                $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
            });
        });
    </script>
</body>

</html>