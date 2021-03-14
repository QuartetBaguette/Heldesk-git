<?php 
    session_start();
    require '../../../Private/config.php';
    require '../../php/get_tickets.php';

    if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
      //zet alle session messages op nul
      unset($_SESSION['dangerMsg']);
      unset($_SESSION['errMsg']);
  }
?>

<table class="table">
  <thead>
    <tr>
      <th width="20%" scope="col">E-mail</th>
      <th width="15%" scope="col">Customer name</th>
      <th width="35%" scope="col">Ticket name</th>
      <th width="15%" scope="col">Ticket status</th>
      <th width="" scope="col">Ticket type</th>
      <th></th>
    </tr>
  </thead>

</br>

  <tbody>

    <?php foreach($main_content as $content) { ?>
        <tr>
            
                <td><?php echo $content['email']; ?></td>
                <td><?php echo $content['customer_name']; ?></td>
                <td><?php echo $content['ticket_name']; ?></td>
                <td><?php echo $content['status']; ?></td>
                <td><?php echo $content['type']; ?></td>
                <td><a href="index.php?page=view_ticket&ID=<?php echo $content['ticketID']; ?>"> <button class="btn btn-primary">View</button></a></td>
        </tr>
    <?php } ?>

  </tbody>
</table>