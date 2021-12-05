<html>
<head>
<style>
	body {
		margin: 50px;
		text-align: center;
		font-size: 20px;
	}
</style>
</head>
<body>
<?php 		
	error_reporting(0);
	session_start();
	$conn = mysqli_connect('localhost','root','','phpfinals');
	
	$username2 = $_SESSION["username"];
	$president2 = $_SESSION["president"];
	$viceint2 = $_SESSION["viceint"];
	$viceext2 = $_SESSION["viceext"]; 
	$secretary2 = $_SESSION["secretary"]; 
	$treasurer2 = $_SESSION["treasurer"]; 
	$auditor2 = $_SESSION["auditor"]; 
	$pro2 = $_SESSION["pro"];
	
	$sql=mysqli_query($conn,"select * from records where username='$president2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$presidentvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$viceint2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$viceintvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$viceext2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$viceextvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$secretary2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$secretaryvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$treasurer2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$treasurervotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$auditor2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$auditorvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$pro2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$provotes = $row["votes"];
	}
	
	if(isset($_POST['SubmitFinalVote'])){
		$president=$_POST['president'];
		$viceint=$_POST['viceint'];
		$viceext=$_POST['viceext'];
		$secretary=$_POST['secretary'];
		$treasurer=$_POST['treasurer'];
		$auditor=$_POST['auditor'];
		$pro=$_POST['pro'];
		
		$sql=mysqli_query($conn,"UPDATE records SET status='voted' WHERE username='$username2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$presidentvotes+1 WHERE username='$president2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$viceintvotes+1 WHERE username='$viceint2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$viceextvotes+1 WHERE username='$viceext2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$secretaryvotes+1 WHERE username='$secretary2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$treasurervotes+1 WHERE username='$treasurer2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$auditorvotes+1 WHERE username='$auditor2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$provotes+1 WHERE username='$pro2'")or die(mysqli_error());
		
		echo "<h1>THANKS FOR VOTING!</h1>";
	}
	else {
		header("location: vote.php");
	}
?>

</body>
</html>
