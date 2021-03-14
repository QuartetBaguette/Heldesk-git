<?php

if(isset($_GET['ref'])){
  $_SESSION['ref'] = $_GET['ref'];
  $_SESSION['dangerMsg'] = "You need to login to access this page!";
}

if(isset($_SESSION['dangerMsg'])){
  echo '<div class="alert alert-danger">'.$_SESSION['dangerMsg'].'</div>';
  unset($_SESSION['dangerMsg']);
}

?>

<div class="container">
  <form action="php/login.php" method="post">
    <input placeholder="Email"    class="form-control form-control-md" type="text"     name="email"    value="" autocomplete="on" class="box"><br>
    <input placeholder="Password" class="form-control form-control-md" type="password" name="password" value="" autocomplete="off" class="box"><br>
    <input type="submit"          class="btn btn-success"              name='login'    value="Login"   class='submit'/><br />
  </form>

  </br>
  <label>Don't have an account? Register here!</label></br>
  <a href="index.php?page=register"><button class="btn btn-primary">No account?</button></a>

  </br>

</div>