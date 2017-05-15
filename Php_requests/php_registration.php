<?php
session_start();
unset($_SESSION['Login']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<script src="Script/jQuery.js" type="text/javascript"></script>
	<script src="Script/main.js" type="text/javascript"></script>
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
      <div class = "bl content" style="display:block;" id="php_reg_id">
     <blockquote>
	 <center>
	 <h2>
	<?php	
		$mysqli = mysql_connect('localhost', 'root', '');
		if (mysqli_connect_errno()) {
			echo mysqli_connect_error();
		}
		mysql_select_db('Site',$mysqli);
		$ask1="SELECT * FROM Users WHERE (Email='".$_POST['Mail']."')";
		$ask2="SELECT * FROM Users WHERE (Login='".$_POST['Login']."')";
		$res1=mysql_query($ask1);
		$res2=mysql_query($ask2);
		if (mysql_num_rows($res1)>0)
		{echo "<img src='images/ASK/ask1.jpg' class='center'>";
		 echo "<input class = 'button' type = 'button'  value='Попробувати ще раз' onclick='history.back()' style='margin:2%'>";
			exit;} else 
			if ((mysql_num_rows($res2)>0)) {echo "<img src='images/ASK/ask2.jpg' class='center'>";
											echo "<input class = 'button' type = 'button'  value='Попробувати ще раз' onclick='history.back()' style='margin:2%'>";
			exit;} else {
		$query=''."INSERT INTO Users (Login,LastFirstName,Password,Country,RegistrationDate,Email) VALUES ('";
		$query .=$_POST['Login']."', '";
		$query .=$_POST['LName'].$_POST['FName']."', '";
		$query .="1234', '";
		$query .=$_POST['Country']."', '";
		$query .=date('y-m-d')."', '";
		$query .=$_POST['Mail']."')";
		//echo mysql_num_rows($result_set).'</br>';
		$result = mysql_query($query);
        echo "Вітаю, вас успішно зареєстровано"; 
            }
		exit;
		mysql_close($mysqli);
	?>
        </h2>
	</center>
	 </blockquote>
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