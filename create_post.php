<?php
session_start();
if ($_SESSION['Login']!="Admin")
exit;
include "Page_parts/Top.php";
include "Page_parts/Header.php";
include "Page_parts/Nav_panel.php";
include "Pages/Create_post_page.php";
include "Page_parts/End.php";
?>