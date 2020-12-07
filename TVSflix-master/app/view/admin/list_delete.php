<?php
    include_once("../../../core/controller/user/user.php");
    include_once("../../../lib/scripts/html/head.html");
    if(isset($_GET['username'])==false){
        header("Location:../user/");
    }else{
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
    }
    if(isset($_GET['type'])==false){
        header("Location:../user/");
    }
    if($_GET['type']>5 || $_GET['type']<1){
        header("Location:../user/");
    }
?>

<?php
    $arr=array();
    $id=GetUserData($_GET['username']);
    if($_GET['type']==1){
        
    }else if($_GET['type']==2){
        $arr=GetUserWatching($id['ID']);
    }else if($_GET['type']==3){
        $arr=GetUserComplete($id['ID']);
    }else if($_GET['type']==4){
        $arr=GetUserWant($id['ID']);
    }else{
        $arr=GetUserFav($id['ID']);
    }
?>

<table class="table table-striped table-hover">
    <thead>
        <tr class="">
            <th>#</th>
            <th>
                TV Series Name
            </th>
            <th>
                Rating
            </th>
            <th>
                Language
            </th>
            <th>
                Genere
            </th>
            <th>
                Delete
            </th>
        </tr>
    </thead>

    <tbody>
        <?php
            $cnt=1;
            foreach ($arr as $key) {
             
        ?>
        <tr class="active">
            <td>
                <?= $cnt; $cnt++; ?>
            </td>
            <td>
                <?php
                    $tvsinfo=GetTVSInfo($key["tvsID"]);
                    $tvsname=$tvsinfo[0]["Name"];
                    echo($tvsname);
                ?>
            </td>
            <td>
                <?php
                    $rate=GetTVSRating($key["tvsID"]);
                    echo($rate);
                ?>
            </td>
            <td>
                <?php
                    $language=GetTVSLanguage($key["tvsID"]);
                    echo($language);
                ?>
            </td>
            <td>
                <?php
                    $genere=GetGenere($key["tvsID"]);
                    echo($genere);
                ?>
            </td>
            <td>
            <a href="../tvs/index.php?TVSID=<?= $key['tvsID'] ?>" class="btn btn-primary" role="button">Delete</a>
            </td>
        </tr>
        <?php
            }
        ?>

    </tbody>
</table>