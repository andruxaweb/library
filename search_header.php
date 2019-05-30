<head>
	<meta charset="utf-8">
	<link href="css/stile_sign_up.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link href="css/myLibrary.css" rel="stylesheet" type="text/css">
  <title>Książki</title>
</head>
<?php
include 'header.php'; 
?>
<div class="search">
<form action="search_header.php" method="POST">
<div class="search1">
<span>wpisz poszukującą książkę </span>

<input placeholder="search" name="search" />
<button type="submit" value="shukaj" name="szukaj" onClick="self.close()">szukaj</button>

</div>

<?php
$db=mysqli_connect('127.0.0.1','root','','login_db');
	
if(isset($_POST['search']))
{
	$SerchBook="SELECT `BookID`,`Author`,`OriginalTitle`,`Title`FROM `books` where `Author`='{$_POST['search']}' or OriginalTitle='{$_POST['search']}' or Title='{$_POST['search']}'";
	$result = mysqli_query($db,$SerchBook);
	while($row= mysqli_fetch_array($result))
	{
		
		
		if($row['Author']==$_POST['search'] or $row['OriginalTitle']==$_POST['search'] or $row['Title']==$_POST['search'])
		{
			echo "mamy taką kiazkę";
			echo "<br>Author:$row[Author]; ";
			echo "<br>Nazwa ksiązki: $row[OriginalTitle]; ";
			echo "<br>oryginalna nazwa ksiązki: $row[Title]";
			echo "<button >ok</button>";
			echo '<button name="Book_Reserve_ID">Zarerezerwuj</button>';
			
				$User_Id_cookie=$_COOKIE["User_id"];
				
			if(isset($_POST['Book_Reserve_ID']))
			{
				$BookRezerveID=$_POST['Book_Reserve_ID'];
				$Pesel_Id_Selected="SELECT `NR_Pesel` FROM `signup` where `User_id`=".$User_Id_cookie;
				$insertTorezerwacja='INSERT INTO `rezervacja`(`iduser`,`idksiazki`) values('.$User_Id_cookie.','.$BookReserveId.')';
			}
			if($insertTorezerwacja=null)
			{
				echo "Wyslany rekwest na zaakceptowanie książki";
			}
			else{
				echo "Zarerezerwuj książkę";
			}
			
		}
		elseif($resultCOunt=0)
		{
			echo "2 echo";
		}
	}

}
else{

}
?>
</form>
</div>