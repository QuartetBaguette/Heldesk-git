<?php

session_start();
require '../../../private/config.php';  

print_r($_SESSION);

$ID = $_GET['ticketID'];
$employeeID = $_SESSION['userID'];
$action = $_GET['action'];
$name = $_SESSION['customer_name'];

if(empty($_GET['status'])){
    $_GET['status'] = 1;
}

if($action == "update"){
    $update = 'UPDATE tickets SET ticket_status = 2, employeeID = :empID WHERE ticketID = :ID';
    $stmt = $connect -> prepare($update);
    $stmt -> bindParam(':empID', $employeeID);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> execute();

    $state_msg = 'From EMPTY to "Being worked on."'; 

    $query = 'INSERT INTO ticket_actions (ticketID, change_state, change_employee) VALUES (:ID, :state, :employee)';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> bindParam(':state', $state_msg);
    $stmt -> bindParam(':employee', $employeeID);

    $stmt -> execute();
}

else if($action == "edit"){

    $query = 'SELECT priority, ticket_status FROM tickets WHERE ticketID = :ID';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> execute();
    $prioID = $stmt -> fetch(PDO::FETCH_ASSOC);

    $update = 'UPDATE tickets SET ticket_status = :status, priority = :priority WHERE ticketID = :ID';
    $stmt = $connect -> prepare($update);
    $stmt -> bindParam(':status', $_GET['status']);
    $stmt -> bindParam(':priority', $_GET['priority']);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> execute();

    $priority_msg = $name['name'].' updated priority from '.$prioID['priority'].' to '.$_GET['priority'].'';
    $state_msg = $name['name'].' updated status from '.$prioID['ticket_status'].' to '.$_GET['status'].'';

    $query = 'INSERT INTO ticket_actions (ticketID, change_state, change_priority) VALUES (:ID, :state, :priority)';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> bindParam(':state', $state_msg);
    $stmt -> bindParam(':priority', $priority_msg);
    $stmt -> execute();
}

else if($action == "reset"){

    $query = 'SELECT employeeID FROM tickets WHERE ticketID = :ID';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> execute();
    $empID = $stmt -> fetch(PDO::FETCH_ASSOC);

    $update = 'UPDATE tickets SET ticket_status = 1, employeeID = 0, priority = 1 WHERE ticketID = :ID';
    $stmt = $connect -> prepare($update);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> execute();

    $state_msg = 'State got reset to "Open"'; 
    $employee_msg = ''.$empID['employeeID'].' changed to EMPTY';
    $priority_msg = 'Priority got reset to "Low"';

    $query = 'INSERT INTO ticket_actions (ticketID, change_state, change_employee, change_priority) VALUES (:ID, :state, :employee, :priority)';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':ID', $ID);
    $stmt -> bindParam(':state', $state_msg);
    $stmt -> bindParam(':employee', $employee_msg);
    $stmt -> bindParam(':priority', $priority_msg);
    $stmt -> execute();
}

header('location:../../index.php?page=helpdesk_dashboard');

?>