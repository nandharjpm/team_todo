<?php

include 'config.php';

if (isset($_POST['empname']) && isset($_POST['empusername']) && isset($_POST['empid']) && isset($_POST['emppassword'])) {
    $empname = $_POST['empname'];
    $empusername = $_POST['empusername'];
    $empid = $_POST['empid'];
    $emppassword = password_hash($_POST['emppassword'], PASSWORD_BCRYPT);

    $sql = $conn->prepare("insert into useradd(Emp_Name,Emp_ID,Emp_username,Emp_Password)values(?,?,?,?)");

    if ($sql->execute([$empname, $empid, $empusername, $emppassword])) {
        header("Location: ../admin/adduser.php");
    } else {
        echo "Error " . $sql->errorInfo();
    }
}else{
    echo "All fields are Required";
}
