<?php
    require_once("../../../lib/scripts/php/checkLogin.php");
    if(isset($_SESSION['log'])){
        session_destroy();
    }else if(isset($_COOKIE['log'])){
        setcookie("log","",time()-3600,"/");
    }
    header("Location:index.php");

?>