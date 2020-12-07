<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once ("../../../core/controller/user/user.php");

    if(!$log)
    {
        header("location:login.php");
    }

    $fname = $lname=$email=$uname=$gender=$dob=$img;
    $result= GetUserData($username);
    if(!$result)
    {
        echo "No data found";
    }
    else
    {
        //$row = mysqli_fetch_array($result);
        $fname=$result['FirstName'];
        $lname=$result['LastName'];
        $uname=$result['UserName'];
        $email=$result['Email'];
        $gender=$result['Gender'];
        $dob=$result['DOB'];
        $img=$result['Image'];
        $password=$result['Password'];
        $conPassword=$result['Password'];
    }

    $error="";
    if(isset($_POST["submit"])){
        $arr=$_POST;
        if(CreateUser($arr)){
            header("Location:../user/login.php");
        }else{
            $error="Something wrong";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>TVSflix | A TV Series Community</title>
    <?php include_once("../../../lib/scripts/html/head.html");
    ?>
    <style>
        td, th {
            font-size: 20px;
        }
        .form-control{
            width: 60%;
        }
    </style>
</head>
<body>
<?php if($log)include_once("../../../lib/scripts/html/navbar_log.html"); else include_once("../../../lib/scripts/html/navbar.html"); ?>
<br/><br/>
<div class="row" style="min-height: 590px">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row">
            <div class="col-md-9">
                <h1>Edit Profile</h1>
                <br/>
                <form class="form-horizontal" method="post" name="form_reg" onsubmit="return CheckValidation()">
                        <div class="form-group">
                            <label for="inputFN" class="col-lg-2 control-label">First Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputFN" placeholder="First Name" value="<?=$fname;?>">
                                <label id="FN" style="color:red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputLN" class="col-lg-2 control-label">Last Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputLN" placeholder="Last Name" value="<?=$lname;?>">
                                <label id="LN" style="color:red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUname" class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputUname" placeholder="User Name" onkeyup="SearchUsername(this.value)" value="<?=$uname;?>">
                                <label id="Uname" style="color:red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="inputEmail" placeholder="Email" onkeyup="SearchEmail(this.value)" value="<?=$email;?>">
                                <label id="Email" style="color:red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" value="<?=$password;?>">
                                <label id="Password" style="color:red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCPassword" class="col-lg-2 control-label">Confirmation Password</label>
                            <div class="col-lg-10">
                                <input type="password" class="form-control" name="inputCPassword" placeholder="Confirmation Password" onkeyup="MatchCPass(this.value)" value="<?=$conPassword;?>">
                                <label id="CPassword" style="color:red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputGender" class="col-lg-2 control-label">Gender</label>
                            <div class="col-lg-10">
                                <?php
                                if($gender=='Male')
                                {
                                    echo "<input class=\"radio-inline\" type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Male\" checked=\"checked\">Male";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Female\">Female";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Others\">Others<br/>";
                                }
                                else if ($gender='Female')
                                {
                                    echo "<input class=\"radio-inline\" type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Male\">Male";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Female\" checked=\"checked\">Female";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Others\">Others<br/>";
                                }
                                else if ($gender='Others')
                                {
                                    echo "<input class=\"radio-inline\" type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Male\">Male";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Female\">Female";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Others\" checked=\"checked\">Others<br/>";
                                }
                                else
                                {
                                    echo "<input class=\"radio-inline\" type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Male\">Male";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Female\">Female";
                                    echo "<input class=\"radio-inline\"  type=\"radio\" class=\"form-control\" name=\"inputGender\" value=\"Others\">Others<br/>";
                                }
                                ?>
                                <label id="GenderType" style="color:red"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputDOB" class="col-lg-2 control-label">DOB</label>
                            <div class="col-lg-10">
                                <input type="date" class="form-control" name="inputDOB" value="<?=$dob;?>">
                                <label id="DOB" style="color:red"></label>
                            </div>
                        </div>
                        <label id="none" style="color:red"><?= $error; ?></label>
                    <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label">Image</label>
                        <div class="col-lg-10">
                            <input type="file" class="form-control" name="inputImg" id="inputImg" value="<?=$img;?>">
                            <label id="image" style="color:red"></label>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button type="clear" class="btn btn-primary">Clear</button>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
    </div>
    <div class="col-md-1"></div>

</div>


<?php include("../../../lib/scripts/html/footer.html"); ?>
</body>
</html>
