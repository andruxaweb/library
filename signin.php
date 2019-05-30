<?php
$dbc=mysqli_connect('127.0.0.1','root','','login_db');
if(empty($_COOKIE['User_id']) && isset($_POST['submit']))
{
			$login_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
			$login_password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
			if(!empty($login_username)&&!empty($login_password1))
			{
				echo('in empty check ifs');
				$query = "SELECT `User_id` , `User_Name` FROM `signup` WHERE User_Name = '$login_username' and Password=SHA('$login_password1')";
				$data = mysqli_query($dbc, $query);
				if(mysqli_num_rows($data) == 1)
				{
					echo('in ifs');
					$row=mysqli_fetch_assoc($data);
					setcookie('User_id',$row['User_id'],time() + (60*60*24*30));
					setcookie('User_Name',$row['User_Name'],time() + (60*60*24*30));
					$queryUserID = 'INSERT INTO `rezervacja`(iduser) values('.$row['User_id'].')';
					$dataUserID = mysqli_query($dbc, $queryUserID);
					$home_url= 'http://'.$_SERVER['HTTP_HOST'];
					header('Location: '.$home_url);
				}
				else
				{
					echo 'login czy hasło wpisane nie prawidłowo';
				}
			}
			else
				{
					echo 'login juz istnieje';
				}
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="css/stile_sign_up.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/themify-icons.css">
  <title>signup</title>
  
</head>

<body>
<div class="all">
<?php 
include 'header.php'; 
?>
<?php
	if(empty($_COOKIE['User_Name'])) {
?>
<div class="signup">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="username"><h3>Login:</h3></label>
<input type="text" name="username">
<label for="password"><h3>Hasło:</h3></label>
<input type="password" name="password1"><br>
<button class="button_reg"type="submit" name="submit"><h4> Logowanie</h4></button>
</form>
<a href="signup.php"><button onclick="location='signup.php'" class="button_reg"type="submit"><h4> Rejestracja</h4></button></a>

<?php
	}
	else
	{
			?>
					<p><a href="myprofile.php"> moj profil</a></p>
					<p><a href="ExitProfil	.php"> wyjsc</a></p>
			<?php		
	}
?>
</div>
</body>

</html>