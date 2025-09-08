<?php
    include_once("conn.php");
   
    $Name = $_POST["name"];
    $Lname = $_POST["lname"];
    $Email = $_POST["email"];
    $Phone = $_POST["phone"];
    $Company = $_POST["company"];
    $BusinessCategory = $_POST["businessCategory"];
    $Location = $_POST["location"];

    $query = "INSERT INTO `testfile` (`name`, `lname`, `email`, `phone`, `company`, `business_category`, `location`) VALUES ('$Name', '$Lname', '$Email', '$Phone', '$Company', '$BusinessCategory', '$Location')";
    //  print_r($query);
    // die;

    $data = mysqli_query($conn,$query);
    if($data){
        echo "data inserted successfully";
    }else{
    echo "Err:" . mysqli_error($conn);
    }
?>