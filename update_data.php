<?php 

    include './db_connect.php';

    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['up_id'];
    $name = $data['up_name'];
    $email = $data['up_email'];
    $password = $data['up_password'];

    $sql = "UPDATE users SET name='$name', email='$email', password='$password' WHERE id=$id";

    if($conn->query($sql) === TRUE){
        echo json_encode(['status' => 200, 'message' => 'Data Updated Successfully']);
    }
    else {
        echo json_encode(['status' => 400, 'message' => 'There has been an error updating the record please contact administrator']);
    }
?>