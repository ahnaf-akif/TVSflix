<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once("../../../core/controller/user/user.php");
    if($log){
        header("Location:../user/");
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
                setcookie('log',$uname,time()+(86400*30),"/");
            }else{
                $log=true;
                $_SESSION['log']=$log;
                $_SESSION['username']=$username=$_POST['txtUname'];
            }
            header("Location:../user/");
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
        <?php include_once("../../../lib/scripts/html/navbar.html"); ?>
        <div style="min-height: 693px">
            <br/><br/><br/><br/><br/><br/><br/>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-5 box-Shadow">

                    <form class="form-horizontal" name="user_login" method="POST" onsubmit="return CheckLogin()">
                        <fieldset>
                            <legend>Login</legend>
                            <div class="form-group">
                                <label for="inputUserName" class="col-lg-2 control-label">Username</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputUserName" placeholder="Username" name="txtUname" value="<?= $uname; ?>">
                                    <label id="labUname" style="color:red"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="txtPassword" value="<?= $pass; ?>">
                                    <label id="labPassword" style="color:red"><?= $error ?></label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <?php include("../../../lib/scripts/html/footer.html"); ?>
    </body>
</html>