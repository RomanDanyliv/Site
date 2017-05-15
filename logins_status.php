<?php
session_start();
$mysqli = mysql_connect('localhost', 'root', '');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
mysql_select_db('Site',$mysqli);
$ask1="SELECT * FROM Users WHERE (Login='".$_POST['Login']."')";
$res1=mysql_query($ask1);
$row = mysql_fetch_row($res1);
if (mysql_num_rows($res1)==0)
{$str="Такого профіля взагалі нема.</br>";} elseif ($row[3]!=$_POST['Password'])
{$str="Пароль не правельний";
	exit;} else { session_start();
	$_SESSION['Login']=$row[1];
$str="Всьо ОК";}
mysql_close($mysqli);
include "Page_parts/Top.php";
include "Page_parts/Header.php";
include "Page_parts/Nav_panel.php";
include "Pages/Login_status_page.php";
include "Page_parts/End.php";
?>