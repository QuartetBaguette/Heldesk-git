<?php

require '../../../Private/config.php';
session_start();

$ID = $_POST['userID'];
$customerID = $_POST['customerID'];

$update = 'UPDATE users SET email = :email, FK_role = :role WHERE  userID = :ID';
$stmt = $connect -> prepare($update);
$stmt -> bindParam(':ID', $ID);
$stmt -> bindParam(':email', $_POST['email']);
$stmt -> bindParam(':role', $_POST['role']);
$stmt -> execute();

$update_phonenumber = 'UPDATE customers SET phonenumber = :phonenumber WHERE  customerID = :ID';
$stmt = $connect -> prepare($update_phonenumber);
$stmt -> bindParam(':ID', $customerID);
$stmt -> bindParam(':phonenumber', $_POST['phonenumber']);
$stmt -> execute();

header('location:../../index.php?page=admin_dashboard&part=crud_users');

?>