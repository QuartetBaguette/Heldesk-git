<?php

    $ticketID = $_GET['ID'];

    $query = 'SELECT * FROM tickets JOIN ticket_status ON tickets.ticket_status = ticket_status.statusID JOIN ticket_type AS type ON tickets.ticket_type = type.typeID WHERE :id = ticketID ';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':id', $ticketID);
    $stmt -> execute();
    $ticket = $stmt -> fetch(PDO::FETCH_ASSOC);
?>