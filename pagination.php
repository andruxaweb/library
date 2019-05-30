<?php
$db=mysqli_connect('127.0.0.1','root','','login_db');
$result_per_page=2 ;
$query = "SELECT `User_id` , `User_Name` FROM `signup`";
$result= mysqli_query($db,$query);
$number_of_results= mysqli_num_rows($result);
/*while($row = mysqli_fetch_array($result))
{
	echo $row['User_id']. ' '.$row['User_Name']. '<br>';
}*/
$number_of_pages= ceil($number_of_results/$result_per_page);

if(!isset($_GET['page']))
{
	$page=1;
} else{
	$page=$_GET['page'];
}
$this_page_first_result=($page-1)*$result_per_page;

$sql = "SELECT `User_id` , `User_Name` FROM `signup` LIMIT ".$this_page_first_result.','.$result_per_page;
$result= mysqli_query($db,$sql);
while($row = mysqli_fetch_array($result))
{
	echo $row['User_id']. ' '.$row['User_Name']. '<br>';
}

for($page=1;$page<=$number_of_pages;$page++){
	echo '<a href="pagination.php?page='.$page.'">' .$page.'<a>';
}
?>