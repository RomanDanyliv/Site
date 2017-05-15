<?php
session_start();
unset($_SESSION['Login']);
include "Page_parts/Top.php";
include "Page_parts/Header.php";
include "Page_parts/Nav_panel.php";
include "Pages/Login_page.php";
include "Page_parts/End.php";
?>