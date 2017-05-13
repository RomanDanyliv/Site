<?php
session_start(); 
echo "1";
$mysqli = mysql_connect('localhost', 'root', '');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
echo "2";
mysql_select_db('Site',$mysqli);
$ask1="SELECT * FROM Users WHERE (Login='".$_POST['Login']."')";
$res1=mysql_query($ask1);
$row = mysql_fetch_row($res1);
echo "3";
if (mysql_num_rows($res1)==0)
{
echo "4";
    $str="Такого профіля взагалі нема.</br>";
} 
elseif ($row[3]!=$_POST['Password'])
{
echo "5";
    $str="Пароль не правельний";
} 
else 
{ 
echo "6";
    session_start();
	$_SESSION['Login']=$_POST['Login'];
$str="Всьо ОК";
}
mysql_close($mysqli);
echo $str;
echo $_POST['Login']."\r";
echo $_POST['Password']."\r";
?>