<?php 

    include './db_connect.php';
    $id = json_decode(file_get_contents('php://input'), true);

    $sql = "DELETE FROM users WHERE id = '$id'";
    $conn->query($sql);

    echo json_encode(['code' => 200, 'message' => 'Data DELETED']);
?>