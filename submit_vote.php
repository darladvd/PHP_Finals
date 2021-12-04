<?php 
		//if(!isset($_SESSION['username'])) {
		//	header("location: login.php");
		//}
        session_start();
        ob_start();
		
		$conn = mysqli_connect('localhost','root','','phpfinals');
 ?>
</head>
<style>
	body {
		font-family: arial;
		margin: 50px;
		text-align: center;
	}
	img {
		width: 150px; 
		height: 150;
	}
</style>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<h1>FEU Alabang ACM Student Chapter Voting System</h1>
			</div>
		</div>
	</div>
<div class="wrapper">
	<div class="hero-body-voting"><h2>"Please Vote Wisely"</h2></div><br>
	<form method ="post" action="vote.php">
		<div class="president-align">
			<div class="hero-body-presindent"><h2>Candidate for President</h2></div>

			<div class="president">
				<div class="president-margin">
					<?php 
						$president=mysqli_query($conn,"select * from records where position='president'")or die(mysqli_error());
						while($row=mysqli_fetch_array($president)){ 
						$president_id=$row['username']; 
							if($row['images']!=''){
								echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>" . " ";
							}
							else{
								echo "<img src='images/default.jpg'>";
							}
						}
					?>
				</div>
			</div>
			<br>
			<div class="select_president">
				<div class="margin-president">
					<select name="president" class="span222">
						<?php
						$president=mysqli_query($conn,"select * from records where position='president'")or die(mysqli_error());
						while($row=mysqli_fetch_array($president)){ $president_id=$row['username']; ?>
						<option value="<?php echo $president_id; ?>" class="option"><?php  echo $row['firstname']." ".$row['lastname']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="viceint-align">
			<div class="hero-body-viceint"><h2>Candidate for Vice President Internal</h2></div>

			<div class="viceint">
				<div class="viceint-margin">
					<?php 
					$viceint=mysqli_query($conn,"select * from records where position='Vice President Internal'")or die(mysqli_error());
					while($row=mysqli_fetch_array($viceint)){ 
						$viceint_id=$row['username']; 
						if($row['images']!=''){
							echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>" . " ";
						}
						else{
							echo "<img src='images/default.jpg'>";
						}
					}
					?>
				</div>
			</div>
			<br>
			<div class="select_viceint"> 
				<div class="margin-viceint">
					<select name="viceint" class="span222">
						<?php
						$viceint=mysqli_query($conn,"select * from records where position='Vice President Internal'")or die(mysqli_error());
						while($row=mysqli_fetch_array($viceint)){ $viceint_id=$row['username']; ?>
						<option value="<?php echo $viceint_id; ?>" class="option"><?php  echo $row['firstname']." ".$row['lastname']; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
		</div>

		<div class="viceext-align">
			<div class="hero-body-viceext"><h2>Candidate for Vice President External</h2></div>
				<div class="viceext">
					<div class="viceext-margin">
						<?php 
						$viceext=mysqli_query($conn,"select * from records where position='Vice President External'")or die(mysqli_error());
						while($row=mysqli_fetch_array($viceext)){ 
						$viceext_id=$row['username']; 
							if($row['images']!=''){
								echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>" . " ";
							}
							else{
								echo "<img src='images/default.jpg'>";
							}
						}
						?>
					</div>
				</div>
				<br>
				<div class="select_viceext"> 
					<div class="margin-viceext">
						<select name="viceext" class="span222">
							<?php
							$viceext=mysqli_query($conn,"select * from records where position='Vice President External'")or die(mysqli_error());
							while($row=mysqli_fetch_array($viceext)){ $viceext_id=$row['username']; ?>
							<option value="<?php echo $viceext_id; ?>" class="option"><?php  echo $row['firstname']." ".$row['lastname']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
		</div>
		
		<div class="secretary-align">
			<div class="hero-body-secretary"><h2>Candidate for Secretary</h2></div>
				<div class="secretary">
					<div class="secretary-margin">
						<?php 
						$secretary=mysqli_query($conn,"select * from records where position='Secretary'")or die(mysqli_error());
						while($row=mysqli_fetch_array($secretary)){ 
						$secretary_id=$row['username']; 
							if($row['images']!=''){
								echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>" . " ";
							}
							else{
								echo "<img src='images/default.jpg'>";
							}
						}
						?>
					</div>
				</div>
				<br>
				<div class="select_secretary"> 
					<div class="margin-secretary">
						<select name="secretary" class="span222">
							<?php
							$secretary=mysqli_query($conn,"select * from records where position='Secretary'")or die(mysqli_error());
							while($row=mysqli_fetch_array($secretary)){ $secretary_id=$row['username']; ?>
							<option value="<?php echo $secretary_id; ?>" class="option"><?php  echo $row['firstname']." ".$row['lastname']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
		</div>
		
		<div class="treasurer-align">
			<div class="hero-body-treasurer"><h2>Candidate for Treasurer</h2></div>
				<div class="treasurer">
					<div class="treasurer-margin">
						<?php 
						$treasurer=mysqli_query($conn,"select * from records where position='Treasurer'")or die(mysqli_error());
						while($row=mysqli_fetch_array($treasurer)){ 
						$treasurer_id=$row['username']; 
							if($row['images']!=''){
								echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>" . " ";
							}
							else{
								echo "<img src='images/default.jpg'>";
							}
						}
						?>
					</div>
				</div>
				<br>
				<div class="select_treasurer"> 
					<div class="margin-treasurer">
						<select name="treasurer" class="span222">
							<?php
							$treasurer=mysqli_query($conn,"select * from records where position='Treasurer'")or die(mysqli_error());
							while($row=mysqli_fetch_array($treasurer)){ $treasurer_id=$row['username']; ?>
							<option value="<?php echo $treasurer_id; ?>" class="option"><?php  echo $row['firstname']." ".$row['lastname']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
		</div>
		
		<div class="auditor-align">
			<div class="hero-body-auditor"><h2>Candidate for Auditor</h2></div>
				<div class="auditor">
					<div class="auditor-margin">
						<?php 
						$auditor=mysqli_query($conn,"select * from records where position='Auditor'")or die(mysqli_error());
						while($row=mysqli_fetch_array($auditor)){ 
						$auditor_id=$row['username']; 
							if($row['images']!=''){
								echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>" . " ";
							}
							else{
								echo "<img src='images/default.jpg'>";
							}
						}
						?>
					</div>
				</div>
				<br>
				<div class="select_auditor"> 
					<div class="margin-auditor">
						<select name="auditor" class="span222">
							<?php
							$auditor=mysqli_query($conn,"select * from records where position='Auditor'")or die(mysqli_error());
							while($row=mysqli_fetch_array($auditor)){ $auditor_id=$row['username']; ?>
							<option value="<?php echo $auditor_id; ?>" class="option"><?php  echo $row['firstname']." ".$row['lastname']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
		</div>
		
		<div class="pro-align">
			<div class="hero-body-pro"><h2>Candidate for PRO</h2></div>
				<div class="pro">
					<div class="pro-margin">
						<?php 
						$pro=mysqli_query($conn,"select * from records where position='PRO'")or die(mysqli_error());
						while($row=mysqli_fetch_array($pro)){ 
						$pro_id=$row['username']; 
							if($row['images']!=''){
								echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='profilepic'/>" . " ";
							}
							else{
								echo "<img src='images/default.jpg'>";
							}
						}
						?>
					</div>
				</div>
				<br>
				<div class="select_pro"> 
					<div class="margin-pro">
						<select name="pro" class="span222">
							<?php
							$pro=mysqli_query($conn,"select * from records where position='PRO'")or die(mysqli_error());
							while($row=mysqli_fetch_array($pro)){ $pro_id=$row['username']; ?>
							<option value="<?php echo $pro_id; ?>" class="option"><?php  echo $row['firstname']." ".$row['lastname']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div>
		</div>
		<br>
		<button type="submit" name="submit">Submit Vote</button>
	</form>
</body>
</html>


	
											