<?php
session_start();
$_SESSION['start']=1;
$_SESSION['end']=6;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<script src="script/jQuery.js" type="text/javascript"></script>
	<script src="script/main.js" type="text/javascript"></script>
	<title>NO game NO party</title>
	<link rel="stylesheet" href="css/main.css" type="text/css">
</head>
<body>
 <audio src="images/cat_original.mp3">
  Your browser does not support the <code>audio</code> element.
</audio>
  <div class="all">
   <div class="main">
     <div class="bl header">
        <div class="logo"><img id='logo_pic' src="images/logo.png" alt="Web-Sait-Logo" 
         onmousedown="$(this).attr('src','images/logopressed.png')"
       onmouseup="$(this).attr('src','images/logo.png')">
       </div>
     </div>
     <div class="bl SearchForm" style="display:block">
        <form name="search" id="search_form" action="search.php" method="post">
        <input name="WHAT_POST" id="WHAT_POST" value='' type="hidden"> 
	    <input type="text" id='search_ed' name="question" value='' placeholder="Search" 
       onkeyup="if (this.value.length==0) $('#search_prev').empty(); else $.ajax( {type: 'POST', url: 'search_previev.php', data: {'question': this.value}, success: function(data) {$('#search_prev').html(data);}})">
        <button type="submit">GO</button>
        <div id="search_prev">
        </div>
        </form>
       </br>
       <?php
       if (isset($_SESSION['Login']))
       {echo "Привіт, ".$_SESSION['Login']."</br>";
        echo "<input type='button' onclick=\"window.location.replace('login.php');\" value='Вийти'>"; } 
       else {echo  "<input type='button' onclick=\"window.location.replace('login.php');\" value='Авторизація'>";}
       ?>
      </div>
    <div class="navigation">
        <nav>
            <ul id="positionNav">
                <li><a class="navbutton" onclick=" $('#news_id').load('index.php #main_id');">Головна</a></li>
                <li><a href="#" class="navbutton">Статті</a></li>
                <li><a class="navbutton" onclick="$('#news_id').load('news.php #news_id',function () {renew_page();});">Новини</a></li>
                <li><a href="#" class="navbutton">Проекти</a></li>
                <li><a class="navbutton" onclick="$('#news_id').load('registration.php #reg_id',function () {renew_page();});">Реєстрація</a></li>
                <li><a href="#" class="navbutton">Контакти</a></li>
            </ul>
        </nav>                                  
     </div>
   <div id="pictures" class = "bl asside">
         <!--<img id='cat_pic' src="images/cat.jpg" width="100%" height="100%" alt="Коте йпт"   OnMouseOver="document.getElementById('cat_pic').src='images/cat2.jpg'"
       OnMouseOut="document.getElementById('cat_pic').src='images/cat.jpg'">-->
       <img id='Nyan_Cat' src="images/NyanCat/1.jpg" style="width:100%;height:100%"
       onmouseover="NyanCat()" onmouseout="audio_stop()">
     <input id="add_pic" type="file" name="my-pic" id="file-field" class="image"/>
   </div>
     <div class = "asside2">
       
     </div>
      <div class = "bl content" id="news_id" style="background:#b94545;">
      <?php
        $mysqli = mysql_connect('localhost', 'root', '');
		if (mysqli_connect_errno()) {
			echo "Подключение невозможно: ".mysqli_connect_error();
		}
		mysql_select_db('Site',$mysqli);
        $quer="SELECT * FROM Posts WHERE BODY LIKE '%".$_POST['question']."%' ORDER BY Id";
        //echo $quer;
        echo "<div style='width:100%'><center><h3>Пошук \"".$_POST['question']."\" дав такий результат</h3></center></div>"; 
		$result_set = mysql_query($quer);
		while ($row = mysql_fetch_row($result_set)) {
            $row[2]="<p>".$row[2]."</p>";
            $row[2]=preg_replace("#".$_POST['question']."#ius","<span style='color:#5EC4CD;font-size:larger;font-weight:800;'>".$_POST['question']."</span>",$row[2]);
            echo "<div class='news' onclick='read_more(this)' id='".$row[0]."'>";
            echo "<img src='images/News/".$row[1]."' style='width:80%;height:80%;margin:2%;'>";  
            echo "<div class='describe'>";
            echo $row[2];  
            echo $row[4];
            echo $row[5];
            $anouther_res=mysql_query("SELECT * FROM Comments WHERE TO_POST='".$row[0]."'");
            while ($anouther_row = mysql_fetch_row($anouther_res)) {
            echo "<div style='display:inline-flex;background: #fefefe; height:auto;width:98%;text-align:left;margin:1%;color:black'>";
            echo "<img src='images/user.png' width='5%' height='5%';>";
            $user_name=mysql_query("SELECT * FROM Users WHERE UserId='".$anouther_row[1]."'");
            $user_row=mysql_fetch_row($user_name);
            echo $user_row[1]."</br>";
            echo $anouther_row[2];
            echo "</div>";
            }
            echo "</div>";
            if ($_SESSION['Login']=='Admin')
            {
            echo "<div class='navigation'>";
            echo "<nav><center>";
            echo "<ol id='positionNav' style='padding:inherit;justify-content:space-between;'>";
            echo "<li><input type='button' class='navbutton' value='Редагувати' style='margin-top:2%' onclick='ren_post(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id)'></li>";
            echo "<div style='padding: 1em;padding: 5px 10px;'>Дії з постом</div>";
            echo "<li><input type='button' class='navbutton' value='Видалити' style='margin-top:2%' onclick='del(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id)'></li>";
            echo "</ol>";
            echo "</center></nav>";                                  
            echo "</div>";}
            echo "</div>";  
                }
        if (isset($_SESSION['Login'])) 
        {
        echo "<form id='COMM' action='php_comment.php' method='post' style='width:98%;height:auto'>";
        echo "<center><h2>Будь-ласка, залишіть свій коментар</h2></center>";
        echo "<input id='TO' name='TO' value='' style='visibility:hidden'>";
        echo "<textarea name='COMM' rows='3'></textarea>";  
        echo "<input type='submit' value='Коментувати'>";
        echo "</form>";   
        }
        else 
        {
        echo "<div style='width:100%'><center><h3>Ви повинні бути зареєстровані, щоб мати змогу залишати коментар</h3></center></div>"; 
        }
        if ($_SESSION['Login']=='Admin') 
        {echo "<div style='width:100%'><h2><a href='php_post_func.php' class='navbutton'>Створити новий пост</a></h2></div>";
        echo "<form  id='Remake_form' action='php_post_func.php' method='post' style='width:98%;height:auto'>";
        echo "<input id='Remake_ed' name='ID_POST' value='' style='visibility:hidden'>";
        echo "</form>";  
        }
        mysql_close($mysqli);
        ?>  
      </div>
   <div class = "bl fotter">
       <div class>
         <ul>  
                <li><a href="#" class="SiteMap">ГОЛОВНА</a></li>
                <li><a href="#" class="SiteMap">Статті</a></li>
                <li><a href="#" class="SiteMap">Новини</a></li>
        </ul>  
        </div>
        <div>
           <ul>
               <li><a href="#" class="SiteMap" >Проекти</a></li>
                <li><a href="#" class="SiteMap">Реєстрація</a></li>
                <li><a href="#" class="SiteMap">Контакти</a></li>
         </ul>  
        </div>
        <div class="SocNetw">
        </div>
   </div>

        <div class="SocNetw">
        </div>
   </div>
   </div> 
    <script>
    $('.describe').hide();
    $("#COMM").hide();
    function key(){ 
    var k=window.event.keyCode;  
    if(k==37){$('#back').click()} 
    else if(k==39) {$('#next').click()} } 
    document.onkeydown=key; 
    <?php
        if (isset($_POST['WHAT_POST']))
            echo "$('#".$_POST['WHAT_POST']."').click()";
    ?>
    </script>
</body>
</html>