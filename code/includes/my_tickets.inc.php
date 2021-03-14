<?php 
  $name = $_SESSION['customer_name'];

  unset($_SESSION['dangerMsg']);
?>

<div class="jumbotron">
  <h1>Hello <?php echo $name['name']; ?></h1>      
  <p>These are the tickets you are currently working on.</p>
</div>

<?php require 'php/get_my_tickets.php'; ?>

<table class="table">
  <thead>
    <tr>
      <th width="9%" scope="col">Ticket ID</th>
      <th width="20%" scope="col">E-mail</th>
      <th width="15%" scope="col">Customer name</th>
      <th width="35%" scope="col">Ticket name</th>
      <th width="15%" scope="col">Ticket status</th>
      <th width="" scope="col">Ticket type</th>
      <th>Date/time submitted</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

  <?php 
        if(empty($main_content)){
      ?>
        <tr><td colspan="7"><h4>You currently have no tickets that you are working on.</h4></td></tr>
      <?php
        }
        else{
           foreach($main_content as $content) { ?>
        <tr>
                <td><?php echo $content['ticketID']; ?></td>
                <td><?php echo $content['email']; ?></td>
                <td><?php echo $content['customer_name']; ?></td>
                <td><?php echo $content['ticket_name']; ?></td>
                <td><?php echo $content['status']; ?></td>
                <td><?php echo $content['type']; ?></td>

                <?php if($_SESSION['roleID'] == 3) {?>
                    <td><?php echo $content['employeeID']; ?></td>
                <?php } ?>

                <td><?php echo $content['date_time'] ?></td>

                <td><a href="index.php?page=view_ticket&ID=<?php echo $content['ticketID']; ?>"><button class="btn btn-primary">View</button></a></td>
            </form>
        </tr>
    <?php }} ?>

  </tbody>
</table>

<a href="index.php?page=helpdesk_dashboard"> <button class="btn btn-success">Go back</button></a>

</br>