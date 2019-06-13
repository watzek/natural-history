<?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  include("classes/main.class.php");
  $main = new main();
  if($_GET["page"]) { $page = $_GET["page"]; }
  else { $page = "home"; }
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>LC Natural History Collection</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>

  <body>
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light"> <!-- fixed-top -->
      <a class="navbar-brand" href="https://naturalhistory.watzekdi.net/?page=home">LC NHC</a>
    <!-- enables dropdown navbar on small devices -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
      </button>
    <!-- dropdown content -->
      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="https://naturalhistory.watzekdi.net/?page=about">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Collections
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="https://naturalhistory.watzekdi.net/?page=collections&id=1">Beetles</a>
              <a class="dropdown-item" href="https://naturalhistory.watzekdi.net/?page=collections&id=2">Lichens</a>
              <a class="dropdown-item" href="https://naturalhistory.watzekdi.net/?page=collections&id=3">Grasses</a>
              <a class="dropdown-item" href="https://naturalhistory.watzekdi.net/?page=collections&id=4">Fungi</a>
              <a class="dropdown-item" href="#">Arachnids</a>
              <a class="dropdown-item" href="#">Vertebrates</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="https://naturalhistory.watzekdi.net/?page=search">
                Search Collections
              </a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="https://naturalhistory.watzekdi.net/?page=get-involved">Get Involved</a>
          </li>
        </ul>
      </div>
    </nav>

    <!-- displays corresponding page from templates class -->
      <?php
        $main->getView($page);
      ?>

    <div class="container-fluid bg-light text-center">
      <p>Currently displaying the <b><?= $page ?></b> page</p>
    </div>

    <!-- consider local fallbacks in case CDN is down -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
