<?php
    require 'php/get_single_ticket.php';
    require 'php/get_priority_status.php';
    require 'php/logs/add_view.php';
    $role = $_SESSION['roleID'];
?>

<div class="container">

<?php
  if($ticket['status'] == "Open" && $_SESSION['roleID'] != 1){
?>

    <div class="row">
      <div class="col">
        <label>Do you want to resolve this ticket?</label>

        </br>
      
        <div class="col-sm-2">
          <a href="php/crud_ticket/update_ticket.php?ticketID=<?php echo $ticket['ticketID']; ?>&action=update"><button class="btn btn-success">Yes</button></a>
          <a href="index.php?page=helpdesk_dashboard"> <button class="btn btn-danger">No</button></a>
        </div>
      </div>
    </div>
  
  </br>

  <?php } 
// // end
?>

  <form action="php/crud_ticket/update_ticket.php" method="get">

<!-- ST -->
    <div class="row under_line">
      <h3><?php echo $ticket['ticket_name'] ?></h3>
    </div>
<!--  -->

    </br>

<!-- ST -->
    <div class="row under_line">
      <div class="col-lg-4">
        <p>
        Customer E-mail: <?php echo $ticket['email'] ?>
        </p>
      </div>
      
      <div class="col-lg-3">
        <p>
          Customer name: <?php echo $ticket['customer_name'] ?>
        </p>
      </div>
    </div>
<!--  -->

<?php if($_SESSION['roleID'] != 1) { ?>
  <!-- ST -->
        <div class="row under_line">
          <div class="col-lg-3">
            <label><b>Priority:</b></label>
            <div class="form-group">
              <select name="priority" class="form-control" id="exampleFormControlSelect1">

                <?php
                  foreach($priorities as $priority_option){
                    if($ticket['priority'] == $priority_option['priorityID']){
                      echo '<option value="'.$priority_option['priorityID'].'" selected>'.$priority_option['priority_name'].'</option>';
                    }
                    else{
                      echo '<option value="'.$priority_option['priorityID'].'">'.$priority_option['priority_name'].'</option>';
                    }
                      
                  }
                ?>

              </select>
            </div>
          </div>

          <div class="col-lg-3">
              <label><b>Status:</b></label>
              <div class="form-group">
                <select name="status" class="form-control" id="exampleFormControlSelect1" <?php if($ticket['ticket_status'] == 1){ echo 'disabled'; } ?>>

                  <?php
                    foreach($status as $status_option){
                      if($ticket['ticket_status'] == $status_option['statusID']){
                  ?>
                        <option value="<?php echo $status_option['statusID'] ?>" selected <?php if($status_option['statusID'] == 1){ echo 'disabled'; }?>><?php echo $status_option['status']?></option>;
                  <?php
                      }
                      else{
                  ?>
                        <option value="<?php echo $status_option['statusID'] ?>" <?php if($status_option['statusID'] == 1){ echo 'disabled'; }?>><?php echo $status_option['status']?></option>;
                  <?php
                      }
                        
                    }
                  ?>

                </select>
              </div>
          </div>
        </div>
  <!--  -->

<?php } ?>

    </br>

<!-- ST -->
    <div class="row col">
        <h5>Ticket description:</h5>
    </div>
<!--  -->

<!-- ST -->
    <div class="row col">
        <p>
          <?php echo $ticket['ticket_content'] ?>
        </p>
    </div>
<!--  -->

<div class="divider">
</div>

</br>

<!-- ST -->
  <input type="hidden" name="ticketID" value="<?php echo $ticket['ticketID']; ?>">
  <input type="hidden" name="action" value="edit">
<!--  -->



<?php if($_SESSION['roleID'] != 1) { ?>
  <!-- ST -->
      <div class="row">
        <div class="col-sm-2">
          <input type="submit" class="btn btn-primary" name="save" value="Save changes">
        </div>
      </div>

      </br>

        </form>

      <div class="row">
        <div class="col-sm-1">
        <a href="index.php?page=helpdesk_dashboard"> <button class="btn btn-success">Go back</button></a>
        </div>


<?php } else { ?>

        </form>
  
        <a href="index.php?page=helpdesk&overview=overview"> <button class="btn btn-success">Go back</button></a>

  
<?php } ?>
<!--  -->

  <?php if($_SESSION['roleID'] != 1) { ?>
    

      <div class="col-sm-1">
        <a href="php/crud_ticket/update_ticket.php?ticketID=<?php echo $ticket['ticketID']; ?>&action=reset"><button class="btn btn-success">Reset ticket</button></a>
      </div> 
  <?php } ?>

  </br>

  <?php
    // start
  if($_SESSION['roleID'] == "3" ) {
  ?>

      <div class="col-sm-1">
        <a href="php/crud_ticket/delete_ticket.php?ticketID=<?php echo $ticket['ticketID']; ?>"><button class="btn btn-danger">Delete ticket</button></a>
      </div> 
    </div>

  <?php } 
  else{
  ?>

    </div>

  <?php
  }
  // // end
  ?>

  </br>
    
</div>
<!-- END CONTAINER -->