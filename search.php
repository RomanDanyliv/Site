<?php
session_start();
$_SESSION['start']=1;
$_SESSION['end']=6;
include "Page_parts/Top.php";
include "Page_parts/Header.php";
include "Page_parts/Nav_panel.php";
include "Pages/Search_page.php";
include "Page_parts/End.php";
?>