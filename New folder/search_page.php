<?php

$con=mysqli_connect("localhost","root","", "phonetable") or die("db connection failed");

$set=$_POST['search'];

if($set) 
{
  $show="SELECT * FROM phonedata WHERE devicename='$set'"; 

  $result=mysqli_query($con,$show);

  while($rows=mysqli_fetch_assoc($result))
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
              </table>"

  } 
  
}
else
{
	echo "record not found";
}

 

?>