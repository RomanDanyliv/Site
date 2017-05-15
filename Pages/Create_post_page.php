<div class="Content">
            <div class="Advertise">
                <img id='Nyan_Cat' class="Adv" src="images/NyanCat/1.jpg" onmouseover="NyanCat()" onmouseout="audio_stop()">
            </div>
            <div class="Data">
                <form name="login" method="post">
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
                            <label>>Сьогоднішня дата
	<input type="checkbox" id='DATE_TODAY' name="Today" value="date" onchange="check_change()"></label></br>
                            </br>
                            <label><input type="button" value="OK" onclick="create_renew()"></label>
                    </fieldset>
                </form>
            </div>
        </div>