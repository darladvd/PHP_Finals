<!DOCTYPE html>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'phpfinals');
?>

<html>
    <style>
        .ac{
            border-bottom: 30px solid #009bd4;
        }

        .ac2{
            color: white;
            margin: auto auto;
            border-collapse: separate !important;
            background: #009bd4;
            border: 1px solid #cccccc;
            padding: 20px;
        }
        
        .inputf{
            width: 99%;
        }

        .inputf2{
            width: 66%;
        }

        .button {
            width: 100%;
            background-color: white;
            border: none;
            color: #009bd4;
            padding: 15px;
            text-align: center;
            font-size: 16px;
            transition: 0.25s;
            border-radius: 1em;
        }

        .button:hover{
            background-color: #009bd4;
            color: white;
        }
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(function () {
            $("input[name='gender']").click(function () {
                if ($("#other").is(":checked")) {
                    $("#othergender").removeAttr("disabled");
                    $("#othergender").focus();
                } else {
                    $("#othergender").attr("disabled", "disabled");
                }
            });
        });
    </script>
    
    <script>
    function missinginfo() {
        alert("Missing Info!");
    }

    function cpasserr() {
        alert("Password and Confirm Password are not the same!");
    }

    function success() {
        alert("Record Input Successful!");
    }
    </script>

    <div id="AddCandidate" class="tabcontent">
    <h3>Add Candidate</h3>
    <hr>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <table class = ac2><tr><td>
    <table class = ac>
        <tr><td class = ac>Username: <label for="username"></label><input class = "inputf" type="text" id="username" name="username" maxlength=9 required></td></tr>
        <tr><td class = ac>Password: <label for="password"></label><input class = "inputf" type="password" id="password" name="password" required></td></tr>
        <tr><td class = ac>Confirm Password: <label for="cpassword"></label><input class = "inputf" type="password" id="cpassword" name="cpassword" required></td></tr>
        <tr><td class = ac>First Name: <label for="firstname"></label><input class = "inputf" type="text" id="firstname" name="firstname" required></td></tr>
        <tr><td class = ac>Middle Name: <label for="middlename"></label><input class = "inputf" type="text" id="middlename" name="middlename"></td></tr>
        <tr><td class = ac>Last Name: <label for="lastname"></label><input class = "inputf" type="text" id="lastname" name="lastname" required></td></tr>

        <tr><td class = ac><label for="position">Position:</label>
        <select id="position" name="position" class = "inputf">
            <option value=""></option>
            <option value="President">President</option>
            <option value="VP Internal">VP Internal</option>
            <option value="VP External">VP External</option>
            <option value="Secretary">Secretary</option>
            <option value="Treasurer">Treasurer</option>
            <option value="Auditor">Auditor</option>
            <option value="P.R.O.">P.R.O.</option>
        </select></td></tr>

        <tr><td class = ac><label for="yearlevel">Year Level:</label>
        <select id="yearlevel" name="yearlevel" class = "inputf">
            <option value=""></option>
            <option value="1st Year">1st Year</option>
            <option value="2nd Year">2nd Year</option>
            <option value="3rd Year">3rd Year</option>
            <option value="4th Year">4th Year</option>
        </select></td></tr>

        <tr><td class = ac>Access Level:<br>
        <input type="radio" name="accesslevel" value="admin" required>Admin&emsp;
        <input type="radio" name="accesslevel" value="user">User

        <tr><td class = ac>Gender:<br>
        <input type="radio" name="gender" value="Male" required>Male&emsp;
        <input type="radio" name="gender" value="Female">Female&emsp;
        <label for = "other">
        <input type="radio" name="gender" value="Other" id = "other">
        </label>
        <input type="text" name="othergender" placeholder = "Other" id = "othergender" disabled required/></td></tr>

        <tr><td><input type="submit" value="Submit" class = "button"></td></tr>
        </form>
    </table>
    </td></tr>
    </table><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $position = $_POST['position'];
        $accesslevel = $_POST['accesslevel'];
        $yearlevel = $_POST['yearlevel'];
        $gender = $_POST['gender'];
        if($gender == "Other"){
            $gender = $_POST['othergender'];
        }

        if (empty($username) || empty($password) || empty($cpassword) || empty($firstname) || empty($lastname) || empty($position) || empty($accesslevel) || empty($yearlevel) || !isset($gender)){
            echo "<SCRIPT LANGUAGE ='javascript'>missinginfo()</script>";
        }
        else if ($password != $cpassword){
            echo "<SCRIPT LANGUAGE ='javascript'>cpasser()</script>";
        }
        else{
            $query = "insert into records(username,password,firstname,middlename,lastname,position,accesslevel,yearlevel,gender) 
            values('$username','$password','$firstname','$middlename','$lastname','$position','$accesslevel','$yearlevel','$gender')";
            $run = mysqli_query($conn,$query);
            echo "<SCRIPT LANGUAGE ='javascript'>success()</script>";
        }
    }
    ?>

    </div>
</html>