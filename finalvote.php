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
	session_start();
	$conn = mysqli_connect('localhost','root','','phpfinals');
	
	$username = $_SESSION["username"];
	$president = $_SESSION["president"];
	$_SESSION["votes"] = row["votes"];
	$viceint = $_SESSION["viceint"];
	$viceext = $_SESSION["viceext"]; 
	$secretary = $_SESSION["secretary"]; 
	$treasurer = $_SESSION["treasurer"]; 
	$auditor = $_SESSION["auditor"]; 
	$pro = $_SESSION["pro"];
	
	$sql=mysqli_query($conn,"select * from records where username='$president'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$presidentvotes = row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$viceint'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$viceintvotes = row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$viceext'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$viceextvotes = row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$secretary'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$secretaryvotes = row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$treasurer'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$treasurervotes = row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$auditor'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$auditorvotes = row["votes"];
	}
	
	$sql=mysqli_query($conn,"select * from records where username='$pro'")or die(mysqli_error());
	while($row=mysqli_fetch_assoc($sql)){ 
		$provotes = row["votes"];
	}
	
	if (isset($_POST['SubmitFinalvotes'])){
		$president=$_POST['president'];
		$viceint=$_POST['viceint'];
		$viceext=$_POST['viceext'];
		$secretary=$_POST['secretary'];
		$treasurer=$_POST['treasurer'];
		$auditor=$_POST['auditor'];
		$pro=$_POST['pro'];
		
		$sql=mysqli_query($conn,"UPDATE records SET status='votes' WHERE username='$username'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votess='$presidentvotes + 1' WHERE username='$president'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votess='$viceintvotes + 1' WHERE username='$viceint'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votess='$viceextvotes + 1' WHERE username='$viceext'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votess='$secretaryvotes + 1' WHERE username='$secretary'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votess='$treasurervotes + 1' WHERE username='$treasurer'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votess='$auditorvotes + 1' WHERE username='$auditor'")or die(mysqli_error());
		$sql=mysqli_query($conn,"UPDATE records SET votess='$provotes + 1' WHERE username='$pro'")or die(mysqli_error());
	}
	
	echo $presidentvotes;
?>

</body>
</html>
