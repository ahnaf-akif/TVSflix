<?php
    $errFName="";
    $errLName="";
    $errEmail="";
    $ok=false;
    function emailValidation($s) {
        global $errEmail;
        global $ok;
        if (filter_var($s, FILTER_VALIDATE_EMAIL)) {
            ////
        } else {
            $errEmail= ("Wrong email format.");
            $ok=false;
        }
    }
    function FnameValid($s) {
        $f = -1;
        $x = -1;
        $g =  1;
        global $errFName;
        global $ok;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($i == 0) {
                if ($s[$i] >= 'A' and $s[$i] <= 'Z') $x = 1;
                else if ($s[$i] >= 'a' and $s[$i] <= 'z') $x = 1;
                else {
                    $x = -1;
                    break;
                }
            }
            else if ($s[$i] == ' ' and $s[$i - 1] == ' ' and $f == 1) {
                $errFName = "Incorrect format!";
                $ok=false;
                return;
            }
            else if ($s[$i] == ' ') $f++;
            else if ($s[$i] >= 'A' and $s[$i] <= 'Z') continue;
            else if ($s[$i] >= 'a' and $s[$i] <= 'z') continue;
            else if ($s[$i] != '-' and $s[$i] != '.') {
                $g = -1;
                break;
            }
        }
        if ($g == 1) {
            if ($x == 1) {
                if ($f == 0) {

                } else {
                    $errFName = "Must contain atleast two words.";
                    $ok=false;
                }
            } else {
                $errFName = "Must start with a letter.";
                $ok=false;
            }
        } else {
            $errFName = "Wrong character. Only period and dash allowed.";
            $ok=false;
        }
    }
    function LnameValid($s) {
        $f = -1;
        $x = -1;
        $g =  1;
        global $errLName;
        global $ok;
        for ($i = 0; $i < strlen($s); $i++) {
            if ($i == 0) {
                if ($s[$i] >= 'A' and $s[$i] <= 'Z') $x = 1;
                else if ($s[$i] >= 'a' and $s[$i] <= 'z') $x = 1;
                else {
                    $x = -1;
                    break;
                }
            }
            else if ($s[$i] == ' ' and $s[$i - 1] == ' ' and $f == 1) {
                $errLName = "Incorrect format!";
                $ok=false;
                return;
            }
            else if ($s[$i] == ' ') $f++;
            else if ($s[$i] >= 'A' and $s[$i] <= 'Z') continue;
            else if ($s[$i] >= 'a' and $s[$i] <= 'z') continue;
            else if ($s[$i] != '-' and $s[$i] != '.') {
                $g = -1;
                break;
            }
        }
        if ($g == 1) {
            if ($x == 1) {
                if ($f == 0) {
                    //echo "<b>YOUR NAME: &nbsp</b>".$s."<br>";
                } else {
                    $errLName = "Must contain atleast two words.";
                    $ok=false;
                }
            } else {
                $errLName = "Must start with a letter.";
                $ok=false;
            }
        } else {
            $errLName = "Wrong character. Only period and dash allowed.";
            $ok=false;
        }
    }
?>
<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
    if($log){
        header("Location:../user/");
    }
    include_once("../../../core/controller/user/user.php");
    $error="";
    $errPass="";
    if(isset($_POST["submit"])){
        $arr=$_POST;
        FnameValid($arr['inputFN']);
        LnameValid($arr['inputLN']);
        emailValidation($arr['inputEmail']);
        if($arr['inputPassword']!=$arr['inputCPassword']){
            $ok=false;
        }
        if($ok){
            if(CreateUser($arr)){
                header("Location:../user/login.php");
            }else{
                $error="Something wrong";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registration</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body>
        <?php include_once("../../../lib/scripts/html/navbar.html"); ?>
        <div>
            <br/><br/><br/><br/><br/>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-5 box-Shadow">

                    <form class="form-horizontal" method="post" name="form_reg" onsubmit="return CheckValidation()">
                        <fieldset>
                            <legend>Registration</legend>
                            <div class="form-group">
                                <label for="inputFN" class="col-lg-2 control-label">First Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="inputFN" placeholder="First Name">
                                    <label id="FN" style="color:red"><?=$errFName; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLN" class="col-lg-2 control-label">Last Name</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="inputLN" placeholder="Last Name">
                                    <label id="LN" style="color:red"><?=$errLName; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputUname" class="col-lg-2 control-label">Username</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="inputUname" placeholder="User Name" onkeyup="SearchUsername(this.value)">                                    
                                    <label id="Uname" style="color:red"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" name="inputEmail" placeholder="Email" onkeyup="SearchEmail(this.value)">
                                    <label id="Email" style="color:red"><?=$errEmail; ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password">
                                    <label id="Password" style="color:red"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputCPassword" class="col-lg-2 control-label">Confirmation Password</label>
                                <div class="col-lg-10">
                                    <input type="password" class="form-control" name="inputCPassword" placeholder="Confirmation Password" onkeyup="MatchCPass(this.value)">
                                    <label id="CPassword" style="color:red"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputGender" class="col-lg-2 control-label">Gender</label>
                                <div class="col-lg-10">
                                    <input class="radio-inline" type="radio" class="form-control" name="inputGender" value="Male">Male
                                    <input class="radio-inline"  type="radio" class="form-control" name="inputGender" value="Female">Female
                                    <input class="radio-inline"  type="radio" class="form-control" name="inputGender" value="Others">Others<br/>
                                    <label id="GenderType" style="color:red"></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDOB" class="col-lg-2 control-label">DOB</label>
                                <div class="col-lg-10">
                                    <input type="date" class="form-control" name="inputDOB">
                                    <label id="DOB" style="color:red"></label>
                                </div>
                            </div>
                            <label id="none" style="color:red"><?= $error; ?></label>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">                            
                                    <button type="clear" class="btn btn-primary">Clear</button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <br/> <br/> <br/> <br/>
        <?php include_once("../../../lib/scripts/html/footer.html"); ?>
    </body>
</html>