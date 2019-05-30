<?php
unset($_COOKIE['User_id']);
unset($_COOKIE['User_Name']);
setcookie('User_id','',-1,'/');
setcookie('User_Name','',-1,'/');
$home_url= 'http://'.$_SERVER['HTTP_HOST'];
header('Location: '.$home_url);
exit;
?>