<?php
$db=mysqli_connect('127.0.0.1','root','','login_db');

if(isset($_POST['Author']) and isset($_POST['OriginalTitle']) and isset($_POST['Book_Edit_ID']))
{
	$update_table="UPDATE `books` SET Author ='".$_POST['Author']."', OriginalTitle ='".$_POST['OriginalTitle']."' where ID=".$_POST['Book_Edit_ID'];
	$resultat1 = mysqli_query($db,$update_table);
	header('Location: myLibrary.php');
}

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="css/stile_sign_up.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link href="css/myLibrary.css" rel="stylesheet" type="text/css">
  <title>Książki</title>
</head>

<body>
<div class="all">
<?php 
include 'header.php'; 
?>
<div class"reservedbooks">
<?php
	$cookieuser = isset($_COOKIE["User_id"]) ? $_COOKIE["User_id"] : NULL;
	if(!empty($cookieuser))	
	{
		echo '<a href="/reservedbooks.php">books</a>';
	}
	else{
		echo ' ';
	}
?>
</div>
<div class= "Books">
<form action="myLibrary.php" method="POST">
<table>
<?php 
$query = "SELECT COUNT(*) from `books`";
$number_of_books= intval (mysqli_fetch_array(mysqli_query($db,$query))['COUNT(*)']);
$result_per_page=50;// on 1  page
$number_of_pages= ceil($number_of_books/$result_per_page);// page count 
$idcount=1;
$empty='';
if(!isset($_GET['page']))
{
	$page=1;
} else{
	$page=$_GET['page'];
}
$this_page_first_result=($page-1)*$result_per_page;//
$sql = "SELECT `ID` , `Author`, `OriginalTitle`  FROM `books` ORDER BY 'ID' LIMIT ".$this_page_first_result.','.$result_per_page;
$query_result = mysqli_query($db,$sql);
while($row= mysqli_fetch_array($query_result))
{
	echo '<tr>';
	$Author=$row['Author'];
	$OriginalTitle=$row['OriginalTitle'];
	$bookid=$row['ID'];
	if(isset($_POST['Book_Edit_ID']) and  $_POST['Book_Edit_ID']==$bookid)
	{
		echo '<tr>';
		echo '<td>'.$idcount++.'</td>';
		echo '<td><p><input name="Author" value='.$Author.'><input type="hidden" name="Book_Edit_ID" value='.$bookid.'></p></td>';
		echo '<td><p><input name="OriginalTitle" value='.$OriginalTitle.'></p></td>';
		echo '<td><button type="submit" value="save" name="save">zapisz</button></td>';
		echo '</tr>';
	}
	else
	{
		echo '<td>'.$idcount++.'</td>';
		echo '<td>'.$Author.'</td>';
		echo '<td>'.$OriginalTitle.'</td>';
		echo '<td><button type="submit" name="Book_Reserve_ID" value='.$bookid.'>rezervacja</button>';
		
		$cookieuser = isset($_COOKIE["User_id"]) ? $_COOKIE["User_id"] : NULL;
		if(!empty($cookieuser))	
		{
			//echo '<button type="submit" name="Book_Edit_ID" value='.$bookid.'>edit</button>'.$empty.'</td>';
		}
		else{
			echo ' ';
		}
		//echo '<button type="submit" name="Book_Edit_ID" value='.$ID.'>edit</button>'.$empty.'</td>';
		if(isset($_POST['Book_Reserve_ID']) and $_POST['Book_Reserve_ID']==$bookid)
		{	
			echo '<td>';
			
			$User_Id_cookie=$_COOKIE["User_id"];
			if(isset($_POST['NR_Pesel']) and isset($User_Id_cookie) and isset($_POST['zatwierdz']))
			{
				$BookReserveId=$_POST['Book_Reserve_ID'];
				$Pesel_Id_Selected="SELECT `NR_Pesel` FROM `signup` where `User_id`=".$User_Id_cookie;
				$insertTorezerwacja='INSERT INTO `rezervacja`(`iduser`,`idksiazki`) values('.$User_Id_cookie.','.$BookReserveId.')';
				
				mysqli_query($db,$insertTorezerwacja);
				$resultselect = mysqli_query($db,$Pesel_Id_Selected);
				while($row= mysqli_fetch_array($resultselect))
				{
					
					if($row['NR_Pesel']==$_POST['NR_Pesel'])
					{
						echo "czekamy na podtwierdzenie";
					}
					else
					{
						echo "Pesel podany nie prawidlowo";
					}
					setcookie('NR_Pesel',$row['NR_Pesel'],time() + (60*60*24*30));
				}	
	
			}
			else
			{
				echo '<input type="hidden" name="Book_Reserve_ID" value='.$_POST['Book_Reserve_ID'].'>';
				echo '<input name="NR_Pesel">wpisz nr pesel dla rezervacja ksiazki  <button type="submit" value="zatwierdz" name="zatwierdz">zatwirdz</button>';
			}
			echo '</td>';
		}
		
		//unset($_POST['Book_Reserve_ID']);
		echo '</tr>';
		
	}
}

?>

</table>
</form>
</div>
<?php 
/*if($number_of_pages>7)
{
	if($page==1)
		{
			echo '<a href="myLibrary.php?page="><a>';
		}
		else
		{
	echo '<a href="myLibrary.php?page=1">1<a>... ';
		}*/
	echo '<a href="myLibrary.php?page=1">1<a>... ';
	for($i=$page;$i<=$page+1;$i++){
		
		echo '<a href="myLibrary.php?page='.$i.'">'.$i.'<a> ';
		
	}
	$p2=$page++;
	echo '...<a href="myLibrary.php?page=1">'.$number_of_pages.'<a>';
	//echo '<button type="submit" onclick='<a href="myLibrary.php?page='.$2.'">' '<a> ' name= "ID">Następna</button>';
//}
/*else
{
	for($i=1;$i<=$number_of_pages;$i++){
		echo '<a href="myLibrary.php?page='.$i.'">' .$i.'<a>';
	}
}*/
?>
</div>
</body>

</html>
