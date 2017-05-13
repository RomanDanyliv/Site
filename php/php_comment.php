<?php
session_start();
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
                <li><a href="index.php" class="navbutton">Головна</a></li>
                <li><a href="#" class="navbutton">Статті</a></li>
                <li><a href="news.php" class="navbutton">Новини</a></li>
                <li><a href="#" class="navbutton">Проекти</a></li>
                <li><a href="registration.php" class="navbutton">Реєстрація</a></li>
                <li><a href="#" class="navbutton">Контакти</a></li>
            </ul>
        </nav>                                  
     </div>
   <div id="pictures" class = "bl asside">
         <!--<img id='cat_pic' src="images/cat.jpg" width="100%" height="100%"  OnMouseOver="document.getElementById('cat_pic').src='images/cat2.jpg'"
       OnMouseOut="document.getElementById('cat_pic').src='images/cat.jpg'">-->
       <img id='Nyan_Cat' src="images/NyanCat/1.jpg" style="width:100%;height:100%"
       onmouseover="NyanCat()" onmouseout="audio_stop()">
     <input id="add_pic" type="file" name="my-pic" id="file-field" class="image"/>
   </div>
     <div class = "asside2">
       
     </div>
      <div class = "bl content" style="display:block;" id='comm_id'>
	  <h1>
     <blockquote>
	 <center>
<?php	
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
        //echo $query;
		$result = mysql_query($query);
        echo "</br>Ваш коментар збережено"; 
		exit;
		mysql_close($mysqli);
	?>
	</center>
	 </blockquote>
	 </h1>
	  </div>
	   <div class = "bl fotter">
		   <div class>
			   <ul>  
				   <li><a href="#" class="SiteMap">Головна</a></li>
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
    </script>
</body>
</html>