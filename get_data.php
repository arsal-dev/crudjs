<?php 
    include './db_connect.php';

    $sql = "SELECT * FROM users";

    $result = $conn->query($sql);


    $arr = [];
    while($row = $result->fetch_assoc()){
        array_push($arr, $row);
    }

    echo json_encode(['code' => 200, 'message' => $arr]);
?>