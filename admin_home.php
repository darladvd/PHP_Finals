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
	    <link rel="stylesheet" type="text/css" href="admin_home.css">
        
        <title>Admin</title>
    </head>
    <body>
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container"> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <a class="navbar-brand" href="#">
            <div class="d-flex">
                <div class="ms-3 d-flex flex-column">
                    <!-- <img src="images/logo.png"> -->
                    <div class="h4"> <img src="images/logo.png"> Admin Dashboard </div>
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
            <button class="tablinks" onclick="openTab(event, 'ViewCandidates')" id = "defaultOpen">View Candidates</button>
            <button class="tablinks" onclick="openTab(event, 'AddCandidate')">Add Candidate</button>
            <button class="tablinks" onclick="openTab(event, 'ViewVoters')">View Voters</button>
            <button class="tablinks" onclick="openTab(event, 'CheckResults')">Check Results</button>
            </div>

            <div id="ViewCandidates" class="tabcontent">
                <!-- Tab links -->
                <div class="tabh">
                <button class="tablinks" onclick="openTabh(event, 'Allcand')" id = "defaultOpen1">All Candidates</button>
                <button class="tablinks" onclick="openTabh(event, 'Pres')">President</button>
                <button class="tablinks" onclick="openTabh(event, 'VPInt')">VP Internal</button>
                <button class="tablinks" onclick="openTabh(event, 'VPExt')">VP External</button>
                <button class="tablinks" onclick="openTabh(event, 'Sec')">Secretary</button>
                <button class="tablinks" onclick="openTabh(event, 'Treas')">Treasurer</button>
                <button class="tablinks" onclick="openTabh(event, 'Audit')">Auditor</button>
                <button class="tablinks" onclick="openTabh(event, 'PRO')">P.R.O.</button>
                </div>

                <div id="Allcand" class="tabcontenth">
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
                        $str = "all";
                        function disp($stmnt, $string)
                        {
                            $counter = 1;
                            while($row = mysqli_fetch_assoc($stmnt)) 
                            {
                                echo "<tr>";
                                echo "<td></td>";
                                echo "<td>" . $row['firstname']   . "</td>";
                                echo "<td>" . $row['middlename']  . "</td>";
                                echo "<td>" . $row['lastname']    . "</td>";
                                echo "<td>" . $row['position']  . "</td>";
                                echo "<td>" . $row['yearlevel'] . "</td>";
                                echo "<td>" . "<button id='" . $string . $counter . "'>Edit</button>" .
                                              "<button id='" . $string . $counter . "'>View</button>" .
                                              "<button id='" . $string . $counter . "'>Delete</button>";
                                echo "</td>";
                                echo "</tr>";
                                $counter += 1;
                            }   
                        }
                        
                        disp($selectall, $str);
                    ?>
                    
                    

                    </tbody>
                    </table>
                </div>

                <div id="Pres" class="tabcontenth">
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
                        $selectpres = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'President'");
                        $str = "all";
                        disp($selectpres, $str);
                    ?>
                    </tbody>
                </table>
                </div>

                <div id="VPInt" class="tabcontenth">
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
                        $selectvpint = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Vice President Internal'");
                        $str = "all";
                        disp($selectvpint, $str);
                    ?>
                    </tbody>
                </table>
                </div>

                <div id="VPExt" class="tabcontenth">
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
                        $selectvpext = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Vice President External'");
                        $str = "all";
                        disp($selectvpext, $str);
                    ?>
                    </tbody>
                </table>
                </div>

                <div id="Sec" class="tabcontenth">
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
                        $selectsec = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Secretary'");
                        $str = "all";
                        disp($selectsec, $str);
                    ?>
                    </tbody>
                </table>
                </div>

                <div id="Treas" class="tabcontenth">
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
                        $selecttreas = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Treasurer'");
                        $str = "all";
                        disp($selecttreas, $str);
                    ?>
                    </tbody>
                </table>
                </div>

                <div id="Audit" class="tabcontenth">
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
                        $selectaudit = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Auditor'");
                        $str = "all";
                        disp($selectaudit, $str);
                    ?>
                    </tbody>
                </table>
                </div>

                <div id="PRO" class="tabcontenth">
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
                        $selectpro= mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'PRO'");
                        $str = "all";
                        disp($selectpro, $str);
                    ?>
                    </tbody>
                </table>
                </div>
                
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <?php
                            $selectall = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` != ''");
                            $row = mysqli_fetch_assoc($selectall); 
                            echo $row['firstname'];
                            echo $row['middlename'];
                            echo $row['lastname'];
                            echo $row['position'];
                            echo $row['yearlevel'];
                        ?>
                    </div>
                </div>

            </div>

            <div id="AddCandidate" class="tabcontent">
            <h3>Add Candidate</h3>
            <p>Add Candidate.</p>
            </div>

            <div id="ViewVoters" class="tabcontent">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th> First Name </th>
                            <th> Middle Name </th>
                            <th> Last Name </th>
                            <th> Year Level </th>
                            <th> Status </th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                        $selectvoters = mysqli_query($conn,"SELECT `firstname`, `middlename`, `lastname`, `yearlevel`, `status` FROM phpfinals.records WHERE `position` = '' AND `accesslevel` = 'user'");
                        while($row = mysqli_fetch_assoc($selectvoters)) 
                            {
                                echo "<tr>";
                                echo "<td></td>";
                                echo "<td>" . $row['firstname']   . "</td>";
                                echo "<td>" . $row['middlename']  . "</td>";
                                echo "<td>" . $row['lastname']    . "</td>";
                                echo "<td>" . $row['yearlevel'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "</td>";
                                echo "</tr>";
                            }  
                    ?>
                    </tbody>
                </table>
            </div>

            <div id="CheckResults" class="tabcontent">
            <h3>Check Results</h3>
            <p>Check Results.</p>
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