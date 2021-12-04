<html>
<?php 
    session_start();
    ob_start();
	
	include('login.php');
	$session_id = $_SESSION['username'];
?>

<?php
	if (isset($_POST['submit'])){
		$president=$_POST['president'];
		mysqli_query($conn,"insert into votes(username) values('$president')")or die(mysqli_error());

		$viceint=$_POST['viceint'];
		mysqli_query($conn,"insert into votes(username) values('$viceint')")or die(mysqli_error());

		$viceext=$_POST['viceext'];
		mysqli_query($conn,"insert into votes(username) values('$viceext')")or die(mysqli_error());

		$secretary=$_POST['secretary'];
		mysqli_query($conn,"insert into votes(username) values('$secretary')")or die(mysqli_error());

		$treasurer=$_POST['treasurer'];
		mysqli_query($conn,"insert into votes(username) values('$treasurer')")or die(mysqli_error());

		$auditor=$_POST['auditor'];
		mysqli_query($conn,"insert into votes(username) values('$auditor')")or die(mysqli_error());

		$pro=$_POST['pro'];
		mysqli_query($conn,"insert into votes(username) values('$pro')")or die(mysqli_error());

		mysqli_query($conn,"update records set status='voted' where username='$username'") or die(mysqli_error());
	}
?>
<head>
</head>

