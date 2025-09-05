<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Account Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
      body {
        background-color: #4B0082; 
        font-family: Arial, sans-serif;
      }

      .form-container {
        background-color: white;
        padding: 40px;
        border-radius: 15px;
        max-width: 700px;
        margin: 60px auto;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      }

      .form-title {
        text-align: center;
        margin-bottom: 30px;
        color: #4B0082;
      }

      .btn-register {
        background-color: #4B0082;
        border: none;
        width: 100%;
        padding: 10px;
      }

      .btn-register:hover {
        background-color: #360061;
      }

      span{
        color:red
      }
    </style>
  </head>
  <body>

    <div class="form-container">
      <h2 class="form-title">Create an account</h2>
      <h2 id="successMsg"> </h2>   
      
      <form method="POST">
        <div class="row mb-3">
          <div class="col">
            <label for="firstName" class="form-label">First Name *</label>
            <input type="text" class="form-control" maxlength="20" id="name" name="name" >
            <span id="nameErr"></span>
          </div>
          <div class="col">
            <label for="lastName" class="form-label">Last Name *</label>
            <input type="text" class="form-control" maxlength="15" id="lname" name="lname" >
            <span id="lnameErr"></span>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label for="email" class="form-label">Email Address *</label>
            <input type="text" class="form-control" maxlength="25" id="email" name="email" >
            <span id="emailErr"></span>
          </div>

          <div class="col">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" maxlength="12" id="phone" name="phone">
            <span id="phoneErr"></span>
          </div>
        </div>

        <div class="mb-3">
          <label for="company" class="form-label">Company Name</label>
          <input type="text" class="form-control" maxlength="30" id="company" name="company">
          <span id="companyErr"></span>
        </div>

        <div class="row mb-4">
          <div class="col">
            <label for="businessCategory" class="form-label">Business Category</label>
            <input type="text" class="form-control" maxlength="20" id="businessCategory" name="businessCategory">
            <span id="businessCategoryErr"></span>
          </div>

          <div class="col">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" maxlength="20" id="location" name="location">
            <span id="locationErr"></span>
          </div>
        </div>
        <div class="container" style="text-align: center;">
        <button type="submit" id="btn" class="btn btn-register text-white" style="width:200px; border-radius: 50px 20px;" >Register</button>
        </div>
        
      </form>
    </div>
    <script>
        $(document).ready(function(){
            $("#btn").click(function() {
                var name  = $("#name").val();
                var lname = $("#lname").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var company = $("#company").val();
                var businessCategory = $("#businessCategory").val();
                var location = $("#location").val();

                if(name == ""){
                    $("#nameErr").text("Enter your Name");
                    return false;
                } else{
                    $("#nameErr").text("");
                }

                if(lname == ""){
                    $("#lnameErr").text("Enter your Lastname");
                    return false;
                } else{
                    $("#lnameErr").text("");
                }

                if(email == ""){
                    $("#emailErr").text("Enter your valid Email");
                    return false;
                } else if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)){
                    $("#emailErr").text("Enter valid Email format");
                    return false;
                } else{
                    $("#emailErr").text("");
                }

                if(phone == ""){
                    $("#phoneErr").text("Enter phone Number");
                    return false;
                } else if(!/^[0-9()-]+$/.test(phone)){
                  $("#phoneErr").text("Enter valid Number");
                    return false;

                } else{
                    $("#phoneErr").text("");
                }

                if(company == ""){
                    $("#companyErr").text("Enter your company");
                    return false;
                } else{
                    $("#companyErr").text("");
                }

                if(businessCategory == ""){
                    $("#businessCategoryErr").text("Enter your businessCategory");
                    return false;
                } else{
                    $("#businessCategoryErr").text("");
                }

                if(location == ""){
                    $("#locationErr").text("Enter your current location");
                    return false;
                } else{
                    $("#locationErr").text("");
                }

                $.ajax({
                    url:"insert.php",
                    type: "POST",
                    data:{
                        name : name,
                        lname : lname,
                        email : email,
                        phone : phone,
                        company : company,
                        businessCategory : businessCategory,
                        location : location
                    },
                    success : function(data) {
                      console.log(data);
                        if(data == "data inserted successfully") {
                            console.log(data);
                            // alert(data);
                            $("#successMsg").text(data);
    
                            setTimeout(() => {
                                $("#successMsg").text("");
                            }, 3000);
                        } else {
                            $("#successMsg").text("Something went wrong");
    
                            setTimeout(() => {
                                $("#successMsg").text("");
                            }, 5000);
                          }
                          window.location.href = "view.php";
                    }
                });
                return true;

            });
        });

    </script>
  </body>
</html>
