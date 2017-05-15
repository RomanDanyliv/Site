<div class="Content">
        <div class="Advertise">
            <img id='Nyan_Cat' class="Adv" src="images/NyanCat/1.jpg" onmouseover="NyanCat()" onmouseout="audio_stop()">
        </div>
        <div class="Data">
            <form name="login" action="logins_status.php" method="post" class="Login_form">
                <fieldset>
                    <legend>Аторизація</legend>
                    <center>
                        <label> Введіть ваш логін </br><input id='Login' type ="text" name="Login" placeholder ="Enter your login" value = "Login" onfocus="if (this.value == 'Login') {this.value=''}" onBlur="if (this.value == '') {this.value='Login'}" style="float:none"> </label></br>
                        </br>
                        <label> Введіть ваш пароль </br><input id='Pass' type ="text" name="Password" placeholder ="Enter your password" value = "Password" onfocus="if (this.value == 'Password') {this.value=''}" onBlur="if (this.value == '') {this.value='LastName'}" style="float:none"> </label></br>
                        </br>
                        <input type="submit" value="OK">
                    </center>
                </fieldset>
            </form>
        </div>
    </div>