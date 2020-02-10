


<?php


mysql_connect("localhost","root","");
mysql_select_db("slider");

if(isset($_REQUEST["submit"]))
{
	$file=$_FILES["file"]["name"];
	$temp_name=$_FILES["file"]["tmp_name"];
	$path="images/".$file;

	move_uploaded_file($temp_name,$path);

	mysql_query("insert into slides(image) values ('$file')");
}



?>

<form method="post" enctype="multipart/form-data">

	image upload:<input type="file" name="file">
	<input type="submit" name="submit" value="upload image">
	


</form>