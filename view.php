<?php
  include_once("conn.php");
  include_once("header.php");
  include_once("sidebar.php");
?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account Form</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>  
  </head>
  
  <body>
    <div class="container" style="margin-top:2%">
    <table  class="table table-striped table-hover" >
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
      <tbody id="tbody">

      </tbody>
    </table>
    </div>
  
  <!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="title">Update Record</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
          <input type="hidden" id="update-id" name="id">

          <div class="mb-3">
            <label>Name</label>
            <input type="text" id="update-name" name="name" class="form-control">
          </div>

          <div class="mb-3">
            <label>Last Name</label>
            <input type="text" id="update-lname" name="lname" class="form-control">
          </div>

          <div class="mb-3">
            <label>Email</label>
            <input type="email" id="update-email" name="email" class="form-control">
          </div>

          <div class="mb-3">
            <label>Phone</label>
            <input type="text" id="update-phone" name="phone" class="form-control">
          </div>

          <div class="mb-3">
            <label>Company</label>
            <input type="text" id="update-company" name="company" class="form-control">
          </div>

          <div class="mb-3">
            <label>Business</label>
            <input type="text" id="update-business" name="business" class="form-control">
          </div>

          <div class="mb-3">
            <label>Location</label>
            <input type="text" id="update-location" name="location" class="form-control">
          </div>

          <button type="submit" id="Modal-button"  class="btn btn-success update ">Save Changes</button>
      </div>
    </div>
  </div>
</div>
    <script>
      $(document).ready(function(){
          $.ajax({
              url: "fetch.php",
              type: "POST",
              data: {},
              success: function(data){
                $("#tbody").html(data);
              }
          });
      });
        
      // deleting part 
      $(document).on("click", ".delete-btn", function () {
        var id = $(this).data ("id");
        if(confirm("Are you sure you want to delete record?")){

          $.ajax({
            url: "delete.php",
            type: "POST",
            data: {id : id},
            success: function(deleteMsg){
              alert("record delete success fully");
              window.location.reload();
            },
            error :   function (){
              alert("Error deleting record"); 
            }
          });
        }   
      });

      // updating part
      $(document).on("click", ".update-btn", function(){
        var id = $(this).data ("id");
        $.ajax({
          url : "fetchSingle.php",
          type : "POST",
          data : {id : id},
          dataType : "json",
          success: function(data) {
            //  let data = JSON.parse(responce);
            // console.log(data);
            if(data.error){
              alert(data.error)
            } else{
              $("#update-id") .val(data.id);
              $("#update-name").val(data.name);
              $("#update-lname").val(data.lname);
              $("#update-email").val(data.email);
              $("#update-phone").val(data.phone);
              $("#update-company").val(data.company);
              $("#update-business").val(data.business_category);
              $("#update-location").val(data.location);
              $('.update').attr('data-id', data.id);
              $("#updateModal").modal("show");
            }
          }
        });
      });

      // submiting modal kaa part 
      $(document).on("click", ".update", function(){
        var id = $(this).data ("id");
        var name = $("#update-name").val();
        var lname = $("#update-lname").val();
        var email = $("#update-email").val();
        var phone = $("#update-phone").val();
        var company = $("#update-company").val();
        var business = $("#update-business").val();
        var location = $("#update-location").val();

        $.ajax({
          url : "update.php",
          type :"POST",
          data : {
              id : id,
              name : name,
              lname : lname,
              email : email,
              phone : phone,
              company : company,
              business : business,
              location : location
          },
          dataType : "json",
          success: function(response) {
            console.log(response.success);
            // console.log(success);
            if(response.success === "record updated successfully"){
              $("#updateModal").modal("hide");
                alert("data updated successfuly");
                window.location.reload();
            }
          }
        });
      });
      // view data part 
      $(document).on("click", ".view-btn",function(){
        var id = $(this).data ("id");
        $.ajax({
          url : "fetchSingle.php",
          type : "POST",
          data : {id : id} ,
          dataType : "json",
          success : function(data){
            $("#update-name").val(data.name);
            $("#update-lname").val(data.lname);
            $("#update-email").val(data.email);
            $("#update-phone").val(data.phone);
            $("#update-business").val(data.business_category);
            $("#update-company").val(data.company);
            $("#update-location").val(data.location);
            $("#updateModal").modal("show");
            $("#title").text("User Data");
            $("#Modal-button").remove();


            
            

          }

        })
      });

    </script>

      <?php
        include_once("footer.php");
      ?>
  </body>
</html>
