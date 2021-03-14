<?php

// session_start();
// require '../../../private/config.php';  

// print_r($_POST['action']);

// $ID = $_POST['ticketID'];
// $employeeID = $_SESSION['userID'];
// $action = $_POST['action'];

// if($action == "update"){
//     $update = 'UPDATE tickets SET ticket_status = 2, employeeID = :empID WHERE ticketID = :ID';
//     $stmt = $connect -> prepare($update);
//     $stmt -> bindParam(':empID', $employeeID);
//     $stmt -> bindParam(':ID', $ID);
//     $stmt -> execute();

//     $state_msg = 'From EMPTY to "Being worked on."'; 

//     $query = 'INSERT INTO ticket_actions (ticketID, change_state, change_employee) VALUES (:ID, :state, :employee)';
//     $stmt = $connect -> prepare($query);
//     $stmt -> bindParam(':ID', $ID);
//     $stmt -> bindParam(':state', $state_msg);
//     $stmt -> bindParam(':employee', $employeeID);

//     $stmt -> execute();
// }

// else if($action == "reset"){

//     $query = 'SELECT employeeID FROM tickets WHERE ticketID = :ID';
//     $stmt = $connect -> prepare($query);
//     $stmt -> bindParam(':ID', $ID);
//     $stmt -> execute();
//     $empID = $stmt -> fetch(PDO::FETCH_ASSOC);

//     $update = 'UPDATE tickets SET ticket_status = 1, employeeID = 0 WHERE ticketID = :ID';
//     $stmt = $connect -> prepare($update);
//     $stmt -> bindParam(':ID', $ID);
//     $stmt -> execute();

//     $state_msg = 'State got reset to "Open"'; 
//     $employee_msg = ''.$empID['employeeID'].' changed to EMPTY';

//     $query = 'INSERT INTO ticket_actions (ticketID, change_state, change_employee) VALUES (:ID, :state, :employee)';
//     $stmt = $connect -> prepare($query);
//     $stmt -> bindParam(':ID', $ID);
//     $stmt -> bindParam(':state', $state_msg);
//     $stmt -> bindParam(':employee', $employee_msg);

//     $stmt -> execute();
// }

// header('location:../../index.php?page=helpdesk_dashboard');

?>