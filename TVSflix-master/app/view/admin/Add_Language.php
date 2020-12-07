<<!doctype html>
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
            <label class="control-label" for="langname">Language Name :</label>
            <input type="text" class="form-control" id="genrename" name="langname" placeholder="Enter Language Name">
            <button type="submit" class="btn btn-default" onclick="">ADD</button>
        </div>
    </div>
</form>
<?php include("../../../lib/scripts/html/footer.html"); ?>
</body>
</html>