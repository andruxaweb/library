<?php
$db=mysqli_connect('127.0.0.1','root','','login_db');

/*if(isset($_POST['Author']) and isset($_POST['OriginalTitle']) and isset($_POST['Book_Edit_ID']))
{
	$update_table="UPDATE `books` SET Author ='".$_POST['Author']."', OriginalTitle ='".$_POST['OriginalTitle']."' where ID=".$_POST['Book_Edit_ID'];
	$resultat1 = mysqli_query($db,$update_table);
	header('Location: myLibrary.php');
}*/

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link href="css/stile_sign_up.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link href="css/myLibrary.css" rel="stylesheet" type="text/css">
  <title>mybooks</title>
</head>

<body>
<div class="all">
<?php 
include 'header.php'; 
?>
</div>

<?php
$User_Id_cookie=$_COOKIE["User_id"];
$db=mysqli_connect('127.0.0.1','root','','login_db');
$querySelectFromUser="SELECT * FROM `signup`where `User_id`=".$User_Id_cookie ;
$resultUser=mysqli_query($db,$querySelectFromUser);
$idcountBUsers=1;
while($rowUserr=mysqli_fetch_array($resultUser))
			{
				if($rowUserr['Role']=='S')
					{
						$querySelectFromUser="SELECT * FROM `rezervacja`where `iduser`=".$User_Id_cookie ;
						$resultUserFromRezerv=mysqli_query($db,$querySelectFromUser);
						while($rowUserFromrez=mysqli_fetch_array($resultUserFromRezerv))
						{
							$IdbookFromrez=$rowUserFromrez['idksiazki'];
							$Idrezervfromrezerv=$rowUserFromrez['idrezervacji'];
							if($rowUserFromrez['zatwirdzenie']==0)
							{
								$czyzatwierdzona='nie';
							}
							else
							{
								$czyzatwierdzona='tak';
							}
							if($rowUserFromrez['zwrot']==0)
							{
								$czyzwrucil='nie';
							}
							else
							{
								$czyzwrucil='tak';
							}
							if($rowUserFromrez['idksiazki']==null)
							{
								
							}
							else
							{
							$querySelectFromUser='SELECT * FROM `books`where `ID`='.$IdbookFromrez;
							$resultbookFromRezerv=mysqli_query($db,$querySelectFromUser);
							while($rowbookFromrez=mysqli_fetch_array($resultbookFromRezerv))
							{
								$bookname=$rowbookFromrez['OriginalTitle'];
								echo 'id rezervacji'.$Idrezervfromrezerv.'</br>id ksiazki:'.$IdbookFromrez.'</br>nazwa ksiazki:'.$bookname.'</br>Czy ona jest zatwierdzona pracwnikiem :'
								.$czyzatwierdzona.'; </br>Zwrucona ksiazka:'
								.$czyzwrucil.'</br>--------------------------------------------------------</br>';
								echo "$bookname";
							}
							
							}
						}
						
					}
				elseif($rowUserr['Role']=='B')
				{
					if(isset($_POST['idRezervacjiDoZatwierdzenia']) and isset($_POST['wartoscZatwierdzenia']))
					{
						$popszedniawartosczatwierdzenia=$_POST['wartoscZatwierdzenia']==0 ? 1 : 0 ;
						$idRezervacjiDoZatwierdzenia=$_POST['idRezervacjiDoZatwierdzenia'];
						$zatwiedzenieOdbioruquery= "UPDATE `rezervacja` set `zatwirdzenie`= ".$popszedniawartosczatwierdzenia
							." where `idrezervacji` =".$idRezervacjiDoZatwierdzenia ;
						mysqli_query($db,$zatwiedzenieOdbioruquery);	
					}
					
					if(isset($_POST['idRezervacjiDoZwrota']) and isset($_POST['wartoscZwrotu']))
					{
						
						$popszedniawartosczwrotu=$_POST['wartoscZwrotu']==0 ? 1 : 0 ;
						$idRezervacjiDoZwrota=$_POST['idRezervacjiDoZwrota'];
						$zwrotquery= "UPDATE `rezervacja` set `zwrot`= ".$popszedniawartosczwrotu
							." where `idrezervacji` =".$idRezervacjiDoZwrota ;
						mysqli_query($db,$zwrotquery);	
					} 
					
					$querySelectAllUsers='SELECT * FROM `rezervacja`';
					$resultAllUser=mysqli_query($db,$querySelectAllUsers);
					
					
					while($rowAllUserr=mysqli_fetch_array($resultAllUser))
					{
						$idrezervacji=$rowAllUserr['idrezervacji'];
						$iduser=$rowAllUserr['iduser'];
						$zatwirdzenie=$rowAllUserr['zatwirdzenie'];
						$zwrot=$rowAllUserr['zwrot'];
						/*echo '<pre>';
						echo 'zatwirdzenie';
						print_r($zatwirdzenie);
						//print_r($zwrot);
						echo '</pre>';*/
						echo '<tr>';
						?>
						<form action="reservedbooks.php" method="POST" >
						<?php
						echo '<input type="hidden" name="wartoscZatwierdzenia" value='.$zatwirdzenie.'>';
						echo '<input type="hidden" name="wartoscZwrotu" value='.$zwrot.'>';
						echo '<td>numer rezerwacji: '.$idcountBUsers++.' idrezervacji: '.$idrezervacji.' iduser: '.$iduser++.' <button type="submit" value='.$idrezervacji
						.' name= "idRezervacjiDoZatwierdzenia"> zatwiedzenie odbioru</button><span> </span> <button type="submit" value='.$idrezervacji
						.' name= "idRezervacjiDoZwrota" > zwrot</button></td>';	
						?>
					
						</form>
						<?php
						if(isset($idrezervacji) and $zatwirdzenie==0 and $zwrot== 0)
						{ 
							echo "<td>rezervacja oczekuje na zatwiedzenie </br></td>";
						}	
						elseif(isset($idrezervacji) and $zatwirdzenie==0 and $zwrot== 1 )
						{
							echo "<td>rezervacja nie jest zatwierdzona </br></td>";
						}	
						elseif(isset($idrezervacji) and $zatwirdzenie==1 and $zwrot== 0)
						{
							
							echo "<td>rezervacja jest zatwierdzona </br></td>";
						}	
						elseif(isset($idrezervacji) and $zatwirdzenie==1 and $zwrot== 1)
						{
							echo "<td>ksiązka byla wziąta ta zwrucona</br></td>";
						}
						/*echo '<pre>';
						echo 'zatwirdzenie';
						print_r($zatwirdzenie);
						//print_r($zwrot);
						echo '</pre>';*/	
						echo '</tr>';
					}
				}
			}

	/*if(isset($User_Id_cookie))	
	{
	$querySelectFromBooks="SELECT * FROM `books`";
	$resultBooks=mysqli_query($db,$querySelectFromBooks);
	while($rowUser=mysqli_fetch_array($resultUser))
	{
		echo "$User_Id_cookie <br>";
		echo 'Nazwa uzytkownika: '.$rowUser['User_Name'].'';// выводим данные
		echo '</br>Uprawnienie: '.$rowUser['Role'];
	}
	}
	else 
	{
		echo "proszę się zalogować";
	}*/

?>

</body>
</html>