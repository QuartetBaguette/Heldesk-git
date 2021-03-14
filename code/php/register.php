<?php
    require '../../private/config.php';
    session_start();
	if(isset($_POST['register'])) {

        if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
            //zet alle session messages op nul
            unset($_SESSION['dangerMsg']);
            unset($_SESSION['errMsg']);
        }

        //alle dingen tag strippen voor veiligheid
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $reppassword = strip_tags($_POST['reppassword']);
        $name = strip_tags($_POST['name']);
        $adress = strip_tags($_POST['adress']);
        $postalcode = strip_tags($_POST['postalcode']);
        $phonenumber = strip_tags($_POST['phonenumber']);
        $city = strip_tags($_POST['city']);
        $role = "1";

if($email == "" || $password == "" || $reppassword == "" || $name == "" || $adress == "" || $postalcode == "" || $phonenumber == "" || $city == ""){
    $_SESSION['dangerMsg'] = "Please fill in all fields.";
		header('Location: ../index.php?page=register');

}
else{
	//kijken of het wel een juiste email format is
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  $_SESSION['errEmail'] = "Invalid email format*";
		header('Location: ../index.php?page=register');
    }
}

if($password != $reppassword){
    $_SESSION['dangerMsg'] = "Your passwords don't match.";
		header('Location: ../index.php?page=register');
}

    else{

        if(empty($_SESSION['errMsg']) && empty($_SESSION['dangerMsg'])){
            //put the info into database
            $hash_password = password_hash($password, PASSWORD_DEFAULT);


            $query = 'INSERT INTO users (email, password, FK_role) VALUES (:email, :password, :role)';
            $stmt = $connect -> prepare($query);
            $stmt -> bindParam(':email', $email);
            $stmt -> bindParam(':password', $hash_password);
            $stmt -> bindParam(':role', $role);
            $stmt -> execute();

            $lastusrID = $connect -> lastInsertId();

            $query2 = 'INSERT INTO customers (name, adress, postalcode, phonenumber, FK_city) VALUES (:name, :adress, :postalcode, :phonenumber, :city)';
            $stmt2 = $connect -> prepare($query2);
            $stmt2 -> bindParam(':name', $name);
            $stmt2 -> bindParam(':adress', $adress);
            $stmt2 -> bindParam(':postalcode', $postalcode);
            $stmt2 -> bindParam(':phonenumber', $phonenumber);
            $stmt2 -> bindParam(':city', $city);
            $stmt2 -> execute();

            $lastcstmrID = $connect -> lastInsertID();

            $query3 = 'INSERT INTO user_customer (userID, customerID) VALUES (:lastusrID, :lastcstmrID)';
            $stmt3 = $connect -> prepare($query3);
            $stmt3 -> bindParam(':lastusrID', $lastusrID);
            $stmt3 -> bindParam(':lastcstmrID', $lastcstmrID);
            $stmt3 -> execute();


            $_SESSION['errMsg'] = 'Registered Succesfully! You can now login.</a>';
            header('Location: ../index.php?page=register');
        }
    }
}
?>
