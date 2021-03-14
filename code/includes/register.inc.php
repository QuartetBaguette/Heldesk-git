<?php
  require 'php/getcity.php';
?>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <form action="php/register.php" method="post">
        <input placeholder="Email"              class="form-control form-control-md col-lg-8" type="email"    name="email"       value="" autocomplete="off" class="box"><br>

        <div class="row">
          <div class="col-lg-4">
            <input placeholder="Password"           class="form-control form-control-md" type="password" name="password"    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"
            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 or more characters" value="" autocomplete="off" class="box"><br>
          </div>
          <div class="col-lg-4">
            <input placeholder="Repeat password"    class="form-control form-control-md" type="password" name="reppassword" value="" autocomplete="off" class="box"><br>
          </div>
        </div>

        <input placeholder="Name"               class="form-control form-control-md col-lg-8" type="text"     name="name"        value="" autocomplete="off" class="box"><br>
        
        <div class="row">
          <div class="col-lg-5">
            <input placeholder="Adress"             class="form-control form-control-md" type="text"     name="adress"      value="" autocomplete="off" class="box"><br>
          </div>
          <div class="col-lg-3">
            <input placeholder="Postalcode"         class="form-control form-control-md" type="text"     pattern="([0-9]{4})(['\s']{0,1})([A-Za-z]{2})"     name="postalcode"  value="" autocomplete="off" class="box"><br>
          </div>
        </div>

        <input placeholder="Phonenumber"        class="form-control form-control-md col-lg-8" type="text"     pattern="[0-9]{10}" name="phonenumber" value="" autocomplete="off" class="box"><br>
        
          <div class="form-group">
          <select name="city" class="form-control col-lg-8" id="exampleFormControlSelect1">

            <option>Select your city</option>
            
            <?php
              foreach($data as $city){
                echo '<option value="'.$city['cityID'].'">'.$city['city'].'</option>';
              }
            ?>

          </select>
        </div>

        <input type="submit"                    class="btn btn-success"                              name="register"    value="Register"   class='submit'/><br />
      </form>
    </div>

    <div class="col-lg-2">
    </div>

  </div>
</div>
