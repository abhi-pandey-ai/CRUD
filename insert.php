<?php
    include_once("conn.php");
    // print_r(POST);
    $Name = $_POST["name"];
    $Lname = $_POST["lname"];
    $Email = $_POST["email"];
    $Phone = $_POST["phone"];
    $Company = $_POST["company"];
    $BusinessCategory = $_POST["businessCategory"];
    $Location = $_POST["location"];

    $query = "INSERT INTO `testfile` (`Name`, `Lname`, `Email`, `Phone`, `Company`, `BusinessCategory`, `Location`) VALUES ('$Name', '$Lname', '$Email', '$Phone', '$Company', '$BusinessCategory', '$Location')";

    $data = mysqli_query($conn,$query);
    if($data){
        echo "data inserted successfully";
    }else{
    echo "Err:" . mysqli_error($conn);
    }
?>