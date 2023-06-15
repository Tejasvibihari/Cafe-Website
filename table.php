<?php

if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['date']) && isset($_POST['city']) && isset($_POST['state']) && isset($_POST['zip'])){
    include 'db_conn.php';

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    

    $firstname = validate($_POST['firstname']);
    $lastname = validate($_POST['lastname']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $date = validate($_POST['date']);
    $city = validate($_POST['city']);
    $state = validate($_POST['state']);
    $zip = validate($_POST['zip']);

    if (empty($zip) || empty($state) || empty($city) || empty($date) || empty($phone) || empty($email) || empty($lastname) || empty($firstname)){
        header('Location: tableregistration.html');
    }else{
        $sql = "INSERT INTO test(firstname, lastname, email, phone, date, city, state, zip) VALUES('$firstname','$lastname','$email','$phone','$date','$city','$state','$zip')";
        $res = mysqli_query($conn, $sql);

        if ($res){
            echo "Table Registration Sucessfully";
        }else {
            echo "Something Went Wrong";
        }
    }
}else {
    header("Location: tableregistration.html");
}