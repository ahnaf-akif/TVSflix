<?php
/*include_once("../../../lib/scripts/php/checkLogin.php");
if($log){
    header("Location:../user/");
}
include_once("../../../core/controller/user/user.php");*/
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
        <div class="col-md-6">
            <h1>Advanced Search</h1>
            <br/>

            <form class="form-horizontal" method="post" name="form_reg" onsubmit="return CheckValidation()">
                <table class="table">
                    <tr>
                        <th width="15%">Genre</th>
                        <td>:</td>
                        <td>
                            <input type="checkbox" name="cb" value="Action"/> Action &nbsp;
                            <input type="checkbox" name="cb" value="Action"/> Action &nbsp;
                            <input type="checkbox" name="cb" value="Action"/> Action &nbsp;
                            <input type="checkbox" name="cb" value="Action"/> Action &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>Language</td>
                        <td>:</td>
                        <td><input type="checkbox" name="cb" value="English"/> English &nbsp;
                            <input type="checkbox" name="cb" value="Bangla"/> Bangla &nbsp;
                            <input type="checkbox" name="cb" value="Hindi"/> Hindi &nbsp;
                            <input type="checkbox" name="cb" value="Korean"/> Korean &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<br/> <br/> <br/> <br/>
<?php include_once("../../../lib/scripts/html/footer.html"); ?>
</body>
</html>
