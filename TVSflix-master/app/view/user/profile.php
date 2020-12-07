<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once ("../../../core/controller/user/user.php");


    if(!$log)
    {
        header("location: login.php");
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
        $email=$result['UserName'];
        $uname=$result['Email'];
        $gender=$result['Gender'];
        $dob=$result['DOB'];
        $img=$result['Image'];
    }

    if(isset($_POST["btnEditProfile"]))
    {
        $_SESSION['username']=$username;
        header("location: edit_profile.php");
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
        </style>
    </head>
    <body>
    <?php if($log)include_once("../../../lib/scripts/html/navbar_log.html"); else include_once("../../../lib/scripts/html/navbar.html"); ?>
    <br/><br/> <br/><br/>
    <div class="row" style="min-height: 590px">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-9">
                    <h1>Profile</h1>
                    <br/>
                    <table class="table table-striped" style="min-height: 450px">
                        <tr>
                            <th style="width: 60%">First Name</th>
                            <td><?=$fname;?></td>
                        </tr>
                        <tr>
                            <th>Last Name:</th>
                            <td><?=$lname;?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?=$email;?></td>
                        </tr>
                        <tr>
                            <th>User Name:</th>
                            <td><?=$uname;?></td>
                        </tr>
                        <tr>
                            <th>Gender:</th>
                            <td><?=$gender;?></td>
                        </tr>
                        <tr>
                            <th>DOB:</th>
                            <td><?=$dob;?></td>
                        </tr>
                    </table>
                    <br/>
                    <form method="post" action="#">
                        <div class="form-group">
                            <div class="col-lg-offset-9">
                                <button type="submit" class="btn btn-default" name="btnEditProfile">Edit Profile</button>
                                <button type="submit" class="btn btn-primary">Delete Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <img src="../../../content/img/avater/<?=$img;?>" alt="Profile Image">
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>

    </div>
    
    
    <?php include("../../../lib/scripts/html/footer.html"); ?>
</body>
</html>