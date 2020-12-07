<?php
    echo("<br/><br/><br/>");
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once("../../../lib/database/db_execution.php");
    include_once("../../../core/controller/user/user.php");
    include_once("../../../config/model/tvs/tvs.php");
    
    $tvsID="";
    if(isset($_GET['TVSID'])){
        $tvsID=$_GET['TVSID'];
        if(ChecktvsID($tvsID)==false){
            echo("
          <br/><br/><br/>
          <h1><b>Invalid TV Series</b></h1>
          <h2><b>Redirecting........</b></h2>
          ");
          header("refresh:3;url=../user/");
        }
    }else{
        header("Location:../user/");
    }
    $query = "select * from tvsinfo where ID=$tvsID";
    $result=ExecuteQuery($query);
    $mainid="";
    if($result)
    {
        $row=$result;
        $name=$row[0]["Name"];
        $desc = $row[0]["Description"];
        $trailer = $row[0]["Trailer"];
        $poster = $row[0]["Poster"];
        $mainid=$row[0]["main"];
    }else{
        header("Location:../user/");
    }
    $queryEp = "select * from episodelist where TvsID=$tvsID";
    $result1=ExecuteQuery($queryEp);
    if(!$result1)
    {
        // echo "No episode data is found";
    }

    $queryCast = "SELECT * FROM castlist WHERE tvsID=$tvsID";
    $result2=ExecuteQuery($queryCast);
    if(!$result2)
    {
        // echo "No Cast is found";
    }

    $queryReview = "SELECT * FROM review WHERE tvsID=$tvsID";
    $result3=ExecuteQuery($queryReview);
    if(!$result3)
    {
        // echo "No Review is found";
    }
    ///Manual Data
    $rate=5.5;
    $rateCount=50;
    $genre="Action, Advanture";
    $lang=GetTVSLanguage($mainid);
    $allseason=GetAllSeason($mainid);
?>

<html>
    <head>
        <title>TV Series Information</title>
        <?php include_once("../../../lib/scripts/html/head.html"); ?>
    </head>
    <body class="container-fluid">
        <?php if($log)include_once("../../../lib/scripts/html/navbar_log.html"); else include_once("../../../lib/scripts/html/navbar.html"); ?>
        <br/><br/>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h2><b><?= $name?></b></h2>
                <form>
                    <select class="form-control" style="width: 20%;" onchange="ChangeSeason()" id="season">
                        <?php
                            foreach ($allseason as $key ) {
                                if($key['ID']==$tvsID){
                                    echo("<option value='$key[ID]' selected='selected'>$key[Name]</option> ");
                                }else{
                                    echo("<option value='$key[ID]' >$key[Name]</option> ");
                                }
                            }
                        ?>
                    </select>
                </form>
                <script>
                    function ChangeSeason() {
                        let str=document.getElementById("season").value;
                        let url="../tvs/index.php?TVSID="+str;
                        window.location.replace(url);
                    }
                </script>

                <div class="row">
                    <div class="col-md-4" align="center">
                        <br/><br/><br/>
                        <img src="../../../content/img/tvs/<?= $poster?>" width="100%" height="400px" alt="Poster">
                        <br/><br/>
                        <button class="btn btn-default">
                            <a href="#episode" style="text-decoration: none">Episode List</a>
                        </button>
                        <button class="btn btn-default">
                            <a href="#cast" style="text-decoration: none">Cast List</a>
                        </button>
                        <button class="btn btn-default">
                            <a href="#review" style="text-decoration: none">review List</a>
                        </button>
                    </div>
                    <br/><br/><br/>
                    <div class="col-md-8">
                        <label style="font-size: 20px">Rating: <?= $rate?>/10</label> (Rated by <?= $rateCount?> user)
                        &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                        <iframe width="680" height="300"
                            src="<?= $trailer; ?>">
                        </iframe>
                        <!-- <button class="btn btn-default"><a href="<?= $trailer?>" style="text-decoration: none" target="_blank">Watch trailer</a></button> -->
                        <h3>Description:</h3>
                        <p><?= $desc?></p>
                        <table>
                            <tr>
                                <td>Genre</td>
                                <td>:</td>
                                <td><?= $genre?></td>
                            </tr>
                            <tr>
                                <td>Language</td>
                                <td>:</td>
                                <td><?= $lang; ?></td>
                            </tr>
                        </table>
                        <br/>
                        <form>
                            <div class="form-group">
                                <label for="rating" class="col-md-2 control-label">Give rating:</label>
                                <div class="col-md-10">
                                        <select  id="rating">
                                            <?php
                                                for ($i=0; $i < 11; $i++) { 
                                                    echo("<option value='$i'>$i</option>");
                                                }
                                            ?>
                                        </select>
                                        <button onclick="GiveRating()">Rate This TV Series</button>
                                        <label id="rateError" class="col-md-2 control-label"></label>
                                    <br/><br/>
                                </div>
                            </div>
                            <script>
                                function GiveRating(){
                                    let rate=document.getElementById("rateError");
                                    let select=document.getElementById("rating");
                                    rate.style="color:red";
                                    rate.innerText="Error";
                                }
                            </script>
                            <div class="row">
                                <div class="col-md-4">
                                    <select class="form-control" style="width: 70%;" onchange="WatchChange()" id="watch_change">
                                        <option value="1">Watching</option>
                                        <option value="2">Want to watch</option>
                                        <option value="3">Complete</option>
                                    </select>
                                    <script>
                                        function WatchChange(){
                                            let type=document.getElementById("watch_change").value;
                                            alert("Added");
                                            let ajax=new XMLHttpRequest();
                                            ajax.onreadystatechange=function(){
                                                if(this.readyState==4 && this.status==200){
                                                    let data=JSON.parse(ajax.responseText);
                                                    alert("Added");
                                                }
                                            }
                                            ajax.open("GET","../../../lib/scripts/php/search.php?type=3&watch="+type,true);
                                            ajax.send();
                                        }
                                    </script>
                                </div>
                                <div class="col-md-8">
                                    <input type="checkbox"> Favourite
                                </div>
                            </div>
                        </form>
                        Write a Review<br/>
                        <form>
                            <textarea style="width: 50%; min-height: 100px;" placeholder="write a review"></textarea><br/>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>
                <br/>
                <h3 id="episode"><b>Episode List</b></h3>
                <table width="100%" border="1px" class="table table-striped">
                    <tr>
                        <th width="5%">No</th>
                        <th width="15%">Name</th>
                        <th>Description</th>
                        <th width="10%">Aired Date</th>
                    </tr>
                    <?php
                    foreach ($result1 as $row1) {
                    // while($row1=mysqli_fetch_array($result1))
                    // {
                        ?>
                    <tr>
                        <td><?=$row1["Titleno"]?></td>
                        <td><?=$row1["Titlename"]?></td>
                        <td><?=$row1["Description"]?></td>
                        <td><?=$row1["Pdate"]?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>

                <br/><br/>

                <h3 id="cast"><b>Casting</b></h3>
                <table width="100%" class="table table-striped">
                    <tr>
                        <th width="15%">Avater</th>
                        <th width="15%">Name</th>
                        <th width="15%">Role</th>
                        <th>Career</th>
                        <th width="10%">Country</th>
                    </tr>
                    <?php
                    foreach ($result2 as $row2) {
                        $actor="SELECT * FROM actorinfo WHERE ID=$row2[actorID]";
                        $newArr=ExecuteQuery($actor);
                    ?>
                        <tr>
                            <td><img src="../../../content/img/actor/<?=$newArr[0]['Image']?>" height="100" width="100" alt="<?=$newArr[0]['Image']?>"></img></td>
                            <td><?=$newArr[0]["Name"]?></td>
                            <td><?=$row2["Role"]?></td>
                            <td><?=$newArr[0]["Career"]?></td>
                            <td><?=$newArr[0]["Country"]?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>

                <br/><br/>

                <h3 id="review"><b>Review</b></h3>
                <table width="100%" class="table table-striped">
                    <tr>
                        <th width="15%">User Name</th>
                        <th width="15%">Review</th>
                        <th width="10%">Date</th>
                    </tr>
                    <?php
                    foreach ($result3 as $row3) {
                        $userinfo="SELECT * FROM userinfo WHERE ID=$row3[userID]";
                        $newArr=ExecuteQuery($userinfo);
                    ?>
                        <tr>
                            <td width="15%"><?=$newArr[0]["UserName"]?></td>
                            <td><?=$row3["Review"]?></td>
                            <td></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-1"></div>
        <br/><br/>
        <?php include("../../../lib/scripts/html/footer.html") ?>
    </body>
</html>