<?php 
  $name = $_SESSION['customer_name'];

  if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
    //zet alle session messages op nul
    unset($_SESSION['dangerMsg']);
    unset($_SESSION['errMsg']);
}
?>

<div class="jumbotron">
  <h1>Welcome <?php echo $name['name']; ?></h1>      
  <p>Select the ticket you want to resolve! Good luck!</p>
</div>

<div class="row">
  <div class="col">
    <div class="container" id="function_selector">

        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn btn-primary">
            <a href="index.php?page=helpdesk_dashboard&typeID=1"> <button class="btn btn-primary">Support tickets</button></a>
          </label>

          <label class="btn btn-primary">
            <a href="index.php?page=helpdesk_dashboard&typeID=2"> <button class="btn btn-primary">Complaints</button></a>
          </label>

          <label class="btn btn-primary">
            <a href="index.php?page=my_tickets"><button class="btn btn-primary">My tickets</button></a>
          </label>

        </div>
    </div>
  </div>

</div>

</br>

<?php require 'php/get_tickets.php'; ?>

<table class="table">
  <thead>
    <tr>
      <th width="9%" scope="col">Ticket ID</th>
      <th width="9%" scope="col">Priority</th>
      <th width="20%" scope="col">E-mail</th>
      <th width="15%" scope="col">Customer name</th>
      <th width="30%" scope="col">Ticket name</th>
      <th width="15%" scope="col">Ticket status</th>
      <th width="" scope="col">Ticket type</th>

      <?php if($_SESSION['roleID'] == 3) { ?>
        <th width="" scope="col">Employee ID</th>
      <?php } else{} ?>

      <th width="" scope="col">Date/time submitted</th>
    </tr>
  </thead>
  <tbody>

      <?php 
        if(empty($main_content)){
      ?>
        <tr><td colspan="7"><h4>There are currently no open tickets available, please check in again later.</h4></td></tr>
      <?php
        }
        else{
          foreach($main_content as $content) { 
      ?>
            <tr>
              <td><?php echo $content['ticketID']; ?></td>
              <td><b><?php echo $content['priority_name']; ?></b></td>
              <td><?php echo $content['email']; ?></td>
              <td><?php echo $content['customer_name']; ?></td>
              <td><?php echo $content['ticket_name']; ?></td>
              <td><b><?php echo $content['status']; ?></b></td>
              <td><?php echo $content['type']; ?></td>
              <?php if($_SESSION['roleID'] == 3) {?>
                  <td><?php echo $content['employeeID']; ?></td>
              <?php } ?>
              <td><?php echo $content['date_time'] ?></td>
              <td><a href="index.php?page=view_ticket&ID=<?php echo $content['ticketID']; ?>"> <button class="btn btn-primary">View</button></a></td>
            </tr>
      <?php }} ?>

  </tbody>
</table>