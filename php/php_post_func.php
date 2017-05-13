<?php
session_start();
if ($_SESSION['Login']!="Admin")
exit
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<script src="script/jQuery.js" type="text/javascript"></script>
	<script src="script/main.js" type="text/javascript"></script>
	<title>NO game NO party</title>
	<link rel="stylesheet" href="css/registration.css" type="text/css">
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
        <form name="search" action="search.php" method="post">
	    <input type="text" name="question" placeholder="Search"><button type="submit">GO</button>
        </form>
       </br>
       <?php
       if (isset($_SESSION['Login']))
       {echo "Привіт, ".$_SESSION['Login']."</br>";
        echo "<a href='login.php'>Вийти</a>"; } 
       else {echo "<a href='login.php'>Авторизація</a>";}
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
       <img id='Nyan_Cat' src="images/NyanCat/1.jpg" style="width:100%;height:100%" alt="Коте йпт" 
       onmouseover="NyanCat()" onmouseout="audio_stop()">
    <input id="add_pic" type="file" name="my-pic" id="file-field" class="image"/>
   </div>
     <div class = "asside2">
       
     </div>
      <div class = "bl registration" style="display:block" id="post_func_id">
	<form name="login"  method="post">
<!--	action="test.php" method="post" class = "Form" onsubmit="return grand();-->
          </br>
    <fieldset>
	<legend>Створення нового посту</legend>
	<?php
    if (isset($_POST['ID_POST']))
    {$mysqli = mysql_connect('localhost', 'root', '');
     if (mysqli_connect_errno()) {
	 echo mysqli_connect_error();
     }
     mysql_select_db('Site',$mysqli);
     $ask="SELECT * FROM Posts WHERE Id='".$_POST['ID_POST']."'";
     $res=mysql_query($ask);
     $row = mysql_fetch_row($res);
     
     mysql_close($mysqli);
     
    echo "<input id='ID' type ='hidden' name='ID' value = '".$_POST['ID_POST']."'  style='float:none'>";
    echo "<label>Шлях до логотипа</br><textarea id='LOGO' style='width:50%' rows='3' type ='text' name='LOGO' placeholder ='LOGO Path' value = 'LOGO Path' onfocus='if (this.value == \'LOGO Path\') {this.value=''}' onBlur='if (this.value == \'\') {this.value='LOGO Path'}' style='float:none'>".$row[1]."</textarea></label></br></br>";
    echo "<label>Тіло посту</br><textarea id='BODY_TXT' style='width:50%' rows='6' type ='text' name='BODY_TXT' placeholder ='Enter body' value = 'BODY_TXT' onfocus='if (this.value == 'BODY_TXT') {this.value=''}' onBlur='if (this.value == '') {this.value='BODY_TXT'}' style='float:none'>".$row[2]."</textarea></label></br></br>";
    echo "<label>Опції</br><textarea id='OPTIONAL' style='width:50%' rows='3' type ='text' name='OPTIONAL' placeholder ='Enter options' value = 'OPTIONAL' onfocus='if (this.value == 'OPTIONAL') {this.value=''}' onBlur='if (this.value == '') {this.value='OPTIONAL'}' style='float:none'>".$row[3]."</textarea></label></br></br>";
    echo "<label>Мінімальні вимоги</br><textarea id='MIN_R' style='width:50%' rows='4' type ='text' name='MIN_R' placeholder ='Enter min requirements' value = 'MIN_R' onfocus='if (this.value == 'MIN_R') {this.value=''}' onBlur='if (this.value == '') {this.value='MIN_R'}' style='float:none'>".$row[4]."</textarea></label></br></br>";
    echo "<label>Рекомендовані вимоги</br><textarea id='MAX_R' style='width:50%' rows='4' type ='text' name='MAX_R' placeholder ='Enter normal requirements' value = 'MAX_R' onfocus='if (this.value == 'MAX_R') {this.value=''}' onBlur='if (this.value == '') {this.value='MAX_R'}' style='float:none'>".$row[5]."</textarea></label></br></br>";
    echo "<label>Дата створення</br><input id='DATE' type ='text' name='DATE' placeholder ='Enter date' value = '".$row[6]."' style='float:none'> </label>";
    }
    else
    ////////////////////////////////якшо id не вказаний///////////////////////////
    {
    echo "<input id='ID' type ='hidden' name='ID' value =          '0'             style='float:none'>";
    echo "<label>Шлях до логотипа</br><textarea id='LOGO' style='width:50%' rows='3' type ='text' name='LOGO' placeholder ='LOGO Path' value = 'LOGO Path' onfocus='if (this.value == \'LOGO Path\') {this.value=''}' onBlur='if (this.value == \'\') {this.value='LOGO Path'}' style='float:none'>*.*</textarea></label></br></br>";
    echo "<label>Тіло посту</br><textarea id='BODY_TXT' style='width:50%' rows='6' type ='text' name='BODY_TXT' placeholder ='Enter body' value = 'BODY_TXT' onfocus='if (this.value == 'BODY_TXT') {this.value=''}' onBlur='if (this.value == '') {this.value='BODY_TXT'}' style='float:none'></textarea></label></br></br>";
    echo "<label>Опції</br><textarea id='OPTIONAL' style='width:50%' rows='3' type ='text' name='OPTIONAL' placeholder ='Enter options' value = 'OPTIONAL' onfocus='if (this.value == 'OPTIONAL') {this.value=''}' onBlur='if (this.value == '') {this.value='OPTIONAL'}' style='float:none'></textarea></label></br></br>";
    echo "<label>Мінімальні вимоги</br><textarea id='MIN_R' style='width:50%' rows='4' type ='text' name='MIN_R' placeholder ='Enter min requirements' value = 'MIN_R' onfocus='if (this.value == 'MIN_R') {this.value=''}' onBlur='if (this.value == '') {this.value='MIN_R'}' style='float:none'><div class=\"subs_req\">
              <h2>Минимальные требования к ПК</h2>
              <ul><li>ОС: Windows Vista Service Pack 2 32-bit
              </li><li>Процессор: Intel Core 2 DUO 2.4 ГГц / AMD Athlon X2 2.7 ГГц
              </li><li>Память: 2 Гб
              </li><li>Видео: DirectX10-совместимая ATI Radeon HD 3870 / NVIDIA 8800 GT / Intel HD 3000 Integrated, 512 Мб
              </li><li>HDD: 20 Гб свободного места</li></ul></div></textarea></label></br></br>";
    echo "<label>Рекомендовані вимоги</br><textarea id='MAX_R' style='width:50%' rows='4' type ='text' name='MAX_R' placeholder ='Enter normal requirements' value = 'MAX_R' onfocus='if (this.value == 'MAX_R') {this.value=''}' onBlur='if (this.value == '') {this.value='MAX_R'}' style='float:none'><div class=\"subs_req\">
                <h2>Рекомендуемые требования к ПК</h2>
                 <ul><li>ОС: Windows 7 Service Pack 1 64-bit
                </li><li>Процессор: Quad Core
                </li><li>Память: 4 Гб
                </li><li>Видео: DirectX11-совместимая AMD Radeon HD 6950 / NVIDIA GeForce GTX 560, 1024 Мб
                </li><li>HDD: 30 Гб свободного места</li></ul></div></textarea></label></br></br>";
    echo "<label>Дата створення</br><input id='DATE' type ='text' name='DATE' placeholder ='Enter date' value = 'DATE' onfocus='if (this.value == 'DATE') {this.value=''}' onBlur='if (this.value == '') {this.value='DATE'}' style='float:none'> </label>";
    }
    ?>
	<input type="checkbox" id='DATE_TODAY' name="Today" value="date" onchange="check_change()">Сьогоднішня дата</br></br>
	<input type="button" value="OK" onclick="create_renew()">
	</fieldset>
	</form>
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
               <li><a href="#" class="SiteMap">Проекти</a></li>
                <li><a href="#" class="SiteMap">Реєстрація</a></li>
                <li><a href="#" class="SiteMap">Контакти</a></li>
         </ul>  
        </div>
        <div class="SocNetw">
        </div>
   </div>
   </div>
   </div>   
</body>
</html>