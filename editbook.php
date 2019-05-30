<?php
$db=mysqli_connect('127.0.0.1','root','','login_db');
if(isset($_POST['edit']))
{
	$ID=$_POST['ID'];
	$Autor=$_POST['Autor'];
	$OriginalTitle=$_POST['OriginalTitle'];
	if(mysqli_query("UPDATE `books` SET Author ='$Author', OriginalTitle = '$OriginalTitle' WHERE ID=$ID"))
		echo "seccessfuly insertion!";
	else
		echo "not seccessfuly insertion!";
}
	$res=mysqli_query("Select Autor, OriginalTitle from `books`");
?>
