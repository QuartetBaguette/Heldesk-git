<?php
  session_start();

  include '../private/config.php';

  if (isset($_GET['page'])){
    $page = $_GET['page'];
  }else{
    $page='home';
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="../Images/hmm.png">
    <title>KPN - Helpdesk</title>

  </head>

  <body>

  <div class="container" id="maincontent">
      <?php
        include 'includes/navbar.inc.php';

        if(isset($_SESSION['errMsg']) && ($_SESSION['errMsg']) != ''){
          echo '<div class="alert alert-success">'.$_SESSION['errMsg'].'</div>';
          unset($_SESSION['errMsg']);
        }elseif(isset($_SESSION['dangerMsg'])){
          echo '<div class="alert alert-danger">'.$_SESSION['dangerMsg'].'</div>';
          unset($_SESSION['dangerMsg']);
        }
      ?>

      </br>
            <!-- Main content -->
            <?php
              include 'includes/'.$page.'.inc.php';
            ?>
      </br>
    </div>

  </body>

  <div class="footer">
      <p>&copy; 2020 KPN, Rotterdam</p>
    </div>
    
</html>

<?php

//! RED
//* GREEN
//? BLUE
//TODO: ORANGE

?>