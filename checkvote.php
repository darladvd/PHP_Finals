<!DOCTYPE html>
<?php 
        session_start();
        ob_start();
		
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
		<style>
			body {
				margin: 100px;
				text-align: center;
				font-size: 20px;
			}
		</style>
    </head>
	<body>
	<?php 
		if(isset($_POST['submitvote'])){
		$username = $_SESSION["username"];
		
		//check if voted or not
		$sql=mysqli_query($conn,"select status from records where username='$username'")or die(mysqli_error());
		while($row=mysqli_fetch_row($sql))
		{ 
			if($row[0] == "voted")
			{
				echo "<script>alert('You can only vote once!')</script>"; 
				header("location: user_home.php");
			} 	
			else
			{
				$president=$_POST['president'];
				$viceint=$_POST['viceint'];
				$viceext=$_POST['viceext'];
				$sec=$_POST['sec'];
				$trs=$_POST['trs'];
				$aud=$_POST['aud'];
				$pro=$_POST['pro'];
				
				echo "<div class='hero-body-aud' style='text-align:center;'><h2>Official Ballot</h2></div>";

				//president
				$sql=mysqli_query($conn,"select * from records where username='$president'")or die(mysqli_error());
				if(mysqli_num_rows($sql) > 0) {
					while($row=mysqli_fetch_assoc($sql)){ 
						echo "<b>President: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
					}
				} 
				else {
					echo "<b>President:</b> No record found <br>";
				}
			
				//vp internal
				$sql=mysqli_query($conn,"select * from records where username='$viceint'")or die(mysqli_error());
				if(mysqli_num_rows($sql) > 0) {
					while($row=mysqli_fetch_assoc($sql)){ 
						echo "<b>Vice President Internal: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
					}
				} 
				else {
					echo "<b>Vice President Internal:</b> No record found <br>";
				}
				
				//vp external
				$sql=mysqli_query($conn,"select * from records where username='$viceext'")or die(mysqli_error());
				if(mysqli_num_rows($sql) > 0) {
					while($row=mysqli_fetch_assoc($sql)){ 
						echo "<b>Vice President External: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
					}
				} 
				else {
					echo "<b>Vice President External:</b> No record found <br>";
				}
				
				//sec
				$sql=mysqli_query($conn,"select * from records where username='$sec'")or die(mysqli_error());
				if(mysqli_num_rows($sql) > 0) {
					while($row=mysqli_fetch_assoc($sql)){ 
						echo "<b>Secretary: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
					}
				} 
				else {
					echo "<b>Secretary:</b> No record found <br>";
				}
				
				//trs
				$sql=mysqli_query($conn,"select * from records where username='$trs'")or die(mysqli_error());
				if(mysqli_num_rows($sql) > 0) {
					while($row=mysqli_fetch_assoc($sql)){ 
						echo "<b>Treasurer: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
					}
				} 
				else {
					echo "<b>Treasurer:</b> No record found <br>";
				}
				
				//aud
				$sql=mysqli_query($conn,"select * from records where username='$aud'")or die(mysqli_error());
				if(mysqli_num_rows($sql) > 0) {
					while($row=mysqli_fetch_assoc($sql)){ 
						echo "<b>Auditor: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
					}
				} 
				else {
					echo "<b>Auditor:</b> No record found <br>";
				}
				
				//pro
				$sql=mysqli_query($conn,"select * from records where username='$pro'")or die(mysqli_error());
				if(mysqli_num_rows($sql) > 0) {
					while($row=mysqli_fetch_assoc($sql)){ 
						echo "<b>PRO: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
					}
				} 
				else {
					echo "<b>PRO:</b> No record found <br>";
				}
			?>
				<br><br>
				<form method ="post" action="finalvote.php">
				<button type="submit" name="SubmitFinalVote" style="margin-left:380px; margin-bottom:20px;" class="btn btn-primary">Submit Final Vote</button>
				</form>
				<form method="get" action="user_home.php">
					<button type="submit" style="margin-left:380px; margin-bottom:20px;" class="btn btn-primary">Back</button>
				</form>
		<?php				
				//set session to be used in finalvote.php
				$_SESSION["president"] = $president;
				$_SESSION["viceint"] = $viceint;
				$_SESSION["viceext"] = $viceext;
				$_SESSION["sec"] = $sec;
				$_SESSION["trs"] = $trs;
				$_SESSION["aud"] = $aud;
				$_SESSION["pro"] = $pro; 
			}
					
				}
			} 
			else {
				header("location: submitvote.php");
			}
		?>	
	</body>
</html>								