<?php
session_start();
$mysqli = mysql_connect('localhost', 'root', '');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
mysql_select_db('Site',$mysqli);
$query=''."INSERT INTO Comments (USER_Id,COMM,TO_POST,DATE) VALUES ('";
$user_num=mysql_query("SELECT * FROM Users WHERE Login='".$_SESSION['Login']."'");
$user_row=mysql_fetch_row($user_num);
$query .=$user_row[0]."', '";
$query .=$_POST['COMM']."', '";
$query .=$_POST['TO']."', '";
$query .=date('y-m-d')."')";
$result = mysql_query($query);
echo "</br>Ваш коментар збережено"; 
mysql_close($mysqli);
header("Refresh:0, url=news.php");
?>
<script>
window.location.replace("news.php");
</script>