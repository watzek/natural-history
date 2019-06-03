<?php

include("classes/main.class.php");
$main=new main();

if($_GET["state"]){$state=$_GET["state"];}
else{$state="home";}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>

    <?php

    #$main->getView($state);

     ?>

     <h6><?= $state ?></h6>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js" type="text/javascript"></script>
  </body>
</html>
