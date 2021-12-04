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
	
	if (isset($_POST['submit'])){
		$president=$_POST['president'];
		$viceint=$_POST['viceint'];
		$viceext=$_POST['viceext'];
		$secretary=$_POST['secretary'];
		$treasurer=$_POST['treasurer'];
		$auditor=$_POST['auditor'];
		$pro=$_POST['pro'];
		
		echo "<h1>Official Ballot<br></h1>";
		
		//president
		$sql=mysqli_query($conn,"select * from records where username='$president'")or die(mysqli_error());
		if(mysqli_num_rows($sql) > 0) {
			while($row=mysqli_fetch_assoc($sql)){ 
				echo "<b>President: </b>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
			}
		} 
		else {
			echo "<b>President:</b> No record found <br>.";
		}
	
		//vp internal
		$sql=mysqli_query($conn,"select * from records where username='$viceint'")or die(mysqli_error());
		if(mysqli_num_rows($sql) > 0) {
			while($row=mysqli_fetch_assoc($sql)){ 
				echo "<b>Vice President Internal: </b>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
			}
		} 
		else {
			echo "<b>Vice President Internal:</b> No record found <br>.";
		}
		
		//vp external
		$sql=mysqli_query($conn,"select * from records where username='$viceext'")or die(mysqli_error());
		if(mysqli_num_rows($sql) > 0) {
			while($row=mysqli_fetch_assoc($sql)){ 
				echo "<b>Vice President External: </b>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
			}
		} 
		else {
			echo "<b>Vice President External:</b> No record found <br>.";
		}
		
		//secretary
		$sql=mysqli_query($conn,"select * from records where username='$secretary'")or die(mysqli_error());
		if(mysqli_num_rows($sql) > 0) {
			while($row=mysqli_fetch_assoc($sql)){ 
				echo "<b>Secretary: </b>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
			}
		} 
		else {
			echo "<b>Secretary:</b> No record found <br>.";
		}
		
		//treasurer
		$sql=mysqli_query($conn,"select * from records where username='$treasurer'")or die(mysqli_error());
		if(mysqli_num_rows($sql) > 0) {
			while($row=mysqli_fetch_assoc($sql)){ 
				echo "<b>Treasurer: </b>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
			}
		} 
		else {
			echo "<b>Treasurer:</b> No record found <br>.";
		}
		
		//auditor
		$sql=mysqli_query($conn,"select * from records where username='$auditor'")or die(mysqli_error());
		if(mysqli_num_rows($sql) > 0) {
			while($row=mysqli_fetch_assoc($sql)){ 
				echo "<b>Auditor: </b>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
			}
		} 
		else {
			echo "<b>Auditor:</b> No record found <br>.";
		}
		
		//pro
		$sql=mysqli_query($conn,"select * from records where username='$pro'")or die(mysqli_error());
		if(mysqli_num_rows($sql) > 0) {
			while($row=mysqli_fetch_assoc($sql)){ 
				echo "<b>PRO: </b>" . $row["firstname"] . " " . $row["lastname"] . "<br>";
			}
		} 
		else {
			echo "<b>PRO:</b> No record found <br>.";
		}
		
		//set session to be used in finalvote.php
		$_SESSION["president"] = $president;
		$_SESSION["viceint"] = $viceint;
		$_SESSION["viceext"] = $viceext;
		$_SESSION["secretary"] = $secretary;
		$_SESSION["treasurer"] = $treasurer;
		$_SESSION["auditor"] = $auditor;
		$_SESSION["pro"] = $pro; 
	}
?>
	<br><br>
	<form method ="post" action="finalvote.php">
	<button type="submit" name="submit" value="SubmitFinalVote">Submit Final Vote</button>
	</form>
	
	<a href = submit_vote.php>Back</a>

</body>
</html>
