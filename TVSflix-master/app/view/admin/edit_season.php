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
    $preselect="";
    if(isset($_GET['tvs'])){
        $preselect=$_GET['tvs'];
    }
?>
<?php
    if(isset($_POST['submit'])){
        echo("
            <br/> <br/> <br/>
        ");
        var_dump($_POST['submit']);
    }else{

    }

?>

<?php
    /*$tvs=SearchTVS();
    $language=SearchLanguage();*/
    $actor=SearchActor();
?>
<html>
    <head>
        <title>Add New Season</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body>
        <?php include_once("../../../lib/scripts/html/navbar_log.html"); ?>
        <br/><br/><br/>
            <!-- Adding new TVS Start -->
        <form id="season_create"  method="POST">
        <div class="row">
            <div class="col-md-3">
                <?php include_once("../../../lib/scripts/html/collpse_menu.html"); ?>
            </div>
            <div class="col-md-9">
                <form id="season_create" onsubmit="return CheckSeason()" method="POST">
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="control-label" for="1">Select TV Series Name</label>
                            <div class="btn-group">
                                <div class="col-md-1 col-sm-1"></div>

                                <select class="form-control" name="tvsname">
                                    <?php
                                    foreach ($tvs as $key) {
                                        if($preselect==$key['ID'] && $preselect!=""){
                                            echo("<option selected='selected'>$key[name]</option>");
                                        }else echo("<option value='$key[ID]'>$key[name]</option>");
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <div class="form-group col-md-8 col-sm-8">
                            <label for="select" class="col-lg-2 control-label">Season Name</label>
                            <div class="col-lg-10">
                                <select class="form-control" id="select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                <br>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="control-label" for="seasonname">Season Name</label>
                            <input type="text" class="form-control" name="seasonname" placeholder="Season Name">
                            <label class="control-label" id="seasonempty"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="col-md-2 control-label">Season Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" name="seasondes"></textarea>
                                <label id="desempty" class="col-md-2 control-label"></label>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="col-md-2 control-label">Season Premiere Date</label>
                            <div class="col-lg-10">
                                <input type="date" name="pdate" >
                                <label id="pdate" class="col-md-2 control-label"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <label for="actor" class="col-md-2 control-label">Choose Season Actors</label>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">

                            <?php
                            $cnt=0;
                            $total=0;
                            foreach ($actor as $key) {
                                $cnt++;
                                echo("
                        <div class='col-lg-2'>
                            <input type='checkbox' name='actor' value='$key[ID]'>$key[name]
                        </div>
                    ");
                                if($cnt>3){
                                    echo("
                            </div>
                            </div>
                        ");
                                    echo("
                            <div class='row'>
                            <div class='col-md-1 col-sm-1'></div>
                            <div class='form-group col-md-8 col-sm-8'>
                        ");
                                    $total++;
                                    $cnt=0;
                                }
                            }
                            ?>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <label id="emptyactor" class="col-md-2 control-label"></label>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <label for="poster" class="col-md-2 control-label">Choose Season Poster</label>
                        <input type="file" name="poster" accept="image/gif, image/jpeg, image/png">
                        <label id="poster" class="col-md-2 control-label"></label>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="control-label" for="trailer">Season Trailer</label>
                            <input type="text" class="form-control"  name="trailer" placeholder="https://www.youtube.com/embed/h6jPsaYWr1c.">
                            <label id="trailer" class="col-md-2 control-label"></label>
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

            <!-- Adding new TVS End -->


        <?php include("../../../lib/scripts/html/footer.html"); ?>
    </body>
</html>