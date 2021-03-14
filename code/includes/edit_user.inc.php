<?php
$_SESSION['edituser'] = '1';
require 'php/get_userinfo.php';

if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
  //zet alle session messages op nul
  unset($_SESSION['dangerMsg']);
  unset($_SESSION['errMsg']);
}
?>

<div class="container">
  <form action="php/crud_user/update_user.php" method="post">
    <label>User ID:</label>
    <div class="col-sm-2"><input placeholder="UserID"             class="form-control form-control-md" type="text"     name="userID"      value="<?php echo $data['userID']; ?>" autocomplete="off" class="box" readonly><br></div>
    <label>E-mail:</label>
    <div class="col-md-8"><input placeholder="Email"              class="form-control form-control-md" type="email"    name="email"       value="<?php echo $data['email']; ?>"  autocomplete="off" class="box"><br></div>
    <label>Phone number:</label>
    <div class="col-md-8"><input placeholder="Phonenumber"        class="form-control form-control-md" type="text"     pattern="[0-9]{10}" name="phonenumber" value="<?php echo $phonenumber['phonenumber']; ?>" autocomplete="off" class="box"><br></div>
    
    <label>User role:</label>
    <div class="col-sm-2">
    <div class="form-group">
      <select name="role" class="form-control" id="exampleFormControlSelect1">

        <?php
          foreach($roles as $role){
            if($data['FK_role'] == $role['roleID']){
              echo '<option value="'.$role['roleID'].'" selected>'.$role['roletype'].'</option>';
            }
            else{
              echo '<option value="'.$role['roleID'].'">'.$role['roletype'].'</option>';
            }
                    
          }
        ?>

      </select>
    </div>
    </div>

        </br>

    <input type="hidden" name="customerID" value="<?php echo $customerID['customerID'] ?>">

    <input type="submit" class="btn btn-success" name="save" value="Save edits" class='submit'/><br />
  </form>
</div>