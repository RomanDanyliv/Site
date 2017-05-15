<div class="Content">
        <div class="Advertise">
            <img id='Nyan_Cat' class="Adv" src="images/NyanCat/1.jpg" onmouseover="NyanCat()" onmouseout="audio_stop()">
        </div>
        <div class="Data">
            <div class="Reg" id='reg_id' style='color:black'>
                <form name="registration" action="Php_requests/php_registration.php" method="post" class="Form" onsubmit="return grand();">
                    <fieldset>
                        <legend>Реєстрація</legend>
                        <label> Логін <input id='Login' class="RegField" type ="text" name="Login" placeholder ="Enter your login" value = "Login" onfocus="if (this.value == 'Login') {this.value=''}" onBlur="if (this.value == '') {this.value='Login'}"> </label></br>
                        </br>
                        <label> Прізвище <input id='Surname' class="RegField" type ="text" name="LName" placeholder ="Enter last name" value = "LastName" onfocus="if (this.value == 'LastName') {this.value=''}" onBlur="if (this.value == '') {this.value='LastName'}"> </label></br>
                        </br>
                        <label> Ім'я <input id="Name" type ="text" class="RegField" name="FName" placeholder ="Enter name" value = "Name" onfocus="if (this.value == 'Name') {this.value=''}" onBlur="if (this.value == '') {this.value='Name'}"> </label></br>
                        </br>
                        <label> Емайл <input id="MailAddress" class="RegField" type ="text" name="Mail" placeholder ="Enter mail" value = "Email" onfocus="if (this.value == 'Email') {this.value=''}" onBlur="if (this.value == '') {this.value='Email'}"> </label>
                    </fieldset>
                    <fieldset>
                        <legend>Дані для реєстрації</legend>
                        <label>Хз шо<input type="checkbox" class="RegField" value = "ch-value1" name = "chbox1"></label></br>
                        <label>Хз шо<input type="checkbox" class="RegField" value = "ch-value2" name = "chbox2"></label></br>
                        <label>Хз шо<input type="checkbox" class="RegField" value = "ch-value3" name = "chbox3"></label></br>
                    </fieldset>
                    <fieldset>
                        <legend>Інша інформація</legend>
                        <label> Вік <select name = "age">
                <option value = "15">15</option>
                <option value = "16">16</option>
                <option value = "17">17</option>
                <option value = "18">18</option>
                <option value = "19">19</option>
                </select></label></br>
                        </br>
                        <label> Країна <select name = "Country">
                <option value = "ukraine">Ukraine</option>
                <option value = "england">England</option>
                <option value = "poland">Poland</option>
                <option value = "marokko">Marokko</option>
                <option value = "japan">Japan</option>
                </select></label></br>
                        </br>
                        <label> Місто <select name ="Sity">
                <option value = "lviv">Lviv</option>
                <option value = "kyiv">Kyiv</option>
                <option value = "mylolaiv">Mylolaiv</option>
                </select></label></br>
                    </fieldset>
                    <fieldset>
                        <legend>Про вас</legend>
                        <textarea style="width:100%;height:100px;"></textarea>
                    </fieldset>
                    <fieldset style="display:block;text-align:center;">
                        <legend>Дії</legend>
                        <input class="button" type='submit' value="Запеєстуватися"></br>
                        </br>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>