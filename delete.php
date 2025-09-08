<?php
include_once ("conn.php");
if(isset($_POST["id"])){
    $id = $_POST["id"]; 

    $query = "DELETE FROM testfile WHERE id= '$id'";
    $data = mysqli_query($conn,$query);
    if($data){
    echo "data delete successfully";
    } else{
        echo"Err".mysqli_err("$query"); 
    }
}
?>