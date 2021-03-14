<nav class="navbar navbar-expand-md bg-light navbar-light">
  <a class="navbar-brand" href="index.php?page=home"><img src="../Images/logo-kpn-groot.png" alt="Home"></img></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">

        <?php
          if(!isset($_SESSION['ingelogd'])){
        ?>

            <li class="nav-item"><a class="nav-link" href="index.php?page=register">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=login">Login</a></li>

        <?php
          }

          // If user is logged in as a customer
          else if(isset($_SESSION['ingelogd'])){
            if($_SESSION['roleID'] == 1){
        ?>
            <li class="nav-item"><a class="nav-link" href="index.php?page=helpdesk">Support</a></li>
            <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>

        <?php
            }
          
            else if($_SESSION['roleID'] == 2){
        ?>
            <li class="nav-item"><a class="nav-link" href="index.php?page=helpdesk_dashboard">Helpdesk dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>

        <?php
            }
          // If user is logged in as a admin
            else if($_SESSION['roleID'] == 3){
        ?>
            <li class="nav-item"><a class="nav-link" href="index.php?page=helpdesk_dashboard">Helpdesk dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?page=admin_dashboard&part=crud_users">Admin dashboard</a></li> 
            <li class="nav-item"><a class="nav-link" href="php/logout.php">Logout</a></li>
            
        <?php
          }
          }
        ?>

    </ul>
  </div>
</nav>
<br>