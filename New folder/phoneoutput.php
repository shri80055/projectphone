
<html>
    <head>
        <title>mobile info</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
        <link href="bootstrap.min.css">
        <style type="text/css">
              .navbar-nav
            {
                list-style: none;
            }
            .navbar-nav li 
            {
                display: inline;
                margin: 0 1px;
            }
            .navbar-nav li a
            {
                display: inline-block;
                text-transform: uppercase;
                text-decoration: none;
                line-height: 20px;
                margin: 5px 25px;
            }
        </style>
    </head>
    <body>
 
        <div class="container">
            <center>
              
                <h1><a class="navbar-brand" href="#">Phone Finder</a></h1>
            </center>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-togger" type="button" data-toggle="collapse" data-target="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="news.html">news</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">tranding</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html">login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">admin</a>
                          </li>
                      </ul>
                </div>
            </nav><br>
       <?php

$con=mysqli_connect("localhost","root","", "phonetable") or die("db connection failed");

$set=$_POST['search'];

if($set) 
{
  $show="SELECT * FROM phonedata WHERE devicename='$set'"; 

  $result=mysqli_query($con,$show);

  while($rows=mysqli_fetch_array($result))
  {
    echo"
	
            <table class='table table-striped table-dark'>
                <thead>
                  <tr>
                    <th scope='col'>Tags</th>
                    <th scope='col'>Info</th>
                  </tr>
                </thead>
                <tbody>
                  <tr >
                    <th scope='row'>Device Name</th>
                    <th>".$rows['devicename']."</th>
</th>
            </tr>
            <tr>
                       <th scope='row'>price</th>
            <td>".$rows['price']."</td>
            </tr>
            <tr>
                     <th scope='row' rowspan='2'>Availability</th>
            <td>".$rows['announce']."</td>
            </tr>
            <tr>
              <td>".$rows['status']."</td>
            </tr>
            <tr>
                         <th>operating system</th>
            <td>".$rows['operating']."</td>
            </tr>
            <tr>
                           <th>processor</th>
            <td> ".$rows['processor']."</td>
            </tr>
            <tr>
                         <th>CPU</th>
            <td>".$rows['cpu']."</td>
            </tr>
            <tr>
                       <th rowspan='2'>camera</th>
               <td>".$rows['rarecam']."</td>
            
            </tr>
            <tr>
                  <td>".$rows['frontcam']."</td>
            </tr>
            <tr>
                      <th>network type</th>
            <td>".$rows['networktype']."</td>
            </tr>
            <tr>
                    <th>senser</th>
            <td>".$rows['senser']."</td>
            </tr>
            <tr>
                 <th>battery</th>
            <td>".$rows['battery']." </td>
            </tr>
            <tr>
                 <th>color</th>
            <td>".$rows['color']."</td>
            </tr>
            <th>SIM</th>
            <td>".$rows['sim']."</td>
            </tr>
            <tr>
            <th>Screen size</th>
            <td>".$rows['screensize']."</td>
            </tr>
            <tr>
            <th>resoluation</th>
            <td>".$rows['resolution']."</td>
            </tr>
            <tr>
            <th>protection</th>
            <td>".$rows['protection']."</td>
            </tr>
            <tr>
            <th rowspan='2'>memory</th>
            
            <td>External storage = ".$rows['external']."</td>
            </tr>
            <tr>
            <td>internal storage = ".$rows['internal']." </td>
            
            </tr>
                 <tr>
            <th>RAM</th>
            <td>".$rows['ram']."</td>
            </tr>
            <tr>
            <th rowspan='4'>sound</th>
            <td>Alert types =".$rows['alerts']."</td>
            </tr>
            <tr>
            
            <td>Loudspeaker =".$rows['loudspeaker']."</td>
            </tr>
            <tr>
            
            <td>3.5mm jack =".$rows['earphone']."</td>
            </tr>
            <tr>
            
            
            <td> ".$rows['mic']."</td>
            </tr>
            <tr>
            <th>body type</th>
            <td>".$rows['bodytype']."</td>
            </tr>
            <tr>
            <th rowspan='2'>charger type</th>
            <td>".$rows['chargerspeed']."</td>
            </tr>
            
            <tr>
            
            <td>".$rows['chargertype']."</td>
            </tr>
            <tr>
            <th rowspan='5'>connecting</th>
            <td>".$rows['wifi']."</td>
            </tr>
            <tr>
            
            <td>Bluetooth = ".$rows['bluetooth']."</td>
            </tr>
            <tr>
            
            <td>GPS = ".$rows['gps']."</td>
            </tr>
            <tr>
            
            <td>Radio = ".$rows['radio']."</td>
            </tr>
            <tr>
            
            <td>Infrared port =".$rows['infrared']."</td>
            </tr>

                </tbody>
              </table>
              ";
		}
	}

?>

            </div>
            
    </body>
</html>