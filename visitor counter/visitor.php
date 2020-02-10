<?php

		$con=mysqli_connect("localhost","root","","visit");
		


		$visitor_ip=$_SERVER['REMOTE_ADDR'];


		$query="SELECT * FROM vtable WHERE ipadress='$visitor_ip'";
		$result=mysqli_query($con,$query);

		$totalv=mysqli_num_rows($result);

		if ($total_visitors<1) {
			
			$query="INSERT INTO vtable(ipadress) VALUES('$visitor_ip')";
		$result=mysqli_query($con,$query);
		}
?>

		<!DOCTYPE html>
		<html>
		<head>
			<style type="text/css">
				
				.wraper
				{
					height:300px;
					width:300px;
					background-color:skyblue;
					margin:auto;
					text-align:center;
					border:1px solid white;
					box-shadow: 2px 2px 10px grey;
				}
				h1
				{

					background-color:mediumseagreen;
					color:white;
					border-bottom:2px solid white;

				}
				h3
				{
					font-size:5em;
				}
				h1 h3
				{
					padding:20px;
					margin: 0px;
				}

			</style>
		</head>
		<body>
				
			<div class="wraper">
				<h1>
					visitor counter
				</h1>
				<h3>
					<?php

						echo $totalv;
					?>
				</h3>
				

			</div>

		</body>
		</html>

