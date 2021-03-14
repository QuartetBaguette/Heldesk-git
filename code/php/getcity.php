<?php
    $query = 'SELECT * FROM city';
    $stmt = $connect -> prepare($query);
    $stmt -> execute();
    $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>