<?php
$db_login=mysqli_connect('localhost','root','','login_db');
if(isset($_POST['NR_Pesel'] and isset($POST('Uset_id'))))
{
	$Pesel_Id_Selected="SELECT `NR_Pesel` FROM `signup` where `User_id`=".$POST('Uset_id');
	$result = mysqli_query($db_login,$Pesel_Id_Selected);
	while($row= mysqli_fetch_array($result))
	{
		if($NR_Pesel==$POST('NR_Pesel'))
		{
			echo "Pesel jest poprawny";
		}
		else
		{
			echo "Pesel podany nie prawidlowo";
		}
	}
}

?>