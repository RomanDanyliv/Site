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
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <script src="Script/jQuery.js" type="text/javascript"></script>
        <script src="Script/main.js" type="text/javascript"></script>
        <link rel="stylesheet" href="Style.css">
        <title>
            Test
        </title>
    </head>

    <body>
        <div class="Header">
            <div class="Logo">
                <img id='Logo_pic' src="images/logo.png" alt="Web-Sait-Logo" onmousedown="$(this).attr('src','images/logopressed.png')" onmouseup="$(this).attr('src','images/logo.png')">
            </div>
            <div class="Search">
                <form name="Search" id="Search_form" action="Search.php" method="post">
                    <input name="WHAT_POST" id="WHAT_POST" value='' type="hidden">
                    <input type="text" id='search_ed' name="question" value='' placeholder="Search" onkeyup="if (this.value.length==0) $('#search_prev').empty(); else $.ajax( {type: 'POST', url: 'search_previev.php', data: {'question': this.value}, success: function(data) {$('#search_prev').html(data);}})">
                    <button type="submit">GO</button>
                    <div id="search_prev"></div>
                </form>
                <?php
                   include "Php_requests/php_user_name.php";
                ?>
            </div>
        </div>
        <div class="Navigation">
            <a href="index.php" class="Navbutton">Головна</a>
            <a href="#" class="Navbutton">Статті</a>
            <a href="news.php" class="Navbutton">Новини</a>
            <a href="#" class="Navbutton">Проекти</a>
            <a href="registration.php" class="Navbutton">Реєстрація</a>
            <a href="#" class="Navbutton">Контакти</a>
        </div>
        <div class="Content">
            <div class="Advertise">
                <img id='Nyan_Cat' class="Adv" src="images/NyanCat/1.jpg" onmouseover="NyanCat()" onmouseout="audio_stop()">
            </div>
            <div class="Data">
                <blockquote id="BlockQ1">
                    <div style="margin:auto;font-size:xx-large">
                        <center>
                            <?php
                                echo $str;
                             ?>
                        </center>
                    </div>
                </blockquote>
            </div>
        </div>
        <footer>
            <div>
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
        </footer>
    </body>

    </html>
