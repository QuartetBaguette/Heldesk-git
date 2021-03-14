<?php

$query = 'SELECT ticket_views FROM ticket_views WHERE :ID = ticketID';
$stmt = $connect -> prepare($query);
$stmt -> bindParam(':ID', $ticket['ticketID']);
$stmt -> execute();
$views = $stmt -> fetch(PDO::FETCH_ASSOC);

if(empty($views)){
    $i = 1;

    $new_logs = 'INSERT INTO ticket_views (ticketID, ticket_views) VALUES (:ID, :views)';
    $stmt = $connect -> prepare($new_logs);
    $stmt -> bindParam(':ID', $ticket['ticketID']);
    $stmt -> bindParam(':views', $i);
    $stmt -> execute();
}
else{  
    $new_views = $views['ticket_views'];

    $new_views++;

    $query2 = 'UPDATE ticket_views SET ticket_views = :views WHERE ticketID = :ID';
    $stmt = $connect -> prepare($query2);
    $stmt -> bindParam(':ID', $ticket['ticketID']);
    $stmt -> bindParam(':views', $new_views);
    $stmt -> execute();
}
?>