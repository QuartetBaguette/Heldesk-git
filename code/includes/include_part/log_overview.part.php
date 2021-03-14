<?php 
session_start();
require '../../../Private/config.php';

$_SESSION['log_page'] = true;
require '../../php/get_tickets.php';
?>

</br>

<table class="table">
  <thead>
    <tr>
      <th width="9%" scope="col">Ticket ID</th>
      <th width="20%" scope="col">E-mail</th>
      <th width="15%" scope="col">Priority</th>
      <th width="30%" scope="col">Ticket name</th>
      <th width="15%" scope="col">Ticket status</th>
      <th width="" scope="col">Ticket type</th>
      <th width="20%" scope="col">Date/time submitted</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($main_content as $content) { ?>
        <tr>
            
                <td><?php echo $content['ticketID']; ?></td>
                <td><?php echo $content['email']; ?></td>
                <td><b><?php echo $content['priority_name']; ?></b></td>
                <td><?php echo $content['ticket_name']; ?></td>
                <td><?php echo $content['status']; ?></td>
                <td><?php echo $content['type']; ?></td>
                <td><?php echo $content['date_time'] ?></td>
                <td>
                  <form action="index.php?page=logs_single_ticket" method="post">
                <input type="submit" class="btn btn-primary" name="view" value="View logs" class='submit'/>
                <input type="hidden" name="ID" value="<?php echo $content['ticketID']; ?>" />
                </form>
                </td>
        </tr>
    <?php } ?>

  </tbody>
</table>  