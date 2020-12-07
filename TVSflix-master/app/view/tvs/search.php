<?php
    include_once("../../../lib/scripts/php/checkLogin.php");
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

    

    <?php include("../../../lib/scripts/html/footer.html"); ?>
</body>
</html>