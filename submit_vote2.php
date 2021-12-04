<!DOCTYPE html>
<?php
        session_start();
        ob_start();
		
		$governor=mysqli_query($conn,"select * from candidate where Position='Governor'")or die(mysqli_error());
		while($row=mysqli_fetch_array($governor)){ $governor_id=$row['CandidateID']; ?>

		<img class="gov" src="<?php echo $row['images'];?>" width="150" height="150" border="0" onmouseover="showtrail('<?php echo $row['images'];?>','<?php echo $row['FirstName']." ".$row['LastName'];?> ',200,5)" onmouseout="hidetrail()">
		&nbsp;&nbsp;&nbsp;&nbsp;
?>

<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        	<!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">

        <title>Login</title>
        
        <style>
        body {
            background: #ecf3f5;
            font-family: 'Montserrat';
			margin: 50px;
			text-align: center;
        }
		
		select, button{
			width:300px !important;
			height: 47px !important;
			border-radius: 5px;
			font-size: 16px;
			padding: 5px;
		}
		
		label {
			font-size: 30px !important;
		}
		
        </style>
    </head>
    <body>
		<h1><b>PLEASE VOTE WISELY!</b><h1><br>
		<img src="C:\PHPCODE\dashboard\PHP Finals\president1.png" alt="President 1">
		<img src="C:\PHPCODE\dashboard\PHP Finals\president2.png" alt="President 2"><br>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label>President</label>
		<select name="status" class="form-select">
		  <option value="KayeCruzTubice">Kaye Cruz Tubice</option>
		  <option value="NiallJamesHoran">Niall James Horan</option>
		</select><br><br>
		
		<img src="C:\PHPCODE\dashboard\PHP Finals\int1.png" alt="VP Internal 1">
		<img src="C:\PHPCODE\dashboard\PHP Finals\int2.png" alt="VP Internal 2"><br>
		<label>Vice President Internal</label>
		<select name="status" class="form-select">
		  <option value="MarieTolentinoYumul">Marie Tolentino Yumul</option>
		  <option value="DanaDomingoHuang">Dana Domingo Huang</option>
		</select><br><br>
		
		<img src="C:\PHPCODE\dashboard\PHP Finals\ext1.png" alt="VP External 1">
		<img src="C:\PHPCODE\dashboard\PHP Finals\ext2.png" alt="VP External 2"><br>
		<label>Vice President External</label>
		<select name="status" class="form-select">
		  <option value="DiannaLynJuanFormalejo">Dianna Lyn Juan Formalejo</option>
		  <option value="FayeArcilla">Faye Arcilla</option>
		</select><br><br>
		
		<label>Secretary</label>
		<select name="status" class="form-select">
		  <option value="ClariceEstrellado">Clarice Estrellado</option>
		  <option value="LorenzoBalbin">Lorenzo Balbin</option>
		</select><br><br>
		
		<label>Treasurer</label>
		<select name="status" class="form-select">
		  <option value="MarkJustineNazarenoMonterde">Mark Justine Nazareno Monterde</option>
		  <option value="Ma.MiciellaBernardoDecano">Ma. Miciella Bernardo Decano</option>
		</select><br><br>
		
		<label>Auditor</label>
		<select name="status" class="form-select">
		  <option value="DijonVergaraMolina">Dijon Vergara Molina</option>
		  <option value="AlexxandraMacavinta">Alexxandra Macavinta</option>
		</select><br><br>
		
		<label>PRO</label>
		<select name="status" class="form-select">
		  <option value="AngelynnCortezAlmeda">Angelynn Cortez Almeda</option>
		</select><br><br>
		
		
		<button type="submit" name="submit" value="Submit Vote">Submit Vote</button>

        <?php
		

        ?>
        </form>
    </div>
</div>
</form>

    </body>
</html>






