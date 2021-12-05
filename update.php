<?php
    $conn = mysqli_connect('localhost', 'root', '', 'phpfinals');
    if($conn->connect_error)
    {
        echo "$conn->connect_error";
        die("Connection Failed : ".$conn->connect_error);
    }

    if(isset($_POST['sendupdate']))
    {
        $user_id = $_POST['sendupdate'];
        $stmnt = mysqli_query($conn,"SELECT `username`, `password`, `firstname`, `middlename`, `lastname`, `position`, `yearlevel`, `gender` FROM phpfinals.records WHERE `username` = $user_id");
        $response=array();
        while($row = mysqli_fetch_assoc($stmnt))
        {
            $response = $row;
        }
        echo json_encode($response);
    }

    else
    {
        $response['status'] = 200;
        $response['message'] = "Invalid or data not found";
    }

    //update query
    if(isset($_POST['hiddendata']))
    {
        $old = $_POST['hiddendata'];
        $uname = $_POST['updateuname'];
        $pass = $_POST['updatepass'];
        $fname = $_POST['updatefname'];
        $mname = $_POST['updatemname'];
        $lname = $_POST['updatelname'];
        $gen = $_POST['updategen'];
        $yearlvl = $_POST['updateyearlevel'];
        $pos = $_POST['updatepos']; 
        $stmnt = mysqli_query($conn,"UPDATE phpfinals.records SET `username` = '$uname', `password` = '$pass', `firstname` = '$fname', `middlename` = '$mname', `lastname` = '$lname', `position` = '$pos', `yearlevel` = '$yearlvl', `gender` = '$gen' WHERE `username` = '$old'");
        $response=array();
    }


?>