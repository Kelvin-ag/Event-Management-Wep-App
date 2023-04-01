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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <!-- navbar brand for company logo, background colour light, margin set to 0 -->
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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a id="create" class="nav-link active" aria-current="page" href="events.php">Events</a>
                    </li>
                    <li class="nav-item">
                        <a id="create" onclick="register()" class="nav-link" href="events.php">Create Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#contactUs">Contact</a>
                    </li>
                </ul>
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

    <!-- javascript functions -->
    <script>
        function register() {
            document.getElementById("create").onclick = alert("must be a registered organizer to create event");
        }
    </script>
    <script>
        function attend() {
            document.getElementById("cardexplore").onclick = alert("must be a registered to attend");
        }
    </script>

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