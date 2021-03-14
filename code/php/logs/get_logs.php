<?php

$query = 'SELECT * FROM ticket_actions WHERE :ID = ticketID';
$stmt = $connect -> prepare($query);
$stmt -> bindParam(':ID', $_POST['ID']);
$stmt -> execute();
$logs = $stmt -> fetchAll(PDO::FETCH_ASSOC);

$query = 'SELECT ticket_views FROM ticket_views WHERE :ID = ticketID';
$stmt = $connect -> prepare($query);
$stmt -> bindParam(':ID', $_POST['ID']);
$stmt -> execute();
$views = $stmt -> fetch(PDO::FETCH_ASSOC);

?>