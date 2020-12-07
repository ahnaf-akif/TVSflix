<!doctype html>
<html lang="en">
  <head>
    <title>Add Genre</title>
    <?php include_once("../../../lib/scripts/html/head.html"); ?>
  </head>
  <body>
  <?php include_once("../../../lib/scripts/html/navbar.html"); ?>
  <br/><br/><br/>
  <form class="form-inline" action="post">
      <div class="row" style="min-height: 560px">
          <div class="col-md-3">
              <?php include_once("../../../lib/scripts/html/collpse_menu.html"); ?>
          </div>
          <div class="form-group col-md-9 col-sm-8">
              <label class="control-label" for="actorname">Select Actor:</label> &nbsp;
              <select class="form-control" id="select" style="width: 50%;">
                  <option>Actor Name</option>
              </select>
              <br/><br/>

              <label class="control-label" for="actorname">Actor Name :</label>
              <input type="text" class="form-control" id="actorname" name="actorname" placeholder="Enter Actor Name" style="margin-left:5px;">
              <br/><br/>
              <label class="control-label" for="country">Country :</label>
              <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country" style="margin-left: 28px;">
              <br/><br/>
              <label class="control-label" for="DOB">Date of Birth :</label>
              <input type="date" class="form-control" id="DOB" name="DOB">
              <br/><br/>
              <label class="control-label" for="career">Career :</label>
              <input type="text" class="form-control" id="career" name="career" placeholder="Enter Career" style="margin-left: 38px;">
              <br/><br/>
              <label for="actor" class="control-label" style="float:left;">Choose Actor Image :</label>
              <input type="file" name="filename" accept="image/gif, image/jpeg, image/png" style="float:left;">
              <br/><br/>
              <button type="submit" class="btn btn-default" onclick="">ADD</button>
          </div>
  </div>
</form>
<?php include("../../../lib/scripts/html/footer.html"); ?> 
  </body>
</html>