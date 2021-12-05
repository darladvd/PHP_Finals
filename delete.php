<?php
    $conn = mysqli_connect('localhost', 'root', '', 'phpfinals');
    if($conn->connect_error)
    {
        echo "$conn->connect_error";
        die("Connection Failed : ".$conn->connect_error);
    }

    if(isset($_POST['deletesend']))
    {
        $unique = $_POST['deletesend'];
        $stmnt = mysqli_query($conn,"DELETE FROM phpfinals.records WHERE `username` = $unique");
    }


?>