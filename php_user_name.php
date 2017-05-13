<?php
if (isset($_SESSION['Login']))
                   {
                       echo "Привіт, ".$_SESSION['Login']."</br>";
                       echo "<input type='button' onclick=\"window.location.replace('login.php');\" value='Вийти'>"; 
                   } 
                       else 
                       {
                           echo  "<input type='button' class=\"Button\" onclick=\"window.location.replace('login.php');\" value='Авторизація'>";
                       }
?>
