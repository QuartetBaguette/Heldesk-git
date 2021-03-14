<?php

if(empty($_GET['typeID'])){
    $type = "1";
}
else{
    $type = $_GET['typeID'];
}
if($_SESSION['roleID'] == 1){
    $query = 'SELECT * FROM tickets 
                JOIN ticket_status ON tickets.ticket_status = ticket_status.statusID 
                JOIN ticket_type AS type ON tickets.ticket_type = type.typeID 
                JOIN priorities ON tickets.priority = priorities.priorityID
                WHERE userID = :userID 
                ORDER BY priority DESC';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':userID', $_SESSION['userID']);
    $stmt -> execute();
    $main_content = $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

if($_SESSION['roleID'] == 2){

    $query = 'SELECT * FROM tickets 
                JOIN ticket_status ON tickets.ticket_status = ticket_status.statusID 
                JOIN ticket_type AS type ON tickets.ticket_type = type.typeID 
                JOIN priorities ON tickets.priority = priorities.priorityID
                WHERE ticket_type = :type AND ticket_status = 1 
                ORDER BY priority DESC';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':type', $type);
    $stmt -> execute();
    $main_content = $stmt -> fetchAll(PDO::FETCH_ASSOC);
}

else if($_SESSION['roleID'] == 3){

    if(isset($_SESSION['log_page'])){
        $query = 'SELECT * FROM tickets 
                    JOIN ticket_status ON tickets.ticket_status = ticket_status.statusID 
                    JOIN ticket_type AS type ON tickets.ticket_type = type.typeID 
                    JOIN priorities ON tickets.priority = priorities.priorityID
                    ORDER BY priority DESC';
        $stmt = $connect -> prepare($query);
        $stmt -> execute();
        $main_content = $stmt -> fetchAll(PDO::FETCH_ASSOC);

        unset($_SESSION['log_page']);
    }

    else{
        $query = 'SELECT * FROM tickets 
                    JOIN ticket_status ON tickets.ticket_status = ticket_status.statusID 
                    JOIN ticket_type AS type ON tickets.ticket_type = type.typeID 
                    JOIN priorities ON tickets.priority = priorities.priorityID
                    WHERE :type = typeID
                    ORDER BY priority DESC';
        $stmt = $connect -> prepare($query);
        $stmt -> bindParam(':type', $type);
        $stmt -> execute();
        $main_content = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }
}

?>