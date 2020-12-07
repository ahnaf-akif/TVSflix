<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once("../../../core/controller/user/user.php");
    if($log==false){
        header("Location:index.php");
    }
    $error="";
    $uname="";
    $pass="";
    if(isset($_POST["submit"])){
        $arr=$_POST;
        $uname=$_POST['txtUname'];
        $pass=$_POST['txtPassword'];
        if(Login($arr)!=false){
            if(isset($_POST['remember'])){
                setcookie('log',$_POST['txtUname'],time()+(86400*30),"/");
            }else{
                $log=true;
                $_SESSION['log']=$log;
                $_SESSION['username']=$username=$_POST['txtUname'];
            }
            header("Location:index.php");
        }else{
            $error="Wrong Username or Password<br/>";
        }
    }
?>

<html>
    <head>
        <title>Login</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body>
        <?php include_once("../../../lib/scripts/html/navbar_log.html"); ?>
        

        <br/><br/><br/><br/>
        <?php include("../../../lib/scripts/html/footer.html"); ?>
    </body>
</html>