<?php 
session_start();
if(!empty ($_SESSION["USER"])){
  header("Location: index");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include './include/inc/header.php' ?>
    <title>Login</title>
</head>
<body>
<div class="container">
<div class="container my-5 px-0 z-depth-1">

  <!--Section: Content-->
  <section class="p-5 my-md-5 text-center" 
    style="background-image: url(https://picsum.photos/2000/1000); background-size: cover; background-position: center center;">

    <form class="my-5 mx-md-5" action="" id="LoginForm">

      <div class="row">
        <div class="col-md-6 mx-auto">
          <!-- Material form login -->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <!-- Form -->
              <form class="text-center" style="color: #757575;" action="" id="LoginForm">

                <h3 class="font-weight-bold my-4 pb-2 text-center dark-grey-text">Log In</h3>

                <!-- Name -->
                <input type="text" id="USER" name="USER" class="form-control mb-4" placeholder="UserName">

                <!-- Email -->
                <input type="password" id="PASS" name="PASS" class="form-control" placeholder="Password">
                <small id="passwordHelpBlock" class="form-text text-right blue-text">
                  <a href="">Recover Password</a>
                </small>

                <div class="text-center">
                  <input type="submit" id="submitButton" class="btn btn-info waves-effect" value="Login"/>
                
                </div>

              </form>
              <!-- Form -->

            </div>

          </div>
          <!-- Material form login -->
        </div>
      </div>

    </form>

  </section>
  <!--Section: Content-->







  
</div>
</div>
<script>

$('#submitButton').click( function(e) {
  e.preventDefault();
    $.ajax({
        url: 'include/inc/_login.php',
        type: 'post',
        data: $('#LoginForm').serialize(),
        success: function(data) {
            if(data != "DONE"){
              // console.log(data);
              $.notify(data, "error");
            }else {
              // console.log(data);
                $("#submitButton").prop('disabled', true);
                $("#submitButton").html('<i class="fas fa-circle-notch fa-spin"></i>');

                window.location.href='index';
            }
        },
        error: function(err){
          console.log(err);
        }
    });
});


</script>
</body>
</html>

