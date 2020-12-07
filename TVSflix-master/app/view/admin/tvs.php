<?php
    if(isset($_POST['addSeason'])==false){
        // header("Location:../admin/");
    }
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

<?php
    if(isset($_POST['submit'])){
        $arr=$_POST['submit'];
        if(AddNewTVS($arr)){
            // header("Location:../user/");
        }else{
            echo("
                <script>
                    alert('Something Wrong');
                </script>
            ");
        }
    }else{

    }

?>

<?php
    //$tvs=SearchTVS();
    //$language=SearchLanguage();
    $genere=SearchGenere();
?>
<html>
    <head>
        <title>Add New Season</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body>
        <?php include_once("../../../lib/scripts/html/navbar_log.html"); ?>
        <br/><br/><br/>
        <div class="row">
            <div class="col-md-3">
                <?php include_once("../../../lib/scripts/html/collpse_menu.html"); ?>
            <!-- Adding new TVS Start -->
            </div>
            <div class="col-md-9">
                <form id="tvs_create" method="POST" onsubmit="return CheckTVS()">
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="control-label" for="tvsname">TV Series Name</label>
                            <input type="text" class="form-control" name="tvsname" placeholder="TV Series Name">
                            <label class="control-label" id="tvsname"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="control-label" for="1">TV Series Language</label>
                            <div class="btn-group">
                                <div class="col-md-1 col-sm-1"></div>
                                <select name="language" class="form-control">
                                    <option value="">Select Language</option>
                                    <?php
                                    foreach ($language as $key) {
                                        echo("<option value='$key[id]'>$key[name]</option>");
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <label id="language" class="col-md-2 control-label"></label>
                    </div>

        <div class="row">
            <div class="col-md-1 col-sm-1"></div>
            <label id="lan" class="col-md-2 control-label"></label>
        </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <label for="actor" class="col-md-2 control-label">Choose Genere</label>
                    </div>
                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>


                        <div class="form-group col-md-8 col-sm-8">

                            <?php
                            $cnt=0;
                            $total=0;
                            foreach ($genere as $key) {
                                $cnt++;
                                echo("
                        <div class='col-lg-2'>
                            <input type='checkbox' name='genere[]' value='$key[id]'>$key[name]
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
                        <label id="genere" class="col-md-2 control-label"></label>
                    </div>


                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label for="textArea" class="col-md-2 control-label">Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" rows="3" name="textArea"></textarea>
                            </div>
                        </div>
                        <label id="des" class="col-md-2 control-label"></label>
                    </div>


                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label for="pdate" class="col-md-2 control-label">Premiere Date</label>
                            <div class="col-lg-10">
                                <input type="date" name="pdate">
                            </div>
                        </div>
                        <label id="pdate" class="col-md-2 control-label"></label>
                    </div>



                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>
                        <label  class="col-md-2 control-label">Choose TV Series Poster</label>
                        <input type="file" name="filename" accept="image/gif, image/jpeg, image/png">
                        <label id="poster" class="col-md-2 control-label"></label>
                    </div>

                    <div class="row">
                        <div class="col-md-1 col-sm-1"></div>

                        <div class="form-group col-md-8 col-sm-8">
                            <label class="control-label" for="tvsname">TV Series Trailer</label>
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


            <!-- Adding new TVS Start -->

            <!-- Adding new TVS End -->


        <?php include("../../../lib/scripts/html/footer.html"); ?>
    </body>
</html>