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
	$sec2 = $_SESSION["sec"]; 
	$trs2 = $_SESSION["trs"]; 
	$aud2 = $_SESSION["aud"]; 
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
	
	$sql=mysqli_query($conn,"select * from records where username='$sec2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$secvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$trs2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$trsvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$aud2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$audvotes = $row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$pro2'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$provotes = $row["votes"];
	}
	
	if(isset($_POST['SubmitFinalVote'])){
		$president=$_POST['president'];
		$viceint=$_POST['viceint'];
		$viceext=$_POST['viceext'];
		$sec=$_POST['sec'];
		$trs=$_POST['trs'];
		$aud=$_POST['aud'];
		$pro=$_POST['pro'];
		
		$sql=mysqli_query($conn,"UPDATE records SET status='voted' WHERE username='$username2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$presidentvotes+1 WHERE username='$president2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$viceintvotes+1 WHERE username='$viceint2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$viceextvotes+1 WHERE username='$viceext2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$secvotes+1 WHERE username='$sec2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$trsvotes+1 WHERE username='$trs2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$audvotes+1 WHERE username='$aud2'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votes=$provotes+1 WHERE username='$pro2'")or die(mysqli_error());
		
		header("location: user_home.php");
	}
	else {
		header("location: vote.php");
	}
?>

</body>
</html>
