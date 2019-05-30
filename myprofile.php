<head>
	<meta charset="utf-8">
	<link href="css/stile_sign_up.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link href="css/myLibrary.css" rel="stylesheet" type="text/css">
	<link href="css/myprofile.css" rel="stylesheet" type="text/css">
  <title>Książki</title>
</head>
<?php
include 'header.php'; 
?>
<body>
<div class="profile">
<div class="profile_picture">
<img src="/img/profilepicture.png" alt="profile picture">
</div>
<div class="profile_description">
<?php
	$User_Id_cookie=$_COOKIE["User_id"];
	if(isset($User_Id_cookie))	
	{
	$db=mysqli_connect('127.0.0.1','root','','login_db');
	$query="SELECT `User_Name`, `Email`, `Role` FROM `signup`where `User_id`=".$User_Id_cookie;
	$result=mysqli_query($db,$query);
	while($row=mysqli_fetch_array($result))
	{
	echo 'Nazwa uzytkownika: '.$row['User_Name'].'';// выводим данные
	echo '</br>Poczta uzytkownika: '.$row['Email'];
	echo '</br>Uprawnienie: '.$row['Role'];
	}
	}
	
?>
</div>
</div>
</body>