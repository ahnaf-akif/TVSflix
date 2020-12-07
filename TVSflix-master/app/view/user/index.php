<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once("../../../core/controller/user/user.php");
?>
<?php
    $slideTVS=GetNewTVS(1);
    $upcomingTVS=GetNewTVS(2);
    $newTVS=GetNewTVS(3);
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>TVSflix | A TV Series Community</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body align="center">
        
    <?php if($log)include_once("../../../lib/scripts/html/navbar_log.html"); else include_once("../../../lib/scripts/html/navbar.html"); ?>
    <br/><br/><br/><br/>

        <div class="row">
            <div class="col-sm-6 col-md-12" align="center"></div>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" align="center">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
                        $cnt=0;
                        foreach ($slideTVS as $key ) {
                    ?>
                        <li data-target="#carousel-example-generic" <?php if($cnt==0)echo("class='active'"); ?> data-slide-to="<?=$cnt++; ?>" ></li>
                    <?php
                        }
                    ?>
                    
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox" align="center">
                <?php
                    $cnt=0;
                    foreach ($slideTVS as $key ) {
                ?>
                    <div <?php 
                        if($cnt==0)echo("class='item active''"); 
                        else echo("class='item''"); 
                        $cnt++;
                        ?> align="center">
                        <img src="../../../content/img/tvs/<?=$key['Poster']; ?>" style="height:300px; width:300px"alt="...">
                        <div class="carousel-caption">
                            <h3><?=$key['Name']; ?></h3>
                            <p><?=$key['Description']; ?></p>
                        </div>
                    </div>
                <?php
                    }
                ?>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            </div>
        </div>

        <br/>
        
        <div class="row">
        <fieldset align="center"><legend>Upcoming</legend></fieldset>
            <?php
                foreach ($upcomingTVS as $key ) {
            ?>
            <div class="col-sm-3 col-md-3">
                <div class="thumbnail">
                    <img src="../../../content/img/tvs/<?= $key['Poster']; ?>" alt="...">
                    <div class="caption">
                        <h3><?= $key['Name']; ?></h3>
                        <p>
                            <?= $key['Description']; ?>
                        </p>
                        <p><a href="../tvs/index.php?TVSID=<?= $key['ID']; ?>" class="btn btn-primary" role="button" >View More</a></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    
        <br/>
        <div class="row">
            <fieldset align="center"><legend>New TV Series</legend></fieldset>
            <?php
                foreach ($upcomingTVS as $key ) {
            ?>
            <div class="col-sm-3 col-md-3">
                <div class="thumbnail">
                    <img src="../../../content/img/tvs/<?= $key['Poster']; ?>" alt="...">
                    <div class="caption">
                        <h3><?= $key['Name']; ?></h3>
                        <p>
                            <?= $key['Description']; ?>
                        </p>
                        <p><a href="../tvs/index.php?TVSID=<?= $key['ID']; ?>" class="btn btn-primary" role="button" >View More</a></p>
                    </div>
                </div>
            </div>
            <?php } ?>            
        </div>

    <?php include("../../../lib/scripts/html/footer.html"); ?>
</body>
</html>