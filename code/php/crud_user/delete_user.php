<?php

require '../../../Private/config.php';

$ID = $_POST['ID'];

$get_customerID = 'SELECT * FROM user_customer WHERE userID = :userID';
$stmt = $connect -> prepare($get_customerID);
$stmt -> bindParam(':userID', $ID);
$stmt -> execute();
$data = $stmt -> fetch(PDO::FETCH_ASSOC);

$delete_customer_data = 'DELETE FROM customers WHERE customerID = :customerID';
$stmt = $connect -> prepare($delete_customer_data);
$stmt -> bindParam(':customerID', $data['customerID']);
$stmt -> execute();

$delete_user = 'DELETE FROM users WHERE userID = :userID';
$stmt = $connect -> prepare($delete_user);
$stmt -> bindParam(':userID', $ID);
$stmt -> execute();

header('location:../../index.php?page=admin_dashboard');

?>