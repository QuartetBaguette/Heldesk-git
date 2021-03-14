<?php

require '../../../Private/config.php';

$ticketID = $_GET['ticketID'];

$query = 'DELETE FROM tickets WHERE ticketID = :ticketID';
$stmt = $connect -> prepare($query);
$stmt -> bindParam(':ticketID', $ticketID);
$stmt -> execute();

header('location:../../index.php?page=helpdesk_dashboard');

?>