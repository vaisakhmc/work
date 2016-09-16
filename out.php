<HTML>
<head>
    <meta charset="utf-8">
    <title>Car Advisor</title>
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/nav.css" rel="stylesheet">
    
	
	
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-custom" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle page-scroll" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="page.html#home">Car Advisor</a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					
					<li class="menuItem"><a href="page.html#specs">Find Car</a></li>
					<li class="menuItem"><a href="page.html#screen">Upcoming Cars</a></li>
					<li class="menuItem"><a href="page.html#contact">Contact Us</a></li>
				</ul>
			</div>  
		   
		</div>
	</nav> 

<div id="pricing-table" class="clear">
<?php
	$flag=0;
	$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6135375','XiI4LNwEIl','sql6135375');
	if (mysqli_connect_errno()) 
	{
    	throw new Exception(mysqli_connect_error(), mysqli_connect_errno());
	}
	 $seat_value=$_POST['seat1'];
	 $fuel_value=$_POST['fuel1'];
	 $class_value=$_POST['class1'];
	 $body_value=$_POST['bodystyle1'];


	 	if($seat_value=='any' && $body_value=='any')
	 	{ $sql="SELECT * 
		  		FROM car
		  		WHERE (fuel='$fuel_value' AND class='$class_value' )";

	 	}
	 	else if($seat_value=='any')
	 	{ $sql="SELECT * 
		  		FROM car
		  		WHERE (fuel='$fuel_value' AND class='$class_value' AND bodystyle='$body_value')";
		}
	 	else if($body_value=='any')	
	 	{ $sql="SELECT * 
		  		FROM car
		  		WHERE (seat_cmp='$seat_value' AND fuel='$fuel_value' AND class='$class_value' ";
		}
		else
		{
	 
		  $sql="SELECT * 
		  		FROM car
		  		WHERE (seat_cmp='$seat_value' AND fuel='$fuel_value' AND class='$class_value' AND bodystyle='$body_value')";
		}
		

		$qry=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	

		while($row=mysqli_fetch_assoc($qry))
		{
			$name= $row['name'];
			$seat= $row['seat'];
			$body= $row['bodystyle'];
			$cl= $row['class'];
			$fuel= $row['fuel'];
			$disp=$row['Displacement'];
			$mil=$row['Mileage'];
			$img= $row['pic'];
			 ?>

		<div class="plan col-md-5">
        <h3><?php echo $name; ?></h3><span><img alt="error" height="50" width="100" src="<?php echo $img; ?>"  </span>   
        <ul>
            <li><b>Body Style:</b> <?php echo $body; ?></li>
            <li><b>Fuel:</b> <?php echo $fuel; ?></li>
            <li><b>Seats:</b> <?php echo $seat; ?></li>
			<li><b>Displacement:</b> <?php echo $disp; ?></li>	
			<li><b>Mileage:</b> <?php echo $mil; ?></li>	
			<li><b>Class:</b> <?php echo $cl; ?></li>		
        </ul> 	
    	</div>

    	<?php } 
    	mysqli_close($conn);

    	?>
</div>


</body>
</html>