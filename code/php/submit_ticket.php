<?php

    require '../../Private/config.php';

    session_start();

    if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
        //zet alle session messages op nul
        unset($_SESSION['dangerMsg']);
        unset($_SESSION['errMsg']);
    }

    print_r($_POST);

    $email = $_POST['email'];
    $userID = $_POST['userID'];
    $name = $_POST['name'];
    $type = $_POST['ticket_type'];
    $title = $_POST['title'];
    $content = $_POST['ticket_content'];

    $query = 'INSERT INTO tickets (userID, email, customer_name, ticket_name, ticket_content) VALUES (:userID, :email, :customer_name, :ticket_name, :ticket_content)';
    $stmt = $connect -> prepare($query);
    $stmt -> bindParam(':userID', $userID);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':customer_name', $name);
    $stmt -> bindParam(':ticket_name', $title);
    $stmt -> bindParam(':ticket_content', $content);
    $stmt -> execute();

    if($type == "Complaint"){
        $last_ticketID = $connect -> lastInsertId();
        $update = "UPDATE tickets SET ticket_type = '2' WHERE :id = ticketID";
        $stmt = $connect -> prepare($update);
        $stmt -> bindParam(':id', $last_ticketID);
        $stmt -> execute();
    }

    $_SESSION['errMsg'] = 'Thank you for your ticket, you will get a response as soon as possible.';
	header('Location: ../index.php?page=helpdesk');

?>