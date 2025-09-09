<?php
    include_once("conn.php");

    $sql = "SELECT * FROM testfile"; 
    $result = mysqli_query($conn, $sql);

    // print_r(mysqli_fetch_all($result));die;
    
    if(mysqli_num_rows($result) > 0){
        $sn = 1;
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>".$sn++."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['lname']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['company']."</td>
                    <td>".$row['business_category']."</td>
                    <td>".$row['location']."</td>
                    <td>
                        <a class=view-btn data-id=".$row["id"]."><i class='text-warning bi bi-eye' ></i></a>
                        <a class=update-btn data-id=".$row["id"]. "><i class='bi bi-pencil-square'></i></a>
                        <a class=delete-btn data-id=".$row["id"] ."><i class='text-danger bi bi-trash-fill'></i></a>
                    </td>
                </tr>";  
            }
    } else {
        echo "<tr><td colspan='6' class='text-center'>No Records Found</td></tr>";
    }
?>