</br>

<?php

session_start();

if(isset($_SESSION['ref'])){
  unset($_SESSION['ref']);
}

require '../../../Private/config.php';

  $query = 'SELECT * FROM ticket_type';
  $stmt = $connect -> prepare($query);
  $stmt -> execute();
  $type = $stmt -> fetchAll(PDO::FETCH_ASSOC);

  $name = $_SESSION['customer_name'];
  $email = $_SESSION['email'];

?>

<form action="php/submit_ticket.php" method="post">

  <!-- Input field for the users email address (Pre filled in with data stored from registering) -->
    <label>Email:</label>
      <input placeholder="Email"    class="form-control form-control-md" type="text"     name="email"    value="<?php echo $email ?>"        autocomplete="on" class="box" required><br>
      <input type="hidden" name="userID" value="<?php echo $_SESSION['userID'] ?>">

  <!-- Input field for the users name (Pre filled in with data stored from registering) -->
    <label>Name:</label>
      <input placeholder="Name"     class="form-control form-control-md" type="text"     name="name"     value="<?php echo $name['name'] ?>" autocomplete="off" class="box" required><br>

  <!-- Select the type of ticket -->
    <label>What kind of ticket would you like to submit?</label>
      <div class="form-group">
        <select name="ticket_type" class="form-control" id="exampleFormControlSelect1">

          <option disabled>Select the kind of ticket you want to submit</option>
          <?php
            foreach($type as $ticket_type){
              echo '<option>'.$ticket_type['type'].'</option>';
            }
          ?>

        </select>
      </div>    

  <!-- Ticket title -->
    <label>Ticket title:</label>
    <input placeholder="Title"     class="form-control form-control-md" type="text"     name="title"     value="" autocomplete="off" class="box" required><br>


  <!-- Input ticket description -->
    <label>Put the description of your ticket submission here</label>
      <textarea placeholder="What's up?" style="width:100%" name="ticket_content" value="" required></textarea>

      </br></br>

      <input type="submit"          class="btn btn-success"              name='submit_ticket'    value="Submit ticket"   class='submit'/><br />

</form>