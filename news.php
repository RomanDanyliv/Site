<?php
session_start();
$_SESSION['start']=1;
$_SESSION['end']=6;
?>
<!DOCTYPE html>
<html>
    <head>
       <meta http-equiv="Content-type" content="text/html; charset=utf-8">
       <script src="script/jQuery.js" type="text/javascript"></script>
	   <script src="script/main.js" type="text/javascript"></script>
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
                   include "php_user_name.php";
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
                <?php
                $mysqli = mysql_connect('localhost', 'root', '');
                if (mysqli_connect_errno()) {
                    echo "Подключение невозможно: ".mysqli_connect_error();
                }
                mysql_select_db('Site',$mysqli);
                $quer='SELECT * FROM Posts WHERE ((Id>="'.$_SESSION['start'].'") AND (Id<="'.$_SESSION['end'].'")) ORDER BY Id';
                $result_set = mysql_query($quer);
                $max_post_quer='SELECT MAX(Id) FROM Posts';
                $max_post_res = mysql_query($max_post_quer);
                $max_row=mysql_fetch_array($max_post_res);
                $_SESSION['MAX_POST']=$max_row[0];
                echo "<div class=\"Posts\">";
                while ($row = mysql_fetch_row($result_set))
                {
                    echo "<div class='news' onclick='read_more(this)' id='".$row[0]."'>";
                        echo "<img src='images/News/".$row[1]."' style='width:80%;height:80%;margin:2%;'>";  
                        echo "<div class='describe'>";
                            echo "<div class=\"Field\">".$row[2]."</div>\r"; 
                            echo "<div class=\"Field\">".$row[4]."</div>\r"; 
                            echo "<div class=\"Field\">".$row[5]."</div>\r"; 
                            $anouther_res=mysql_query("SELECT * FROM Comments WHERE TO_POST='".$row[0]."'");
                            while ($anouther_row = mysql_fetch_row($anouther_res)) 
                            {
                                echo "<div class=\"Comment\">";
                                echo "<img src='images/user.png' width='5%' height='5%';>";
                                $user_name=mysql_query("SELECT * FROM Users WHERE UserId='".$anouther_row[1]."'");
                                $user_row=mysql_fetch_row($user_name);
                                echo "<div>".$user_row[1]."</br>";
                                echo $anouther_row[2]."</div>";
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
                            echo "</div>";
                        }
                    echo "</div>"; 
                } 
                echo "</div>";
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
                {
                    echo "<div style='width:100%'><h2><a href='php_post_func.php' class='navbutton'>Створити новий пост</a></h2></div>";
                    echo "<form  id='Remake_form' action='php_post_func.php' method='post' style='width:98%;height:auto'>";
                    echo "<input id='Remake_ed' name='ID_POST' value='' style='visibility:hidden'>";
                    echo "</form>";  
                }
                echo "<div class=\"Button\">";
                if ($_SESSION['start']>1)  
                { 
                    echo "<input id='back' type='button' class='navbutton' value='Попередні' onclick=\"$('html, body').scrollTop(0); pass(); $('.Data').load('back.php');\">\r";
                }
                    echo "<input id='next' type='button' class='navbutton' value='Наступні' onclick=\"$('html, body').scrollTop(0); pass();$('.Data').load('next.php');\">\r";
                echo "</div>";
                ?>  
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
                    <li><a href="#" class="SiteMap" >Проекти</a></li>
                    <li><a href="#" class="SiteMap">Реєстрація</a></li>
                    <li><a href="#" class="SiteMap">Контакти</a></li>
                 </ul>  
            </div>
        </footer>
        <script>
            $('.describe').hide();
            $("#COMM").hide();
            function key(){ 
            var k=window.event.keyCode;  
            if(k==37){$('#back').click()} 
            else if(k==39) {$('#next').click()} } 
            document.onkeydown=key; 
        </script> 
    </body>
</html>