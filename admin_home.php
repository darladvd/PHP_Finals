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
            <button class="tablinks" onclick="openTab(event, 'CheckResults')" id = "CheckRes">Check Results</button>
            </div>

            <!-- View Candidates -->
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
                            <th>Tools</th>
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

                        $selectall = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` != ''");
                        function disp($stmnt)
                        {
                            while($row = mysqli_fetch_assoc($stmnt)) 
                            {
                                $id = $row['username'];
                                echo "<tr>";
                                echo "<td></td>";
                                echo "<td>" . $row['firstname']   . "</td>";
                                echo "<td>" . $row['middlename']  . "</td>";
                                echo "<td>" . $row['lastname']    . "</td>";
                                echo "<td>" . $row['position']  . "</td>";
                                echo "<td>" . $row['yearlevel'] . "</td>";
                                echo "<td>";
                                echo' <button type="button" class="btn btn-success btn-sm" onclick = "GetUser(' . $id . ')">Edit</button>';
                                echo' <button type="button" class="btn btn-primary btn-sm" onclick = "ShowDetails(' . $id . ')">View</button>';
                                echo' <button type="button" class="btn btn-danger btn-sm" onclick = "DeleteUser(' . $id . ')">Delete</button>';
                                echo "</td>";
                                echo "</tr>";
                            }   
                        }
                        
                        disp($selectall);
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
                        $selectpres = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'President'");
                        disp($selectpres);
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
                        $selectvpint = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'VP Internal'");
                        disp($selectvpint);
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
                        $selectvpext = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'VP External'");
                        disp($selectvpext);
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
                        $selectsec = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Secretary'");
                        disp($selectsec);
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
                        $selecttreas = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Treasurer'");
                        disp($selecttreas);
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
                            $selectaudit = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'Auditor'");
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
                            $selectpro= mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel` FROM phpfinals.records WHERE `position` = 'PRO'");
                            disp($selectpro);
                        ?>
                        </tbody>
                    </table>
                    </div>
                </div>

                <!-- View Modal -->
                <div class="modal fade" id="viewModal"  aria-labelledby="viewModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Candidate Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img id = "img"/>
                        <h1>Account Details: </h1>
                        <h5 id ="uname"></h5>
                        <h5 id ="pass"></h5>
                        <h1>Election Details: </h1>
                        <h5 id ="fname"></h5>
                        <h5 id ="mname"></h5>
                        <h5 id ="lname"></h5>
                        <h5 id ="gen"></h5>
                        <h5 id ="yearlevel"></h5>
                        <h5 id ="pos"></h5>
                        <h5 id ="status"></h5>
                        <h1>Access Level Details: </h1>
                        <h5 id ="accesslevel"></h5>
                        <form>
                            <input type="hidden" id="view">
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- End of View Modal -->

                <!-- Edit Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Candidate</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- EDIT CANDIDATE FORM -->
                            <form>
                            <div class="mb-3">
                                <label for="editusername" class="form-label">Username</label>
                                <input type="text" class="form-control" id="editusername" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="editpassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="editpassword" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="editfname" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="editfname">
                            </div>

                            <div class="mb-3">
                                <label for="editmname" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" id="editmname">
                            </div>

                            <div class="mb-3">
                                <label for="editlname" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="editlname">
                            </div>

                            <div class="mb-3">
                                <label for="editgen" class="form-label">Gender</label>
                                <input type="text" class="form-control" id="editgen">
                            </div>

                            <div class="mb-3">
                                <label for="edityearlevel" class="form-label">Year Level</label>
                                <input type="text" class="form-control" id="edityearlevel">
                            </div>

                            <div class="mb-3">
                                <label for="editpos" class="form-label">Position</label>
                                <input type="text" class="form-control" id="editpos">
                            </div>

                            <input type ="hidden" id ="hiddendata">
                            <button type="button" class="btn btn-primary" onclick = "updateDetails()">Submit</button>
                            </form>
                            <!-- END OF EDIT CANDIDATE FORM -->
                        </div>
                    </div>
                </div>
                <!-- End of Edit Modal -->

            </div>
            <!-- End of View Candidates -->

            <!-- Add Candidate -->
            <?php
                include "admin_home_ac.php";
            ?>
            <!-- End of Add Candidate -->

            <!-- View Voters -->
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
                                <th> View Ballot </th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php
                            $selectvoters = mysqli_query($conn,"SELECT `username`, `firstname`, `middlename`, `lastname`, `yearlevel`, `status` FROM phpfinals.records WHERE `accesslevel` = 'user'");
                            while($row = mysqli_fetch_assoc($selectvoters)) 
                                {
                                    $id = $row['username'];
                                    echo "<tr>";
                                    echo "<td></td>";
                                    echo "<td>" . $row['firstname']   . "</td>";
                                    echo "<td>" . $row['middlename']  . "</td>";
                                    echo "<td>" . $row['lastname']    . "</td>";
                                    echo "<td>" . $row['yearlevel'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    if($row['status'] == 'not voted')
                                    {
                                        echo'<td><button type="button" class="btn btn-danger btn-sm" onclick = "NoBallot()">Unavailable</button></td>';
                                    }
                                    else
                                    {
                                        echo'<td><button type="button" class="btn btn-success btn-sm" onclick = "GetBallot(' . $id . ')">View Ballot</button></td>';
                                    }
                                    
                                    echo "</tr>";
                                }  
                        ?>
                        </tbody>
                </table>
                <br><br>

                 <!-- No Ballot Modal -->
                 <div class="modal fade" id="noBallot"  aria-labelledby="viewBallot" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Official Ballot</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="images/logo.png">
                            <h1>Ballot Unavailable</h1>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End of No Ballot Modal -->

                

                 <!-- View Ballot Modal -->
                <div class="modal fade" id="viewBallot"  aria-labelledby="viewBallot" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Official Ballot</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="images/logo.png">
                            <h1>Account Details: </h1>
                            <h5 id ="vuname"></h5>
                            <h5 id ="vfullname"></h5>
                            <h1>Election Details: </h1>
                            <h5 id ="bpres"></h5>
                            <h5 id ="bvpint"></h5>
                            <h5 id ="bvpext"></h5>
                            <h5 id ="bsec"></h5>
                            <h5 id ="btreas"></h5>
                            <h5 id ="baudit"></h5>
                            <h5 id ="bpro"></h5>
                            <form>
                                <input type="hidden" id="voter">
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End of View Ballot Modal -->
            </div>
            <!-- End of View Voters -->
            
            <!-- Check Results -->
            <div id="CheckResults" class="tabcontent">
                <h5>President</h5>
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th> First Name </th>
                                    <th> Last Name </th>
                                    <th> Position </th>
                                    <th> Votes </th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                                $res = mysqli_query($conn,"SELECT `firstname`, `lastname`, `position`, `votes` FROM phpfinals.records WHERE `position` = 'President'");
                                while($row = mysqli_fetch_assoc($res)) 
                                    {
                                        echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td>" . $row['firstname']   . "</td>";
                                        echo "<td>" . $row['lastname']    . "</td>";
                                        echo "<td>" . $row['position'] . "</td>";
                                        $votes = $row['votes'] * 10;
                                        echo "<td>";
                                        echo $votes . '%<div class="progress"><div class="progress-bar" role="progressbar" aria-valuemax="10" style="width:' . $votes . '%"></div></div>';
                                        echo "</td>";
                                        echo "</tr>";
                                    }  
                            ?>
                            </tbody>
                        </table>

                    <br><br>

                    <h5>Vice President Internal</h5>
                        <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th> First Name </th>
                                        <th> Last Name </th>
                                        <th> Position </th>
                                        <th> Votes </th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                    $res = mysqli_query($conn,"SELECT `firstname`, `lastname`, `position`, `votes` FROM phpfinals.records WHERE `position` = 'VP Internal'");
                                    while($row = mysqli_fetch_assoc($res)) 
                                        {
                                            echo "<tr>";
                                            echo "<td></td>";
                                            echo "<td>" . $row['firstname']   . "</td>";
                                            echo "<td>" . $row['lastname']    . "</td>";
                                            echo "<td>" . $row['position'] . "</td>";
                                            $votes = $row['votes'] * 10;
                                            echo "<td>";
                                            echo $votes . '%<div class="progress"><div class="progress-bar" role="progressbar" aria-valuemax="10" style="width:' . $votes . '%"></div></div>';
                                            echo "</td>";
                                            echo "</tr>";
                                        }  
                                ?>
                                </tbody>
                            </table>

                        <br><br>

                        <h5>Vice President External</h5>
                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> First Name </th>
                                            <th> Last Name </th>
                                            <th> Position </th>
                                            <th> Votes </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $res = mysqli_query($conn,"SELECT `firstname`, `lastname`, `position`, `votes` FROM phpfinals.records WHERE `position` = 'VP External'");
                                        while($row = mysqli_fetch_assoc($res)) 
                                            {
                                                echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>" . $row['firstname']   . "</td>";
                                                echo "<td>" . $row['lastname']    . "</td>";
                                                echo "<td>" . $row['position'] . "</td>";
                                                $votes = $row['votes'] * 10;
                                                echo "<td>";
                                                echo $votes . '%<div class="progress"><div class="progress-bar" role="progressbar" aria-valuemax="10" style="width:' . $votes . '%"></div></div>';
                                                echo "</td>";
                                                echo "</tr>";
                                            }  
                                    ?>
                                    </tbody>
                                </table>
                        
                        <br><br>

                        <h5>Secretary</h5>
                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> First Name </th>
                                            <th> Last Name </th>
                                            <th> Position </th>
                                            <th> Votes </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $res = mysqli_query($conn,"SELECT `firstname`, `lastname`, `position`, `votes` FROM phpfinals.records WHERE `position` = 'Secretary'");
                                        while($row = mysqli_fetch_assoc($res)) 
                                            {
                                                echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>" . $row['firstname']   . "</td>";
                                                echo "<td>" . $row['lastname']    . "</td>";
                                                echo "<td>" . $row['position'] . "</td>";
                                                $votes = $row['votes'] * 10;
                                                echo "<td>";
                                                echo $votes . '%<div class="progress"><div class="progress-bar" role="progressbar" aria-valuemax="10" style="width:' . $votes . '%"></div></div>';
                                                echo "</td>";
                                                echo "</tr>";
                                            }  
                                    ?>
                                    </tbody>
                                </table>
                        
                        <br><br>

                        <h5>Treasurer</h5>
                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> First Name </th>
                                            <th> Last Name </th>
                                            <th> Position </th>
                                            <th> Votes </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $res = mysqli_query($conn,"SELECT `firstname`, `lastname`, `position`, `votes` FROM phpfinals.records WHERE `position` = 'Treasurer'");
                                        while($row = mysqli_fetch_assoc($res)) 
                                            {
                                                echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>" . $row['firstname']   . "</td>";
                                                echo "<td>" . $row['lastname']    . "</td>";
                                                echo "<td>" . $row['position'] . "</td>";
                                                $votes = $row['votes'] * 10;
                                                echo "<td>";
                                                echo $votes . '%<div class="progress"><div class="progress-bar" role="progressbar" aria-valuemax="10" style="width:' . $votes . '%"></div></div>';
                                                echo "</td>";
                                                echo "</tr>";
                                            }  
                                    ?>
                                    </tbody>
                                </table>
                        
                        <br><br>

                        <h5>Auditor</h5>
                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> First Name </th>
                                            <th> Last Name </th>
                                            <th> Position </th>
                                            <th> Votes </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $res = mysqli_query($conn,"SELECT `firstname`, `lastname`, `position`, `votes` FROM phpfinals.records WHERE `position` = 'Auditor'");
                                        while($row = mysqli_fetch_assoc($res)) 
                                            {
                                                echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>" . $row['firstname']   . "</td>";
                                                echo "<td>" . $row['lastname']    . "</td>";
                                                echo "<td>" . $row['position'] . "</td>";
                                                $votes = $row['votes'] * 10;
                                                echo "<td>";
                                                echo $votes . '%<div class="progress"><div class="progress-bar" role="progressbar" aria-valuemax="10" style="width:' . $votes . '%"></div></div>';
                                                echo "</td>";
                                                echo "</tr>";
                                            }  
                                    ?>
                                    </tbody>
                                </table>
                        
                        <br><br>

                        <h5>P.R.O.</h5>
                            <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th> First Name </th>
                                            <th> Last Name </th>
                                            <th> Position </th>
                                            <th> Votes </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                        $res = mysqli_query($conn,"SELECT `firstname`, `lastname`, `position`, `votes` FROM phpfinals.records WHERE `position` = 'PRO'");
                                        while($row = mysqli_fetch_assoc($res)) 
                                            {
                                                echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>" . $row['firstname']   . "</td>";
                                                echo "<td>" . $row['lastname']    . "</td>";
                                                echo "<td>" . $row['position'] . "</td>";
                                                $votes = $row['votes'] * 10;
                                                echo "<td>";
                                                echo $votes . '%<div class="progress"><div class="progress-bar" role="progressbar" aria-valuemax="10" style="width:' . $votes . '%"></div></div>';
                                                echo "</td>";
                                                echo "</tr>";
                                            }  
                                    ?>
                                    </tbody>
                                </table>
                        
                        <br><br>


                        

                </div>
            <!-- End of Check Results -->

            <script>
            function openTab(evt, Tab)
            {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++)
                {
                    tabcontent[i].style.display = "none";
                }
                
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++)
                {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Tab).style.display = "block";
                evt.currentTarget.className += " active";
            }

            function openTabh(evt, Tab)
            {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontenth");
                for (i = 0; i < tabcontent.length; i++)
                {
                    tabcontent[i].style.display = "none";
                }
            
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) 
                {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(Tab).style.display = "block";
                evt.currentTarget.className += " active";
            }

            //Update function
            function GetUser(updateid)
            {       
                $('#hiddendata').val(updateid)
                $.post("update.php",{sendupdate:updateid},function(data,
                status){
                    var userid = JSON.parse(data);
                    $('#editusername').val(userid.username)
                    $('#editpassword').val(userid.password)
                    $('#editfname').val(userid.firstname)
                    $('#editmname').val(userid.middlename)
                    $('#editlname').val(userid.lastname)
                    $('#editpos').val(userid.position)
                    $('#edityearlevel').val(userid.yearlevel)
                    $('#editgen').val(userid.gender)
                });

                $('#editModal').modal("show");
            }

            //On-click update event function
            function updateDetails()
            {
                var updateuname = $("#editusername").val();
                var updatepass = $("#editpassword").val();
                var updatefname = $("#editfname").val();
                var updatemname = $("#editmname").val();
                var updatelname = $("#editlname").val();
                var updategen = $("#editgen").val();
                var updateyearlevel = $("#edityearlevel").val();
                var updatepos = $("#editpos").val();
                var hiddendata = $("#hiddendata").val();

                $.post("update.php", {
                    updateuname:updateuname,
                    updatepass:updatepass,
                    updatefname:updatefname,
                    updatemname:updatemname,
                    updatelname:updatelname,
                    updategen:updategen,
                    updateyearlevel:updateyearlevel,
                    updatepos:updatepos,
                    hiddendata:hiddendata
                },function(data,status){
                    $('#editModal').modal("hide");
                    location.href = 'admin_home.php';
                });
            }

            //Delete Candidate function
            function DeleteUser(deleteid)
            {
                $.ajax({
                    url:"delete.php",
                    type: 'post',
                    data:{
                        deletesend:deleteid
                    },
                    success:function(data,status){
                        location.href = 'admin_home.php';
                    }
                })
            }

            //Show Candidate Details function
            function ShowDetails(viewid)
            {
                $('#view').val(viewid)
                $.post("update.php",{sendview:viewid},function(data,
                status){
                    var userid = JSON.parse(data);
                    $('#uname').text("Username: " + userid.username)
                    $('#pass').text("Password: " + userid.password)
                    $('#fname').text("First Name: " + userid.firstname)
                    $('#mname').text("Middle Name: " + userid.middlename)
                    $('#lname').text("Last Name: " + userid.lastname)
                    $('#gen').text("Gender: " + userid.gender)
                    $('#yearlevel').text("Year Level: " + userid.yearlevel)
                    $('#pos').text("Position: " + userid.position)
                    $('#accesslevel').text("Access Level: " + userid.accesslevel)          
                    let image = "images/" + userid.username + ".png";   
                    $('#img').attr("src", image)            
                });

                $('#viewModal').modal("show");
            }

            //No Ballot function
            function NoBallot(voterid)
            {
                $('#noBallot').modal("show");
            }

            //Get Ballot function
            function GetBallot(voterid)
            {
                $('#voter').val(voterid)
                $.post("update.php",{sendviewb:voterid},function(data,
                status){
                    var ballot = JSON.parse(data);
                    $('#vuname').text("Username: " + ballot.vid)
                    $('#vfullname').text("Voter: " + ballot.vfname + " " + ballot.vlname)
                    $('#bpres').text("President: " + ballot.presfname + " " + ballot.preslname)
                    $('#bvpint').text("Vice President Internal: " + ballot.vpintfname + " " + ballot.vpintlname)
                    $('#bvpext').text("Vice President External: " + ballot.vpextfname + " " + ballot.vpextlname)
                    $('#bsec').text("Secretary: " + ballot.secfname + " " + ballot.seclname)
                    $('#btreas').text("Treasurer: " + ballot.treasfname + " " + ballot.treaslname)
                    $('#baudit').text("Auditor: " + ballot.auditfname + " " + ballot.auditlname)
                    $('#bpro').text("P.R.O. : " + ballot.profname + " " + ballot.prolname)
                });

                $('#viewBallot').modal("show");
            }

        
            // Get the element with id="defaultOpen" and id="defaultOpen1" and click on it
            document.getElementById("defaultOpen").click();
            document.getElementById("defaultOpen1").click();
   
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>