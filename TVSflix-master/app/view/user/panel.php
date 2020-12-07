<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once("../../../core/controller/user/user.php");

    $showUser="";
    $isShow=true;
    if(isset($_GET['username'])){
        $showUser=$_GET['username'];
        if(CheckUser($showUser)==false){
            $isShow=false;
            echo("
            <br/><br/><br/>
            <h1><b>Invalid User</b></h1>
            <h2><b>Redirecting........</b></h2>
            ");
            header("refresh:3;url=../user/");
        }
    }else{
        header("Location:../user/");
    }

    include_once("../../../core/controller/admin/admin.php");

    $admin=CheckAdmin($username);
    // $admin=false;
?>

<?php
    $userData=GetUserData($showUser);
    $img=$userData['Image'];
    $recentWatch=RecentCount($userData['ID']);
    $completeWatch=CompleteCount($userData['ID']);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title><?= strtoupper($showUser); ?> | TVSflix</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body>
    <?php if($log)include_once("../../../lib/scripts/html/navbar_log.html"); else include_once("../../../lib/scripts/html/navbar.html"); ?>
    <br/><br/><br/><br/>

    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <?php
            if($admin)
                echo("<a href='../admin/'><button class='btn-primary'>Admin Panel</button></a>");
            ?>
            <div class="row">
                <div class="col-md-3 box-Shadow" style="background-color: #00efb2">
                    <img src="../../../content/img/avater/<?= $img; ?>" alt="<?= strtoupper($showUser).' '.'Avater'; ?>" class="img-rounded img-responsive" width="90%; height:100px">
                    <hr/><br/>
                    Watching:
                    <br/>
                    Watched:
                    <br/>
                    Want to Watch:
                    <br/>
                    Favorite:
                </div>
                <div class="col-md-9 box-Shadow" style="height: 580px">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li role="presentation" class="active"><a href="#alltvs" aria-controls="alltvs" role="tab" data-toggle="tab">All My TVS List</a></li>
                            <li role="presentation"><a href="#watching" aria-controls="watching" role="tab" data-toggle="tab">Watching</a></li>
                            <li role="presentation"><a href="#watched" aria-controls="watched" role="tab" data-toggle="tab">Complete Watching</a></li>
                            <li role="presentation"><a href="#want" aria-controls="want" role="tab" data-toggle="tab">Want to Watch</a></li>
                            <li role="presentation"><a href="#fav" aria-controls="fav" role="tab" data-toggle="tab">Favourite</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="alltvs">
                                <iframe src="../user/list.php?username=<?=$username; ?>&type=1" width="100%" style="min-height: 530px"></iframe>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="watching">
                                <iframe src="../user/list.php?username=<?=$username; ?>&type=2" width="100%" style="min-height: 530px"></iframe>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="watched">
                                <iframe src="../user/list.php?username=<?=$username; ?>&type=3" width="100%" style="min-height: 530px"></iframe>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="want">
                                <iframe src="../user/list.php?username=<?=$username; ?>&type=4" width="100%" style="min-height: 530px"></iframe>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="fav">
                            <iframe src="../user/list.php?username=<?=$username; ?>&type=5" width="100%" style="min-height: 530px"></iframe>                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>


    <!--<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-3 col-sm-3">

        </div>
        <div class="col-md-7 col-sm-7">

        </div>
        <div class="col-md-1">
            hello
        </div>
    </div> -->
    
    
    <?php include("../../../lib/scripts/html/footer.html"); ?>
</body>
</html>