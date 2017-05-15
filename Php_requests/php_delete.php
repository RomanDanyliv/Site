<?php
session_start();
$mysqli = mysql_connect('localhost', 'root', '');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
mysql_select_db('Site',$mysqli);
$ask="DELETE FROM Posts WHERE (Id='".$_POST['Id']."')";
$res1=mysql_query($ask);
//$str="Пост видалено</br>";
mysql_close($mysqli);
?>
