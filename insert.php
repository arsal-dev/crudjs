<?php 
    include './db_connect.php';
    $data = json_decode(file_get_contents('php://input'), true);

    // print_r(json_encode($data));

    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];

    $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ( '$name', '$email', '$password')";

    $conn->query($sql);

    echo json_encode(['status' => 200, 'message' => 'DATA SAVED!']);
?>