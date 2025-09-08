<?php
    include_once("conn.php");

    if(isset($_POST["id"])){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $company = $_POST["company"];
        $business = $_POST["business"];
        $location = $_POST["location"]; 
    

        $sql = "UPDATE testfile SET name='$name', lname='$lname',email='$email', phone='$phone',company='$company',business_category='$business',location='$location' WHERE id= '$id'"; 
        // print_r($sql);
        // die;

        $result = mysqli_query($conn, $sql);
        if($result){
            echo json_encode(["success" => "record updated successfully"]);
            // echo "data inserted successfully";
        } else{
            echo json_encode(["Error" => "Err".mysqli_error($conn)]);
            // echo "Err". mysqli_err($result);
        }
    }    
?>

