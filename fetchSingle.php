<?php
include_once("conn.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "SELECT * FROM testfile WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Record not found"]);
    }
}
?>
