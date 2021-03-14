<?php 
session_start();  


require '../../private/config.php';  

if(isset($_SESSION['dangerMsg']) || isset($_SESSION['errMsg'])){
    //zet alle session messages op nul
    unset($_SESSION['dangerMsg']);
    unset($_SESSION['errMsg']);
}

$password = $_POST['password']; 
$email = $_POST['email'];  

$query = 'SELECT * FROM users WHERE email = :email'; 
$sth = $connect->prepare($query); 
$sth->bindParam('email', $email); 
$sth->execute(); 
$data = $sth->fetch(PDO::FETCH_ASSOC);

$get_customerID = 'SELECT customerID FROM user_customer WHERE :id = userID';
$stmt = $connect -> prepare($get_customerID);
$stmt -> bindParam(':id', $data['userID']);
$stmt -> execute();
$customerID = $stmt -> fetch(PDO::FETCH_ASSOC);

$get_name = 'SELECT name FROM customers WHERE :id = customerID';
$stmt2 = $connect -> prepare($get_name);
$stmt2 -> bindParam(':id', $customerID['customerID']);
$stmt2 -> execute();
$customer_name = $stmt2 -> fetch(PDO::FETCH_ASSOC);

if($data == false){
    $_SESSION['dangerMsg'] = "⚠️Email or password is incorrect.⚠️";
    header('Location: ../index.php?page=login');
}

    if (password_verify($password, $data['password'])) {

            $_SESSION['ingelogd'] = true;     
            $_SESSION['email'] = $data['email'];
            $_SESSION['userID'] = $data['userID'];
            $_SESSION['roleID'] = $data['FK_role'];
            $_SESSION['customer_name'] = $customer_name;
            
        if ($data['FK_role'] == 1) {

            if(isset($_SESSION['ref'])){
                header('location:../index.php?page=helpdesk&part=ticket');
            }
            else{
                header('location:../index.php?page=home');
            }

        }

        else if ($data['FK_role'] == 2) {

            header('location:../index.php?page=helpdesk_dashboard');

        }

        else if($data['FK_role'] == 3){

            $_SESSION['adminacc'] = true;
            header('location:../index.php?page=home');

        }
    
    }

    else{
        $_SESSION['dangerMsg'] = "⚠️Email or password is incorrect.⚠️";
        header('Location: ../index.php?page=login');
    }

?>