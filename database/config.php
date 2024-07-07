<?php

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "todosamp";


try{
    $conn = new PDO("mysql:host=$localhost;dbname=$dbname",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    header("dbadduser.php");
}catch(PDOException $e){
    echo "Error : ".$e->getMessage();
}

