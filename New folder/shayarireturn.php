<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
		<div class="container">
  <a class="navbar-brand " href="#">UNKNOWN WRITER</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav justify-content-center mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Quote</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#contact" data-toggle="modal">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#register" data-toggle="modal">Registration</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</div>
</nav><br>




<?php
	$con=mysqli_connect("localhost","root","") or die("db connection failed");
	mysqli_select_db($con,writer) or die ("db connection error");

	$result=mysqli_query($con,"select * from shers") or die ("data selection failed");

	if (mysqli_num_rows($result)>0){
		while($rows=mysqli_fetch_assoc($result)){
			echo "
         
			
			<div class='container'>
		<p href='bootstrap.min.css'>
			<div class='card-deck'>
			   <div class='card text-white bg-dark mb-3' style='max-width:30rem;'>
  					<div class='card-header'>Shayaro ki Duniya</div>
 						 <div class='card-body'>
   							 <h4 class='card-title'> ".$rows['id']."</h4>
   							 <p class='card-text font-italic text-center'>".$rows['sher']."</p>
 						 </div>
					</div>
          <div class='card text-white bg-dark mb-3' style='max-width:30rem;'>
            <div class='card-header'>Shayaro ki Duniya</div>
             <div class='card-body'>
                 <h4 class='card-title'> ".$rows['id1']."</h4>
                 <p class='card-text font-italic text-center'>".$rows['sher1']."</p>
             </div>
          </div>
          <div class='card text-white bg-dark mb-3' style='max-width:30rem;'>
            <div class='card-header'>Shayaro ki Duniya</div>
             <div class='card-body'>
                 <h4 class='card-title'> ".$rows['id2']."</h4>
                 <p class='card-text font-italic text-center'>".$rows['sher2']."</p>
             </div>
          </div>
					
		</p>
		</div>
			";
		}
	}

?>

</body>
</html>