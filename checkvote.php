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
				margin: 50px;
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
				echo "<h1>You can only vote once.</h1>";
			} 	
			else
			{
				$president=$_POST['president'];
				$viceint=$_POST['viceint'];
				$viceext=$_POST['viceext'];
				$secretary=$_POST['sec'];
				$treasurer=$_POST['trs'];
				$auditor=$_POST['aud'];
				$pro=$_POST['pro'];
				
				echo "<div class='hero-body-aud' style='text-align:center;'><h2>Official Ballot</h2></div>";
				echo $president;

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
			
				// //vp internal
				// $sql=mysqli_query($conn,"select * from records where username='$viceint'")or die(mysqli_error());
				// if(mysqli_num_rows($sql) > 0) {
				// 	while($row=mysqli_fetch_assoc($sql)){ 
				// 		echo "<b>Vice President Internal: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
				// 	}
				// } 
				// else {
				// 	echo "<b>Vice President Internal:</b> No record found <br>";
				// }
				
				// //vp external
				// $sql=mysqli_query($conn,"select * from records where username='$viceext'")or die(mysqli_error());
				// if(mysqli_num_rows($sql) > 0) {
				// 	while($row=mysqli_fetch_assoc($sql)){ 
				// 		echo "<b>Vice President External: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
				// 	}
				// } 
				// else {
				// 	echo "<b>Vice President External:</b> No record found <br>";
				// }
				
				// //secretary
				// $sql=mysqli_query($conn,"select * from records where username='$secretary'")or die(mysqli_error());
				// if(mysqli_num_rows($sql) > 0) {
				// 	while($row=mysqli_fetch_assoc($sql)){ 
				// 		echo "<b>Secretary: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
				// 	}
				// } 
				// else {
				// 	echo "<b>Secretary:</b> No record found <br>";
				// }
				
				// //treasurer
				// $sql=mysqli_query($conn,"select * from records where username='$treasurer'")or die(mysqli_error());
				// if(mysqli_num_rows($sql) > 0) {
				// 	while($row=mysqli_fetch_assoc($sql)){ 
				// 		echo "<b>Treasurer: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
				// 	}
				// } 
				// else {
				// 	echo "<b>Treasurer:</b> No record found <br>";
				// }
				
				// //auditor
				// $sql=mysqli_query($conn,"select * from records where username='$auditor'")or die(mysqli_error());
				// if(mysqli_num_rows($sql) > 0) {
				// 	while($row=mysqli_fetch_assoc($sql)){ 
				// 		echo "<b>Auditor: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
				// 	}
				// } 
				// else {
				// 	echo "<b>Auditor:</b> No record found <br>";
				// }
				
				// //pro
				// $sql=mysqli_query($conn,"select * from records where username='$pro'")or die(mysqli_error());
				// if(mysqli_num_rows($sql) > 0) {
				// 	while($row=mysqli_fetch_assoc($sql)){ 
				// 		echo "<b>PRO: </b>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."<br>";
				// 	}
				// } 
				// else {
				// 	echo "<b>PRO:</b> No record found <br>";
				// }
				?>
				<br><br>
				<form method ="post" action="finalvote.php">
				<button type="submit" name="SubmitFinalVote">Submit Final Vote</button>
				</form>
		<?php				
				//set session to be used in finalvote.php
				$_SESSION["president"] = $president;
				$_SESSION["viceint"] = $viceint;
				$_SESSION["viceext"] = $viceext;
				$_SESSION["secretary"] = $secretary;
				$_SESSION["treasurer"] = $treasurer;
				$_SESSION["auditor"] = $auditor;
				$_SESSION["pro"] = $pro; 
			}
					
				}
			} 
			else {
				header("location: submitvote.php");
			}
		?>	
	<a href = submitvote.php>Back</a>
	</body>
</html>								