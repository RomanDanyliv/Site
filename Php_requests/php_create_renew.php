<?php
session_start();
$mysqli = mysql_connect('localhost', 'root', '');
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
mysql_select_db('Site',$mysqli);
if ($_POST['Id']=='0')
{
$ask="INSERT INTO Posts (LOGO, BODY, OPTIONAL, MIN_R, MAX_R, DATE) VALUES ('";
$ask .=$_POST['LOGO']."', '";
$ask .=$_POST['BODY_TXT']."', '";
$ask .=$_POST['OPTIONAL']."', '";
$ask .=$_POST['MIN_R']."', '";
$ask .=$_POST['MAX_R']."', '";
if ($_POST['DATE_TODAY']=='yes')
$ask .=date('y-m-d')."')"; else $ask .=$_POST['DATE']."')";
//echo $ask;
$res1=mysql_query($ask);}
else
{$ask="UPDATE Posts SET ";
$ask.="LOGO='".$_POST['LOGO']."', ";
$ask.="BODY='".$_POST['BODY_TXT']."', ";
$ask.="OPTIONAL='".$_POST['OPTIONAL']."', ";
$ask.="MIN_R='".$_POST['MIN_R']."', ";
$ask.="MAX_R='".$_POST['MAX_R']."', ";
if ($_POST['DATE_TODAY']=='yes')
{$ask.="DATE='".date('y-m-d')."' ";} else {$ask.="DATE='".$_POST['DATE']."' ";};
$ask.="WHERE Id=".$_POST['Id']."";
//echo $ask;
$res1=mysql_query($ask);
}
mysql_close($mysqli);
?>