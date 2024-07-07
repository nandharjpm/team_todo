<?php

include 'database/config.php';

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;

    if ($username === "admin" && $password === "admin") {
        header("Location: admin/adduser.php");
        exit();
    } else {
        try {
            $sql = $conn->prepare("SELECT * FROM useradd WHERE Emp_username = :username");
            $sql->bindParam(':username', $username);
            $sql->execute();
            $user = $sql->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['Emp_Password'])) {
                header("Location: users/viewuser.php");
                exit();
            } else {
                echo "Invalid Username and Password";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "Username and Password are required.";
}
?>
