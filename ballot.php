<?php
	session_start();
	$username3 = $_SESSION["username"];
	$conn = mysqli_connect('localhost','root','','phpfinals');
?>

<html>
<title> Ballot </title>
<head>
<style>
body {
	margin: 50px;
	text-align: center;
	font-family: arial;
	font-size: 20px;
}
</style>
</head>
<body>
<?php
echo "<h1>OFFICIAL BALLOT</h1>";

$sql=mysqli_query($conn,"select * from ballot where voter='$username3'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0){
		while($row=mysqli_fetch_assoc($sql)){ 
			$_SESSION["presid"] = $row['president'];
			$_SESSION["viceintid"] = $row['viceint'];
			$_SESSION["viceextid"] = $row['viceext'];
			$_SESSION["secretaryid"] = $row['secretary'];
			$_SESSION["treasurerid"] = $row['treasurer'];
			$_SESSION["auditorid"] = $row['auditor'];
			$_SESSION["proid"] = $row['pro'];
						
			$presid = $_SESSION["presid"];
			$viceintid = $_SESSION["viceintid"];
			$viceextid = $_SESSION["viceextid"];
			$secretaryid = $_SESSION["secretaryid"];
			$treasurerid = $_SESSION["treasurerid"];
			$auditorid	= $_SESSION["auditorid"];
			$proid	= $_SESSION["proid"];
						
		}
	}

//president			
$sql=mysqli_query($conn,"select * from records where username='$presid'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0) {
		while($row=mysqli_fetch_assoc($sql)){ 
			echo "<b>President: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
		}
	} 

//vp internal
$sql=mysqli_query($conn,"select * from records where username='$viceintid'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0) {
		while($row=mysqli_fetch_assoc($sql)){ 
			echo "<b>Vice President Internal: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
		}
	} 

//vp external
$sql=mysqli_query($conn,"select * from records where username='$viceextid'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0) {
		while($row=mysqli_fetch_assoc($sql)){ 
			echo "<b>Vice President External: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
		}
	} 

//secretary
$sql=mysqli_query($conn,"select * from records where username='$secretaryid'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0) {
		while($row=mysqli_fetch_assoc($sql)){ 
			echo "<b>Secretary: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
		}
	} 

//treasurer
$sql=mysqli_query($conn,"select * from records where username='$treasurerid'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0) {
		while($row=mysqli_fetch_assoc($sql)){ 
			echo "<b>Treasurer: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
		}
	} 

//auditor
$sql=mysqli_query($conn,"select * from records where username='$auditorid'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0) {
		while($row=mysqli_fetch_assoc($sql)){ 
			echo "<b>Auditor: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
		}
	} 

//pro
$sql=mysqli_query($conn,"select * from records where username='$proid'")or die(mysqli_error());
	if(mysqli_num_rows($sql) > 0) {
		while($row=mysqli_fetch_assoc($sql)){ 
			echo "<b>PRO: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
		}
	} 
?>
</body>
</html>