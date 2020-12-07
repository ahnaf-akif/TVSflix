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
        <title>Login</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body>
        <?php include_once("../../../lib/scripts/html/navbar_log.html"); ?>
        <br/><br/><br/>
        <div class="row">
            <div class="col-md-3">
                <?php include_once("../../../lib/scripts/html/collpse_menu.html"); ?>
            </div>
            <div class="col-md-9">
                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#alltvs" aria-controls="alltvs" role="tab" data-toggle="tab">All TVS List</a></li>
                        <li role="presentation"><a href="#watching" aria-controls="watching" role="tab" data-toggle="tab">User List</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="alltvs">
                            <iframe src="../admin/list_delete.php?username=<?=$username; ?>&type=1" width="100%" style="min-height: 530px"></iframe>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="watching">
                            <iframe src="../admin/user_list.php?username=<?=$username; ?>&type=2" width="100%" style="min-height: 530px"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </div>
            
        <?php include("../../../lib/scripts/html/footer.html"); ?>
    </body>
</html>