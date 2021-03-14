<?php

    $query = 'SELECT * FROM priorities';
    $stmt = $connect -> prepare($query);
    $stmt -> execute();
    $priorities = $stmt -> fetchAll(PDO::FETCH_ASSOC);

    $query = 'SELECT * FROM ticket_status';
    $stmt = $connect -> prepare($query);
    $stmt -> execute();
    $status = $stmt -> fetchAll(PDO::FETCH_ASSOC);

?>