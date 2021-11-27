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
                    <div class="h4"> <img src="images/logo.png"> Voter Dashboard </div>
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
            <div class="col-lg-3 my-lg-0 my-md-1">
                <div id="sidebar" class="bg-blue">
                    <div class="h4 text-white">Account</div>
                    <ul>
                        <li class="active"> <a href="#profile" class="text-decoration-none d-flex align-items-start" onclick="openCity(event, 'London')">
                                <div class="fas fa-box pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">My Profile</div>
                                    <div class="link-desc">View your information and status</div>
                                </div>
                            </a> </li>
                        <li> <a href="#vote" class="text-decoration-none d-flex align-items-start" onclick="openCity(event, 'Paris')">
                                <div class="fas fa-box-open pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Submit a Vote</div>
                                    <div class="link-desc">Choose the right candidates and vote</div>
                                </div>
                            </a> </li>
                        <li> <a href="#ballot" class="text-decoration-none d-flex align-items-start" onclick="openCity(event, 'Tokyo')">
                                <div class="far fa-address-book pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Official Ballot</div>
                                    <div class="link-desc">View the ballot you submitted</div>
                                </div>
                            </a> </li>
                        <li> <a href="#settings" class="text-decoration-none d-flex align-items-start" onclick="openCity(event, 'London')">
                                <div class="far fa-user pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Settings</div>
                                    <div class="link-desc">Change your profile details & password</div>
                                </div>
                            </a> </li>
                    </ul>
                </div>
            </div>

            <script type="text/javascript">
            function openCity(evt, cityName) {
                // Declare all variables
                var i, tabcontent, tablinks;
            
                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                }
            
                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
            
                // Show the current tab, and add an "active" class to the link that opened the tab
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            </script>

            <div id="London" class="tabcontent">
            <div class="col-lg-9 my-lg-0 my-1">
                    <div id="main-content" class="bg-white border">
                        <div class="d-flex flex-column">
                            <div class="h5">Hello Jhon,</div>
                            <div>Logged in as: someone@gmail.com</div>
                        </div>
                        <div class="d-flex my-4 flex-wrap">
                            <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/box-png/cardboard-box-brown-vector-graphic-pixabay-2.png" alt="">
                                <div class="d-flex align-items-center mt-2">
                                    <div class="tag">Orders placed</div>
                                    <div class="ms-auto number">10</div>
                                </div>
                            </div>
                            <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/shopping-cart-png/shopping-cart-campus-recreation-university-nebraska-lincoln-30.png" alt="">
                                <div class="d-flex align-items-center mt-2">
                                    <div class="tag">Items in Cart</div>
                                    <div class="ms-auto number">10</div>
                                </div>
                            </div>
                            <div class="box me-4 my-1 bg-light"> <img src="https://www.freepnglogos.com/uploads/love-png/love-png-heart-symbol-wikipedia-11.png" alt="">
                                <div class="d-flex align-items-center mt-2">
                                    <div class="tag">Wishlist</div>
                                    <div class="ms-auto number">10</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-uppercase">My recent orders</div>
                        <div class="order my-3 bg-light">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column justify-content-between order-summary">
                                        <div class="d-flex align-items-center">
                                            <div class="text-uppercase">Order #fur10001</div>
                                            <div class="blue-label ms-auto text-uppercase">paid</div>
                                        </div>
                                        <div class="fs-8">Products #03</div>
                                        <div class="fs-8">22 August, 2020 | 12:05 PM</div>
                                        <div class="rating d-flex align-items-center pt-1"> <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png" alt=""><span class="px-2">Rating:</span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                        <div class="status">Status : Delivered</div>
                                        <div class="btn btn-primary text-uppercase">order info</div>
                                    </div>
                                    <div class="progressbar-track">
                                        <ul class="progressbar">
                                            <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                            <li id="step-2" class="text-muted green"> <span class="fas fa-check"></span> </li>
                                            <li id="step-3" class="text-muted green"> <span class="fas fa-box"></span> </li>
                                            <li id="step-4" class="text-muted green"> <span class="fas fa-truck"></span> </li>
                                            <li id="step-5" class="text-muted green"> <span class="fas fa-box-open"></span> </li>
                                        </ul>
                                        <div id="tracker"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="order my-3 bg-light">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="d-flex flex-column justify-content-between order-summary">
                                        <div class="d-flex align-items-center">
                                            <div class="text-uppercase">Order #fur10001</div>
                                            <div class="green-label ms-auto text-uppercase">cod</div>
                                        </div>
                                        <div class="fs-8">Products #03</div>
                                        <div class="fs-8">22 August, 2020 | 12:05 PM</div>
                                        <div class="rating d-flex align-items-center pt-1"> <img src="https://www.freepnglogos.com/uploads/like-png/like-png-hand-thumb-sign-vector-graphic-pixabay-39.png" alt=""><span class="px-2">Rating:</span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="far fa-star"></span> </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-sm-flex align-items-sm-start justify-content-sm-between">
                                        <div class="status">Status : Delivered</div>
                                        <div class="btn btn-primary text-uppercase">order info</div>
                                    </div>
                                    <div class="progressbar-track">
                                        <ul class="progressbar">
                                            <li id="step-1" class="text-muted green"> <span class="fas fa-gift"></span> </li>
                                            <li id="step-2" class="text-muted"> <span class="fas fa-check"></span> </li>
                                            <li id="step-3" class="text-muted"> <span class="fas fa-box"></span> </li>
                                            <li id="step-4" class="text-muted"> <span class="fas fa-truck"></span> </li>
                                            <li id="step-5" class="text-muted"> <span class="fas fa-box-open"></span> </li>
                                        </ul>
                                        <div id="tracker"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div id="Paris" class="tabcontent">
            <h3>Paris</h3>
            <p>Paris is the capital of France.</p>
            </div>

            <div id="Tokyo" class="tabcontent">
            <h3>Tokyo</h3>
            <p>Tokyo is the capital of Japan.</p>
            </div>

            <section id="vote">
            </section>

            <section id="ballot">
            </section>

            <section id="settings">
            </section>
        </div>
    </div>
    </body>
</html>