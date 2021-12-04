<!DOCTYPE html>
<?php
        session_start();
        error_reporting(0);
?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.7.2/css/all.css"></script>
        
        	<!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

        <!-- External CSS -->
	    <link rel="stylesheet" type="text/css" href="user_home.css">
        
        <title>Voter</title>
    </head>
    <body>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <a class="navbar-brand" href="#">
            <div class="d-flex">
                <div class="ms-3 d-flex flex-column">
                    <!-- <img src="images/logo.png"> -->
                    <div class="h4"> <img src="images/logo.png" class="logo"> Voter Dashboard </div>
                </div>
            </div>
        </a>
        <div class="collapse navbar-collapse" id="mynav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"> <a class="nav-link active" aria-current="page" href="logout.php">Logout <span class="fas fa-th-large px-1"></span></a> </li>
        </div>
    </div>
    </nav>

    <div class="container mt-4">
        <div class="row">

            <!-- Menu -->
            <div class="tab">
                <button class="tablinks" onclick="openTab(event, 'ViewProfile')" id = "defaultOpen">View Profile</button>
                <button class="tablinks" onclick="openTab(event, 'SubmitVote')">Submit a Vote</button>
                <button class="tablinks" onclick="openTab(event, 'ViewBallot')">View Ballot</button>
                <button class="tablinks" onclick="openTab(event, 'Profile Settings')">Profile Settings</button>
            </div>

            <!-- View Profile -->
            <div id="ViewProfile" class="tabcontent">
                <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                    <h3 class="dark-color">About Me</h3>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                        <label>Student Number</label>
                                        <p>4th april 1998</p>
                                </div>
                                <div class="media">
                                        <label>Status</label>
                                        <p>22 Yr</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Year Level</label>
                                    <p>info@domain.com</p>
                                </div>
                                <div class="media">
                                    <label>Gender</label>
                                    <p>820-885-3321</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="profilepic">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png">
                    </div>
                </div>
                </div>
            </div>

            <div id="SubmitVote" class="tabcontent">
                        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                    <div class="about-text go-to">
                    <h3 class="dark-color">About Me</h3>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                        <label>Student Number</label>
                                        <p>4th april 1998</p>
                                </div>
                                <div class="media">
                                        <label>Status</label>
                                        <p>22 Yr</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Year Level</label>
                                    <p>info@domain.com</p>
                                </div>
                                <div class="media">
                                    <label>Gender</label>
                                    <p>820-885-3321</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="profilepic">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png">
                        </div>
                    </div>
                </div>
                
            </div>

            <div id="ViewBallot" class="tabcontent">
                        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                    <div class="about-text go-to">
                    <h3 class="dark-color">About Me</h3>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                        <label>Student Number</label>
                                        <p>4th april 1998</p>
                                </div>
                                <div class="media">
                                        <label>Status</label>
                                        <p>22 Yr</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Year Level</label>
                                    <p>info@domain.com</p>
                                </div>
                                <div class="media">
                                    <label>Gender</label>
                                    <p>820-885-3321</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="profilepic">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png">
                        </div>
                    </div>
                </div>
            </div>

            <div id="Profile Settings" class="tabcontent">
                        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                    <div class="about-text go-to">
                    <h3 class="dark-color">About Me</h3>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                        <label>Student Number</label>
                                        <p>4th april 1998</p>
                                </div>
                                <div class="media">
                                        <label>Status</label>
                                        <p>22 Yr</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Year Level</label>
                                    <p>info@domain.com</p>
                                </div>
                                <div class="media">
                                    <label>Gender</label>
                                    <p>820-885-3321</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="profilepic">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png">
                        </div>
                    </div>
                </div>
                
            </div>


            <script>
            function openTab(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }

            function openTabh(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontenth");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and id="defaultOpen1" and click on it
            document.getElementById("defaultOpen").click();
            document.getElementById("defaultOpen1").click();

            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("all13");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on the button, open the modal
            btn.onclick = function() {
            modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
            modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal){
                    modal.style.display = "none";
                }
            }
            </script>
    </body>
</html>