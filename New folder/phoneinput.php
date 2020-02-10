

<?php

$con=mysqli_connect("localhost", "root", "")or die("database connection error");


mysqli_select_db($con, "phonetable");

if (isset($_POST['submit'])) {
	
$devicename=$_POST['dname'];
$price=$_POST['kimmat'];
$announce=$_POST['announ'];
$status=$_POST['stat'];
$operating=$_POST['os'];
$processor=$_POST['process'];
$cpu=$_POST['cp'];
$rarecam=$_POST['rcam'];
$frontcam=$_POST['fcam'];
$networktype=$_POST['ntype'];
$senser=$_POST['sens'];
$battery=$_POST['bat'];
$color=$_POST['col'];
$sim=$_POST['simcard'];
$screensize=$_POST['scsize'];
$resolution=$_POST['resol'];
$protection=$_POST['protec'];
$external=$_POST['exm'];
$internal=$_POST['inm'];
$ram=$_POST['random'];
$alerts=$_POST['alert'];
$loudspeaker=$_POST['lspeaker'];
$earphone=$_POST['jack'];
$mic=$_POST['mi'];
$bodytype=$_POST['btype'];
$chargerspeed=$_POST['cspeed'];
$chargertype=$_POST['chtype'];
$wifi=$_POST['wi'];
$bluetooth=$_POST['blue'];
$gps=$_POST['location'];
$radio=$_POST['redu'];
$infrared=$_POST['ir'];

mysqli_query($con,"insert into phonedata values('$devicename', '$price','$announce','$status','$operating','$processor','$cpu','$rarecam','$frontcam','$networktype','$senser','$battery','$color','$sim','$screensize','$resolution','$protection','$external', '$internal', '$ram', '$alerts', '$loudspeaker', '$earphone', '$mic', '$bodytype', '$chargerspeed', '$chargertype', '$wifi', '$bluetooth', '$gps', '$radio', '$infrared')")or die("error in data insertion");
}
?>