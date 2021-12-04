<!DOCTYPE html>
<?php
        session_start();
        error_reporting(0);
        ob_start();
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
	    <link rel="stylesheet" type="text/css" href="admin_home.css">

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
                        <li class="active"> <a href="#viewprofile" class="text-decoration-none d-flex align-items-start" onclick="opentab(event, 'viewprofile')">
                                <div class="fas fa-box pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">View Profile</div>
                                    <div class="link-desc">Includes your personal information</div>
                                </div>
                            </a> </li>
                        <li> <a href="#addcandidate" class="text-decoration-none d-flex align-items-start" onclick="opentab(event, 'AddCandidate')">
                                <div class="fas fa-box-open pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Submit a vote</div>
                                    <div class="link-desc">Start voting</div>
                                </div>
                            </a> </li>
                        <li> <a href="#viewvoters" class="text-decoration-none d-flex align-items-start" onclick="opentab(event, 'ViewVoters')">
                                <div class="far fa-address-book pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">View Ballot</div>
                                    <div class="link-desc">View who you voted</div>
                                </div>
                            </a> </li>
                        <li> <a href="#viewresults" class="text-decoration-none d-flex align-items-start" onclick="opentab(event, 'CheckResults')">
                                <div class="far fa-user pt-2 me-3"></div>
                                <div class="d-flex flex-column">
                                    <div class="link">Settings</div>
                                    <div class="link-desc">Reset password and change image</div>
                                </div>
                            </a> </li>
                    </ul>
                </div>
            </div>

            <script type="text/javascript">
            function opentab(evt, tabName) {
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
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            </script>

            <div id="viewprofile" class="tabcontent">
            <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th> First Name </th>
                            <th> Middle Name </th>
                            <th> Last Name </th>
                            <th> Position </th>
                            <th> Year Level </th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'phpfinals');
                        if($conn->connect_error)
                        {
                            echo "$conn->connect_error";
                            die("Connection Failed : ".$conn->connect_error);
                        }

                        $selectall = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` != ''");

                        while($row = mysqli_fetch_assoc($selectall)) 
                        {
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td>" . $row['firstname']   . "</td>";
                            echo "<td>" . $row['middlename']  . "</td>";
                            echo "<td>" . $row['lastname']    . "</td>";
                            echo "<td>" . $row['position']  . "</td>";
                            echo "<td>" . $row['yearlevel'] . "</td>";
                            echo "<td>" . "<a href = 'edit_candidate.php'><input type = button value = 'Edit' name = edit>" .
                                          "<a href = 'view_candidate.php'><input type = button value = 'View' name = view>" . 
                                          "<a href = 'delete_candidate.php'><input type = button value = 'Delete' name = delete>"; 
                            echo "</td>";
                            echo "</tr>";
                        }   
                    
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>

            <div id="AddCandidate" class="tabcontent">
            <p>Add Candidate.</p>
            </div>

            <div id="ViewVoters" class="tabcontent">
            <div class="table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th> First Name </th>
                            <th> Middle Name </th>
                            <th> Last Name </th>
                            <th> Year Level </th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'phpfinals');
                        if($conn->connect_error)
                        {
                            echo "$conn->connect_error";
                            die("Connection Failed : ".$conn->connect_error);
                        }

                        $selectall = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `yearlevel` FROM phpfinals.records WHERE `position` = '' AND `accesslevel` = 'user'");

                        while($row = mysqli_fetch_assoc($selectall)) 
                        {
                            echo "<tr>";
                            echo "<td></td>";
                            echo "<td>" . $row['firstname']   . "</td>";
                            echo "<td>" . $row['middlename']  . "</td>";
                            echo "<td>" . $row['lastname']    . "</td>";
                            echo "<td>" . $row['yearlevel'] . "</td>";
                            echo "<td>" . "<a href = 'edit_candidate.php'><input type = button value = 'Edit' name = edit>" .
                                          "<a href = 'view_candidate.php'><input type = button value = 'View' name = view>" . 
                                          "<a href = 'delete_candidate.php'><input type = button value = 'Delete' name = delete>"; 
                            echo "</td>";
                            echo "</tr>";
                        }   
                    
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>

            <div id="CheckResults" class="tabcontent">
            <p>View Voters.</p>
            </div>

            
        </div>
    </div>
    </body>
</html>