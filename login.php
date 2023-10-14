<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>

    <title>Regestration Form</title>
    <?php include 'Links/links.php'?>
</head>
<body>

<?php
include 'dbcon.php';

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $emailSearch = "SELECT * FROM regestration WHERE email = '$email' ";
    $query = mysqli_query($con, $emailSearch);

    
//   echo $emailSearch . "<br>";
//   echo $query ."<br>";

    $emailCount = mysqli_num_rows($query);
// echo $emailCount;
    if($emailCount > 0) {
        $pass = mysqli_fetch_assoc($query);
        $dbPass = $pass['password'];
        $_SESSION['name'] = $pass['name'];
        $passDecode = password_verify($password, $dbPass);

        if($passDecode) {
            ?>
            <script>
                alert("Login Successfully");
              
                location.replace("home.php");
            </script>
            <?php
            
        } else {
            ?>
            <script>
                alert("Password Not Matching");
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Invalid Email. Please Sign Up First");
        </script>
        <?php
    }
}

mysqli_close($con);
?>


<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>

                <form class="mx-1 mx-md-4" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">



                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" required name="email"/>
                      <label class="form-label" for="form3Example3c" >Your Email</label>
                    </div>
                  </div>

                 

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fa fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" required name="password"/>
                      <label class="form-label" for="form3Example4c" >Password</label>
                    </div>
                  </div>


                  <div class="form-check d-flex justify-content-center mb-5">
                    
                    <label class="form-check-label" for="form2Example3">
                      Does Not Have an account?<a href="regestration.php">Sign Up</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Log In</button>
                  </div>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="images/draw1.webp"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>