<body>
	<div class="wrapper">
		<div class="hero-body-voting"><div class="vote_wise1"><font color="white" size="6">"Official Ballot"</font></div>
			<div class="back"><a class="btn btn-info" id="bak"  href="voting.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></div>
		</div>

		<form method="POST">
			<?php 
				if (isset($_POST['save'])){
					$president=$_POST['president'];
					$viceint=$_POST['viceint'];
					$viceext=$_POST['viceext'];
					$secretary=$_POST['secretary'];
					$treasurer=$_POST['treasurer'];
					$auditor=$_POST['auditor'];
					$pro=$_POST['pro'];

				//president
				$result=mysqli_query($conn,"select * from records where username='$president'")or die(mysqli_query($conn,));
				$row=mysqli_fetch_array($result);
				$name=$row['firstName']."  ".$row['lastName'];
				
				//vp internal
				$viceint=mysqli_query($conn,"select * from records where username='$viceint'")or die(mysqli_query($conn,));
				$row_viceint=mysqli_fetch_array($viceint);
				$name1=$row_vice['firstname']."  ".$row_vice['lastname'];
				
				//vp external
				$viceext=mysqli_query($conn,"select * from records where username='$viceext'")or die(mysqli_query($conn,));
				$viceext_row=mysqli_fetch_array($viceext);
				$name2=$viceext_row['firstname']."  ".$viceext_row['lastname'];
				
				//secretary
				$secretary=mysqli_query($conn,"select * from records where username='$secretary'")or die(mysqli_query($conn,));
				$secretary_row=mysqli_fetch_array($secretary);
				$name3=$secretary_row['firstname']."  ".$secretary_row['lastname'];
				
				//treasurer
				$treasurer=mysqli_query($conn,"select * from records where username='$treasurer'")or die(mysqli_query($conn,));
				$treasurer=mysqli_fetch_array($treasurer);
				$name4=$treasurer_row['firstname']."  ".$treasurer_row['lastname'];
				
				//auditor
				$auditor=mysqli_query($conn,"select * from records where username='$auditor'")or die(mysqli_query($conn,));
				$auditor_row=mysqli_fetch_array($auditor);
				$name5=$auditor_row['firstname']."  ".$auditor_row['lastname'];
				
				//pro
				$pro=mysqli_query($conn,"select * from records where username='$pro'")or die(mysqli_query($conn,));
				$pro_row=mysqli_fetch_array($pro);
				$name6=$pro_row['firstname']."  ".$pro_row['lastname'];
			 ?>

			<div class="ballot">
				<div class="cent">
					<p>President:&nbsp;&nbsp;</p>

					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

					<?php  echo $name; 
					if ($president == "--Select Candidate--"){
					echo 'NO Candidate Selected'; 
					}
					?>

					<input type="hidden" name="president" value="<?php echo $president; ?>"/>
				</div>

				</br></br>
				
				<div class="cent">
				<p>Vice President Internal:&nbsp;&nbsp;</p>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php  echo $name1;
					if ($viceint == "--Select Candidate--"){
					echo 'NO Candidate Selected'; 
					}

					 ?>
					 <input type="hidden" name="viceint" value="<?php echo $viceint; ?>"/>
				</div>
				</br></br>
				
				<div class="cent"><p>Vice President External:&nbsp;&nbsp;</p>
					<?php  echo $name2;
					if ($viceext == "--Select Candidate--"){
					echo 'NO Candidate Selected'; 
					}

					 ?>
					 <input type="hidden" name="viceext" value="<?php echo $viceext; ?>"/>
				</div>
				</br></br>
				
				<div class="cent"><p>Secretary:&nbsp;&nbsp;</p>
					<?php  echo $name3;
					if ($secretary == "--Select Candidate--"){
					echo 'NO Candidate Selected'; 
					}

					 ?>
					 <input type="hidden" name="secretary" value="<?php echo $secretary; ?>"/>
				</div>
				</br></br>
				
				<div class="cent"><p>Treasurer:&nbsp;&nbsp;</p>
					<?php  echo $name4;
					if ($treasurer == "--Select Candidate--"){
					echo 'NO Candidate Selected'; 
					}

					 ?>
					 <input type="hidden" name="treasurer" value="<?php echo $treasurer; ?>"/>
				</div>
				</br></br>
				
				<div class="cent"><p>Auditor:&nbsp;&nbsp;</p>
					<?php  echo $name5;
					if ($auditor == "--Select Candidate--"){
					echo 'NO Candidate Selected'; 
					}

					 ?>
					 <input type="hidden" name="auditor" value="<?php echo $auditor; ?>"/>
				</div>
				</br></br>
				
				<div class="cent"><p>PRO:&nbsp;&nbsp;</p>
					<?php  echo $name6;
					if ($auditor == "--Select Candidate--"){
					echo 'NO Candidate Selected'; 
					}

					 ?>
					 <input type="hidden" name="pro" value="<?php echo $pro; ?>"/>
				</div>
				</br></br>
			</div>

			<?php
				if (isset($_POST['vote'])){
				$president=$_POST['president'];
				mysqli_query($conn,"insert into votes (username)values('$president')")or die(mysqli_error());

				$viceint=$_POST['viceint'];
				mysqli_query($conn,"insert into votes (username)values('$viceint')")or die(mysqli_error());

				$viceext=$_POST['viceext'];
				mysqli_query($conn,"insert into votes (username)values('$viceext')")or die(mysqli_error());

				$secretary=$_POST['secretary'];
				mysqli_query($conn,"insert into votes (username)values('$secretary')")or die(mysqli_error());

				$treasurer=$_POST['treasurer'];
				mysqli_query($conn,"insert into votes (username)values('$treasurer')")or die(mysqli_error());
				
				$auditor=$_POST['auditor'];
				mysqli_query($conn,"insert into votes (username)values('$auditor')")or die(mysqli_error());
				
				$pro=$_POST['pro'];
				mysqli_query($conn,"insert into votes (username)values('$pro')")or die(mysqli_error());
	
				mysqli_query($conn,"update voters set Status='Voted' where username='$session_id'") or die(mysqli_error());
			?>

			<?php
				redirect('thankyou.php');
			?>

			<div class="hero-body-456">
				<div class="ok_vote">
					<a class="btn btn-success" id="logout" data-toggle="modal" href="#myModal"><i class="icon-off"></i>&nbsp;Submit Final Votes</a>
					<div class="modal hide fade" id="myModal">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">�</button>
							<h3> </h3>
						 </div>
						 <div class="modal-body">
							<p><font color="gray">Are You Sure you Want to Submit Final Votes?</font></p>
						 </div>
						<div class="modal-footer">
							<a href="#" class="btn" data-dismiss="modal">No</a>
							<button id="save_voter" class="btn btn-success" name="vote"><i class="icon-save icon-large"></i>&nbsp;Yes</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>