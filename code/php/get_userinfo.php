<?php

    if(isset($_SESSION['edituser'])){
        $userID = $_POST['ID'];

        $query = 'SELECT * FROM users JOIN roles ON users.FK_role = roles.roleID WHERE userID = :ID';
        $stmt = $connect -> prepare($query);
        $stmt -> bindParam(':ID', $userID);
        $stmt -> execute();
        $data = $stmt -> fetch(PDO::FETCH_ASSOC);

        $get_customerID = 'SELECT * FROM user_customer WHERE userID = :userID';
        $stmt2 = $connect -> prepare($get_customerID);
        $stmt2 -> bindParam(':userID', $userID);
        $stmt2 -> execute();
        $customerID = $stmt2 -> fetch(PDO::FETCH_ASSOC);

        $phonenumber = 'SELECT phonenumber FROM customers WHERE customerID = :customerID';
        $stmt3 = $connect -> prepare($phonenumber);
        $stmt3 -> bindParam(':customerID', $customerID['customerID']);
        $stmt3 -> execute();
        $phonenumber = $stmt3 -> fetch(PDO::FETCH_ASSOC);

        $roles = 'SELECT * FROM roles';
        $stmt = $connect -> prepare($roles);
        $stmt -> execute();
        $roles = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

    else{
        require '../../../Private/config.php';
        $query = 'SELECT * FROM users JOIN roles ON users.FK_role = roles.roleID ORDER BY FK_role DESC';
        $stmt = $connect -> prepare($query);
        $stmt -> execute();
        $data = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    }

?>