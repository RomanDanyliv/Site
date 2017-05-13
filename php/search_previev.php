<?php   
$mysqli = mysql_connect('localhost', 'root', '');
		if (mysqli_connect_errno()) {
			echo "Подключение невозможно: ".mysqli_connect_error();
		}
		mysql_select_db('Site',$mysqli);
        echo "<div style='width:100%'><center><h5>Пошук \"".$_POST['question']."\" дав такий результат</h5></center></div>"; 
        $quer="SELECT * FROM Posts WHERE BODY LIKE '%".$_POST['question']."%' ORDER BY Id";
		$result_set = mysql_query($quer);
		while ($row = mysql_fetch_row($result_set)) {
            echo "<div onclick=\"$('#WHAT_POST').val(".$row[0]."); $('#Search_form').submit();\">";
            echo "<img src='images/News/".$row[1]."' class='previev' align='middle'>";  
            echo "<div style='display:inline'>Пост номер ".$row[0]."</div>"; 
            echo "</div></br>";
                }
        mysql_close($mysqli);
?>