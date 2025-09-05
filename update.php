<?php
include_once("conn.php");
?>
<script>
$.ajax({
    url:"insert.php",
    type: "GET",
    data:{
        name : name,
        lname : lname,
        email : email,
        phone : phone,
        company : company,
        businessCategory : businessCategory,
        location : location
    },

});
</script>
