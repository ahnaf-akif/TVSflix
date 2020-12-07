<?php
    echo("<br/><br/><br/>");
    include_once("../../../lib/scripts/php/checkLogin.php");
    include_once("../../../lib/database/db_execution.php");
    include_once("../../../config/model/tvs/tvs.php");
    $lanID="";
    if(isset($_GET['ID'])){
      $lanID=$_GET['ID'];
      if(CheckLan_TVS($lanID)==false){
          $isShow=false;
          echo("
          <br/><br/><br/>
          <h1><b>Invalid Genre</b></h1>
          <h2><b>Redirecting........</b></h2>
          ");
          header("refresh:3;url=../user/");
      }
  }else{
      header("Location:../user/");
  }
  $lanData=CheckLan_TVS($lanID);
  $tvs=TVS_LAN($lanID);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Category</title>
    <?php include_once("../../../lib/scripts/html/head.html"); ?>
</head>
<body class="container-fluid">
<?php if($log)include_once("../../../lib/scripts/html/navbar_log.html"); else include_once("../../../lib/scripts/html/navbar.html"); ?>
<br/><br/><br/><br/><div >
    <h1><?=$lanData[0]['Name']; ?></h1>
<table class="table table-striped">
  <thead class="thead-light">
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Poster</th>
      <th scope="col">More Info</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $cnt=1;
      foreach ($tvs as $key) {
        $tvsid=$key['tvsID'];
        $arr=TVS_info($tvsid);
    ?>
    <tr>
      <td scope="row" style="font-size:16px;"><b><?=$cnt++; ?></b></td>
      <td style="width:50%; position:relevent; ">
        <label style="font-size:20px;"><b><?=$arr[0]['Name']; ?></b></label><br/>
        
      </td>
      <td>
        <p style="width:80%; border:1px solid black; float:left;"><?= $arr[0]['Description']; ?></p>
        
      </td>
      <td>
          <img src="../../../content/img/tvs/<?= $arr[0]['Poster']; ?>" style="width : 80px; height: 100px; float: left;">

      </td>
      <td><a href="../tvs/index.php?TVSID=<?=$arr[0]['ID']; ?>">View More</a> </td>
    </tr>
    <?php
      }
    ?>
  </tbody>
</table>

</div>
<br/>
<?php include("../../../lib/scripts/html/footer.html"); ?> 
</body>
</html>