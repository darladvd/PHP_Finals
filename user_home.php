<!DOCTYPE html>
<?php
        session_start();
        error_reporting(0);
		
		$username = $_SESSION["username"];
		$conn = mysqli_connect('localhost','root','','phpfinals');
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
    <div class="container"> <button class="navbar-toggler" type="button" row-bs-toggle="collapse" row-bs-target="#mynav" aria-controls="mynav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button> <a class="navbar-brand" href="#">
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
            <button class="tablinks" onclick="openTab(event, 'ProfileSettings')">Profile Settings</button>
            </div>

            <!-- View Profile -->
            <div id="ViewProfile" class="tabcontent">
            <div class="row align-items-center flex-row-reverse">
            <div class="col-md-6">
            <div class="about-text go-to">
                <?php 
                    $sql=mysqli_query($conn,"select * from records where username='$username'")or die(mysqli_error());
                    while($row=mysqli_fetch_array($sql)){ 
                    echo "<h3 class='dark-color'>".$row['firstname']." ".$row['middle']." ".$row['lastname']."</h3>";}?>
                <div class="row about-list">
                <div class="col-md-6">
                    <div class="media">
                            <label>Student Number</label>
                            <?php 
                                $sql=mysqli_query($conn,"select * from records where username='$username'")or die(mysqli_error());
                                while($row=mysqli_fetch_array($sql)){echo $row['username'];}
                            ?>
                    </div>
                    <div class="media">
                            <label>Status</label>
                            <?php 
                                $sql=mysqli_query($conn,"select * from records where username='$username'")or die(mysqli_error());
                                while($row=mysqli_fetch_array($sql))
                                {
                                    if($row['status'] == "not voted")
                                    {
                                        echo "Not Voted";
                                    } else
                                    {
                                        echo "Voted";
                                    }
                                }
                            ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="media">
                        <label>Year Level</label>
                            <?php 
                                $sql=mysqli_query($conn,"select * from records where username='$username'")or die(mysqli_error());
                                while($row=mysqli_fetch_array($sql)){echo $row['yearlevel'];}
                            ?>
                    </div>
                    <div class="media">
                        <label>Gender</label>
                            <?php 
                                $sql=mysqli_query($conn,"select * from records where username='$username'")or die(mysqli_error());
                                while($row=mysqli_fetch_array($sql)){echo $row['gender'];}
                            ?>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-5">
                <?php
                    $sql=mysqli_query($conn,"select * from records where username='$username'") or die(mysqli_error());
                    while($row = mysqli_fetch_array($sql)){
                        if($row['images']!=''){
                            echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>";                                
                        }
                        else{
                            echo "<img src='images/default.jpg'>";
                        }
                    }
                ?>
            </div>
            </div>
            </div>

            <!-- Submit Vote -->
            <div id="SubmitVote" class="tabcontent">
                <?php
                    include 'submitvote.php';
                ?>
            </div>

            <div id="ViewBallot" class="tabcontent">
                <?php
                ?>
            </div>

            <!-- Profile Settings -->
            <div id="ProfileSettings" class="tabcontent">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            <div class="row align-items-center flex-row-reverse">
                <div class="about-text go-to">
                <div class="row about-list">
                <div class="col-md-3">
                <h4 class='dark-color'> Reset Password </h4>
                <div class="media">
                    <div class="form-group">
                    <label for="newpw">New Password</label>
                    <input type="password" class="form-control" name="newpw" placeholder="Enter new password">
                    </div>
                </div>
                <div class="media">
                    <div class="form-group">
                    <label for="updpw">Confirm New Password</label>
                    <input type="password" class="form-control" name="updpw" placeholder="Re-enter new password">
                    </div>
                </div>
                <div class="media">
                    <div class="text-right">
                    <button type="submit" name="submit" style="margin-top:20px;" class="btn btn-primary" onClick="window.location.reload();">Save Changes</button>
                    </div>
                </div>
                </div>
                <div class="col-md-8" style="margin-left:20px;">
                <h4> Change Image </h4>                            
                <div class="media">
                    <?php
                        $sql=mysqli_query($conn,"select * from records where username='$username'") or die(mysqli_error());
                        while($row = mysqli_fetch_array($sql)){
                            if($row['images']!=''){
                                echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='changeimg'/>";                               
                            }
                            else{
                                echo "<img src='images/default.jpg'>";
                            }
                        }
                    ?>
                    <input type="file" name="pic" id="pic" style="margin-left:20px;">
                </div>
                </div>
                </div>
            </div> <br>                
            </form>
            </div>
            </div>
    <!-- Do Not Delete -->
        </div>            
    </div>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $newpw = $_POST['newpw'];
            $updpw = $_POST['updpw'];

            if (empty($newpw))
            {
                error_reporting(0);
            } else
            {
                $sql = mysqli_query($conn, "select password from records where username='".$username."'");
                while($row = mysqli_fetch_array($sql))
                {
                    if(strcmp($newpw,$updpw)==0)
                    {
                        $update_pw = "UPDATE records SET password='$newpw' WHERE username = '$username'";
                        if($conn->query($update_pw)){
                            echo "<script>alert('Password has been updated successfully.')</script>";                        
                        }
                        else {
                            echo "There was an error with updating your password. Please try again...";
                        }
                        $conn->close();
                    } else {
                        echo "<script>alert('Password does not match. Please try again...')</script>"; 
                    }
                }
            }

            if(isset($_FILES['pic']) && isset($_POST['submit']))
            {
                $image = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
                $stmt = "UPDATE records SET images = '$image' WHERE username = '$username'";
  
                if (mysqli_query($conn, $stmt))
                {
                    echo("<meta http-equiv='refresh' content='1'>");
                    echo"<script>alert('Successfully uploaded image.')</script>";
                }
                else
                {
                    echo"<script>alert('Error in uploading image.')</script>";
                }
            }
            $conn->close();
        }
    ?>

    <script>
    function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    function openTabh(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontenth");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
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