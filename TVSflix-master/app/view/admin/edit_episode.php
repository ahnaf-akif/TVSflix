<?php
include_once("../../../lib/scripts/php/checkLogin.php");
include_once("../../../core/controller/admin/admin.php");
if($log==false){
    header("Location:../user/");
}
$admin=CheckAdmin($username);
if($admin==false){
    header("Location:../user/");
}
?>

<html>
    <head>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body>
        <?php include_once("../../../lib/scripts/html/navbar_log.html"); ?>
        <br/><br/><br/>

        <div class="row" style="min-height: 560px">
            <div class="col-md-3">
                <?php include_once("../../../lib/scripts/html/collpse_menu.html"); ?>
            </div>
            <div class="col-md-9">
                <form>
                    <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Season</label>
                        <div class="col-md-10">
                            <select class="form-control" id="select" style="width: 50%;">
                                <option>Select TVS Season</option>
                            </select>
                            <br/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="select" class="col-md-2 control-label">Episode</label>
                        <div class="col-md-10">
                            <select class="form-control" id="select" style="width: 50%;">
                                <option>Select TVS Season</option>
                            </select>
                            <br/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEpName" class="col-lg-2 control-label">Episode Name</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Episode Name" style="width: 50%;">
                            <br/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEpNo" class="col-lg-2 control-label">Episode Number</label>
                        <div class="col-lg-10">
                            <input type="number" class="form-control" id="inputEpNo" placeholder="Episode Number" style="width: 50%;">
                            <br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textDesc" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="textArea" placeholder="Description" style="width: 50%;"></textarea>
                            <br/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputdate" class="col-lg-2 control-label">Aired Date</label>
                        <div class="col-lg-10">
                            <input type="date" class="form-control" id="inputDate" style="width: 50%;">
                            <br/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </div>
                </form>
            </div>
        </div>

        <?php include("../../../lib/scripts/html/footer.html"); ?>
    </body>
</html>