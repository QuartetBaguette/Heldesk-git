<?php

$query = 'SELECT * FROM tickets JOIN ticket_status ON tickets.ticket_status = ticket_status.statusID JOIN ticket_type AS type ON tickets.ticket_type = type.typeID WHERE :id = employeeID';
$stmt = $connect -> prepare($query);
$stmt -> bindParam(':id', $_SESSION['userID']);
$stmt -> execute();
$main_content = $stmt -> fetchAll(PDO::FETCH_ASSOC);

?>