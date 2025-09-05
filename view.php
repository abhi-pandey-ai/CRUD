<?php
include_once("conn.php");
include_once("header.php");
include_once("sidebar.php");
?>

<div class="container" style="margin-top:2%">
<table class="table table-striped table-hover"  >
  <thead>
    <tr>
      <th>column</th>
      <th>Name</th>
      <th>Lname</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Company</th>
      <th>Business</th>
      <th>Location</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM testfile";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        $sn = 1; 
        $total = mysqli_fetch_all($result,MYSQLI_ASSOC);
       foreach($total as $row){
    ?>
    <tr>
        <td><?php echo $sn++; ?></td>
        <td><?php echo $row["Name"]; ?></td>
        <td><?php echo $row["Lname"]; ?></td>
        <td><?php echo $row["Email"]; ?></td>
        <td><?php echo $row["Phone"]; ?></td>
        <td><?php echo $row["Company"]; ?></td>
        <td><?php echo $row["BusinessCategory"]; ?></td>
        <td><?php echo $row["Location"]; ?></td>
        <td>
            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a> 
            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure delete this record');"><i class="bi bi-trash-fill"></i></a>
        </td>
    </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='9' class='text-center'>No records found</td></tr>";
    }
    ?>
  </tbody>
</table>
</div>


<?php
include_once("footer.php");
?>
