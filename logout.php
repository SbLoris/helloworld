<?php
    require_once("api/includeAll.php");
    
    session_destroy();
    header('location: index_login.php');
?>