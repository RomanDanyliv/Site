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
        $quer="SELECT * FROM Posts WHERE BODY LIKE '%".$_POST['question']."%' ORDER BY Id";
        //echo $quer;
        echo "<div style='width:100%'><center><h3>Пошук \"".$_POST['question']."\" дав такий результат</h3></center></div>"; 
		$result_set = mysql_query($quer);
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
                            echo "<div class='postNav'>";
                            echo "<input type='button' class='navbutton' value='Редагувати' style='margin-top:2%' onclick='ren_post(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id)'>";
                            echo "<div style='padding: 1em;padding: 5px 10px;'>   Дії з постом   </div>";
                            echo "<input type='button' class='navbutton' value='Видалити' style='margin-top:2%' onclick='del(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.id)'>";
                            echo "</div>";
                            echo "</center></nav>";                                  
                            echo "</div>";
                        }
                    echo "</div>"; 
                } 
                echo "</div>";
                if (isset($_SESSION['Login'])) 
                {
                    echo "<div style=\"display:flex;flex-direction:column;margin:2%\">";
                    echo "<form id='COMM' action='Php_requests/php_comment.php' method='post' style='width:98%;height:auto;display:flex; flex-direction:column;'>";
                    echo "<center><h2>Будь-ласка, залишіть свій коментар</h2></center>";
                    echo "<input id='TO' name='TO' value='' style='visibility:hidden'>";
                    echo "<textarea name='COMM' rows='5' style='margin:auto;width:80%;height:100px'></textarea>";  
                    echo "<input type='submit' value='Коментувати' style='margin:auto'>";
                    echo "</form>";   
                    echo "</div>";
                }
                else 
                {
                    echo "<div style='width:100%'><center><h3>Ви повинні бути зареєстровані, щоб мати змогу залишати коментар</h3></center></div>"; 
                }
                
                if ($_SESSION['Login']=='Admin') 
                {   
                    echo "<center>";
                    echo "<div style='padding:1%; background-color:brown;'><h2>
                    <a href='create_post.php' class='navbutton' style=\"color:black;\">Створити новий пост</a></h2></div>";
                    echo "<form  id='Remake_form' action='create_post.php' method='post' style='width:98%;height:auto'>";
                    echo "<input id='Remake_ed' name='ID_POST' value='' style='visibility:hidden'>";
                    echo "</form>";  
                    echo "</center>";
                }
                
                echo "<div class=\"Button\">";
                if ($_SESSION['start']>1)  
                { 
                    echo "<input id='back' type='button' class='navbutton' value='Попередні' onclick=\"$('html, body').scrollTop(0); pass(); $('.Data').load('Php_requests/back.php');\">\r";
                }
                    echo "<input id='next' type='button' class='navbutton' value='Наступні' onclick=\"$('html, body').scrollTop(0); pass();$('.Data').load('Php_requests/next.php');\">\r";
                echo "</div>";
                echo "</div>";
        ?>  
        <script>
            $('.describe').hide();
            $("#COMM").hide();
            function key(){ 
            var k=window.event.keyCode;  
            if(k==37){$('#back').click()} 
            else if(k==39) {$('#next').click()} } 
            document.onkeydown=key; 
        </script> 
      </div>
        </div>