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
			.wrapper {
				background-color: #f8f9fb;
			}

			hr {
			display: block;
			margin-top: 0.5em;
			margin-bottom: 0.5em;
			margin-left: auto;
			margin-right: auto;
			border-style: inset;
			width: 80%;
			border-width: 1px;
			}
			a {
				color: #448bff;
				text-decoration: none;
				background-color: transparent
			}

			a:hover {
				color: #005ef7;
			}

			.block,
			.card {
				background: #fff;
				border-width: 0;
				border-radius: .25rem;
				box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
				margin-bottom: 1.5rem
			}

			.candidate {
				max-width: 50%;
 				max-height: 50%;
				height: 85px;
				width: 100px;
				border-radius: 50%;
			}

			.list-item {
				position: relative;
				display: -ms-flexbox;
				display: flex;
				-ms-flex-direction: column;
				flex-direction: column;
				min-width: 0;
				word-wrap: break-word
			}

			.list-row .list-item {
				-ms-flex-direction: row;
				flex-direction: row;
				-ms-flex-align: center;
				align-items: center;
				padding: .75rem .625rem
			}

			.list-row .list-item>* {
				padding-left: .625rem;
				padding-right: .625rem
			}

			.no-wrap {
				white-space: nowrap
			}

			.text-color {
				color: #5e676f
			}
		</style>

		<?php
			$sql=mysqli_query($conn,"select * from records where username='$username'")or die(mysqli_error());
        
        	while($row=mysqli_fetch_array($sql)){ 
				$votestatus = $row['status'];
			}
		?>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript">
			$(function () {
				var votestatus = "<?php echo $votestatus ?>";
				var x = document.getElementsByClassName('form-check-input');
				if (votestatus == "voted") {	
					var i;
					for (i = 0; i < x.length; i++) {
						x[i].attr("disabled","disabled");
					}
				}
				else {
					var i;
					for (i = 0; i < x.length; i++) {
						x[i].removeAttribute("disabled");
					}
				}
			});
		</script>

    </head>
	<body>
		<div class="wrapper">
			<form method ="post" action="checkvote.php">
			<div class='president-align'> <br>
				<div class='hero-body-president' style='text-align:center;'><h2>Candidate for President</h2></div>
					<div class='padding'>
					<div  class='row justify-content-center'>
					<?php 
						$president=mysqli_query($conn,"select * from records where position='president'")or die(mysqli_error());
						while($row=mysqli_fetch_array($president)){ 
							echo "<div class='col-sm-4'>
								<label>
								<div class='list list-row block'>
								<div class='list-item'>";
							$president_id=$row['username']; 
							
							if($row['images']!=''){
								echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='candidate'/>" . " ";
								echo "<div class='flex'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</div>";
								echo "<div><input class='form-check-input' type='radio' name='president' id='president' value='$president_id' required disabled></div>";
							}
							else{
								echo "<img src='images/default.jpg'>";
							}
							echo "</div>
								</div>
								</label>
								</div>";
						}
					?>
					</div>
				</div>
			</div>
			<hr>
			<div class="viceint-align"> <br>
				<div class="hero-body-viceint" style="text-align:center;"><h2>Candidate for Internal Vice President</h2></div>
					<div class="padding">
					<div  class="row justify-content-center">
						<?php 
							$viceint=mysqli_query($conn,"select * from records where position='VP Internal'")or die(mysqli_error());
							while($row=mysqli_fetch_array($viceint)){ 
								echo "<div class='col-sm-4'>
								<label>
								<div class='list list-row block'>
								<div class='list-item'>";	
								$viceint_id=$row['username']; 
								if($row['images']!=''){
									echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='candidate'/>" . " ";
									echo "<div class='flex'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</div>";
									echo "<div><input class='form-check-input' type='radio' name='viceint' id='viceint' value='$viceint_id' required disabled></div>";
								}
								else{
									echo "<img src='images/default.jpg'>";
								}
								echo "</div>
								</div>
								</label>
								</div>";
							}
						?>
					</div>
					</div>
			</div>
			<hr>
			<div class="viceext-align"> <br>
				<div class="hero-body-viceext" style="text-align:center;"><h2>Candidate for External Vice President</h2></div>
					<div class="padding">
					<div  class="row justify-content-center">
						<?php 
							$viceext=mysqli_query($conn,"select * from records where position='VP External'")or die(mysqli_error());
							while($row=mysqli_fetch_array($viceext)){ 
								echo "<div class='col-sm-4'>
								<label>
								<div class='list list-row block'>
								<div class='list-item'>";
								$viceext_id=$row['username']; 
								if($row['images']!=''){
									echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='candidate'/>" . " ";
									echo "<div class='flex'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</div>";
									echo "<div><input class='form-check-input' type='radio' name='viceext' id='viceext' value='$viceext_id' required disabled></div>";
								}
								else{
									echo "<img src='images/default.jpg'>";
								}
								echo "</div>
								</div>
								</label>
								</div>";
							}
						?>
					</div>
					</div>
			</div>
			<hr>
			<div class="sec-align"> <br>
				<div class="hero-body-sec" style="text-align:center;"><h2>Candidate for Secretary</h2></div>
					<div class="padding">
					<div  class="row justify-content-center">
						<?php 
							$sec=mysqli_query($conn,"select * from records where position='secretary'")or die(mysqli_error());
							while($row=mysqli_fetch_array($sec)){ 
							echo "<div class='col-sm-4'>
							<label>
							<div class='list list-row block'>
							<div class='list-item'>";
							$sec_id=$row['username']; 
								if($row['images']!=''){
									echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='candidate'/>" . " ";
									echo "<div class='flex'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</div>";
									echo "<div><input class='form-check-input' type='radio' name='sec' id='sec' value='$sec_id' required disabled></div>";
								}
								else{
									echo "<img src='images/default.jpg'>";
								}
								echo "</div>
								</div>
								</label>
								</div>";
							}
						?>
					</div>
					</div>
			</div>
			<hr>
			<div class="trs-align"> <br>
				<div class="hero-body-trs" style="text-align:center;"><h2>Candidate for Treasurer</h2></div>
					<div class="padding">
					<div  class="row justify-content-center">
						<?php 
							$trs=mysqli_query($conn,"select * from records where position='treasurer'")or die(mysqli_error());
							while($row=mysqli_fetch_array($trs)){ 
								echo "<div class='col-sm-4'>
								<label>
								<div class='list list-row block'>
								<div class='list-item'>";
								$trs_id=$row['username']; 
								if($row['images']!=''){
									echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='candidate'/>" . " ";
									echo "<div class='flex'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</div>";
									echo "<div><input class='form-check-input' type='radio' name='trs' id='trs' value='$trs_id' required disabled></div>";
								}
								else{
									echo "<img src='images/default.jpg'>";
								}
								echo "</div>
								</div>
								</label>
								</div>";
							}
						?>
					</div>
					</div>
			</div>
			<hr>
			<div class="aud-align"> <br>
				<div class="hero-body-aud" style="text-align:center;"><h2>Candidate for Auditor</h2></div>
					<div class="padding">
					<div  class="row justify-content-center">
								<?php
									$aud=mysqli_query($conn,"select * from records where position='auditor'")or die(mysqli_error());
									while($row=mysqli_fetch_array($aud)){ 
										echo "<div class='col-sm-4'>
										<label>
										<div class='list list-row block'>
										<div class='list-item'>";
										$aud_id=$row['username']; 
										if($row['images']!=''){
											echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='candidate'/>" . " ";
											echo "<div class='flex'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</div>";
											echo "<div><input class='form-check-input' type='radio' name='aud' id='aud' value='$aud_id' required disabled></div>";
										}
										else{
											echo "<img src='images/default.jpg'>";
										}
										echo "</div>
										</div>
										</label>
										</div>";
									}
								?>
					</div>
					</div>
			</div>
			<hr>
			<div class="pro-align"><br>
				<div class="hero-body-pro" style="text-align:center;"><h2>Candidate for Public Relations Officer</h2></div>
					<div class="padding">
					<div class="row justify-content-center">
						<?php 
							$pro=mysqli_query($conn,"select * from records where position='pro' and username='201900014'")or die(mysqli_error());
							while($row=mysqli_fetch_array($pro)){
								echo "<div class='col-sm-4'>
								<label>
								<div class='list list-row block'>
								<div class='list-item'>"; 
								$pro_id=$row['username']; 
								if($row['images']!=''){
									echo "<img src = 'data:image/jpeg;base64," .base64_encode($row["images"]) ."' class='candidate'/>" . " ";
									echo "<div class='flex'>".$row['firstname']." ".$row['middlename']." ".$row['lastname']."</div>";
									echo "<div><input class='form-check-input' type='radio' name='pro' id='pro' value='$pro_id' required disabled></div>";
								}
								else{
									echo "<img src='images/default.jpg'>";
								}
								echo "</div>
								</div>
								</label>
								</div>";
							}
						?>
					</div>
					<button type="submit" name="submitvote" style="margin-left:380px; margin-bottom:20px;" class="btn btn-primary">Submit Vote</button>
					</div>
			</div>
			</form>
		</div><br><br>
	</body>
</html>								
