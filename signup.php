<?php
$dbc=mysqli_connect('127.0.0.1','root','','login_db');
if(isset($_POST['submit']))
	{
		$username = mysqli_real_escape_string($dbc,trim($_POST['username']));
		$password1 = mysqli_real_escape_string($dbc,trim($_POST['password1']));
		$password2 = mysqli_real_escape_string($dbc,trim($_POST['password2']));
		$pesel = mysqli_real_escape_string($dbc,trim($_POST['pesel']));
		$email = mysqli_real_escape_string($dbc,trim($_POST['email']));
		if(!empty($username)&&!empty($password1)&&!empty($password2)&&!empty($pesel)&&!empty($email)&&
		$password1 == $password2)
		{
			$query = "SELECT * FROM `signup` WHERE User_Name = '$username'";
			$data = mysqli_query($dbc, $query);
			if(mysqli_num_rows($data) == 0)
			{
				$query="INSERT INTO `signup`(User_Name,Password,NR_Pesel,Email)VALUES('$username',SHA('$password1'),'$pesel','$email')";
				mysqli_query($dbc,$query);
				header('Location: signin.php');
				mysqli_close($dbc);
				exit();
			}
			else
			{
				echo 'login juz istnieje';
			}
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
<div class="signup">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label for="username"><h3>Login:</h3></label>
<input type="text" name="username">
<label for="pesel"><h3>Nr Pesel:</h3></label>
<input type="text" name="pesel">
<label for="email"><h3>Email:</h3></label>
<input type="email" name="email">
<label for="password"><h3>Hasło:</h3></label>
<input type="password" name="password1">
<label for="password"><h3>Hasło:</h3></label>
<input type="password" name="password2"><br>
<button class="button_reg"type="submit" name="submit"><h4>Rejestracja</h4></button>
</form>
</div>
</div>
</body>

</html>