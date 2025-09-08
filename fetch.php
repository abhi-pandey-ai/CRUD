<?php
    include_once("conn.php");

    $sql = "SELECT * FROM testfile"; 
    $result = mysqli_query($conn, $sql);

    // print_r(mysqli_fetch_all($result));die;
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['lname']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['company']."</td>
                    <td>".$row['business_category']."</td>
                    <td>".$row['location']."</td>
                    <td>
                        <a class=update-btn data-id=".$row["id"]. ">update</a>
                        <a class=delete-btn data-id=".$row["id"] .">delete</a>
                    </td>
                </tr>";  
            }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No Records Found</td></tr>";
    }
?>