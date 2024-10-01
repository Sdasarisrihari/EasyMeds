<!-- This is the firs tpage which user see where they enter there details or they can signup if they are first user. On succes of details they are taken to respective page depending on the role.-->
<?php

require 'dbconfig/config.php';

?>

<!DOCTYPE html>

<html lang="en">





<!-- add-employee24:07-->

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpeg">

    <title>Easy Meds</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>


<body>
<div class="main-wrapper">

        <div class="header">
          <div class="header-left">
            <a href="#" class="logo">
              <img src="assets/img/logo.jpeg" width="35" height="35" alt=""> <span>Easy Meds</span>
            </a>
          </div>
        </div>
            
</div>


<div class="page-wrapper">
  <div class="content">
    <form action="" method="POST">
      <div class="col-lg-8 offset-lg-2">
        <h4 class="page-title">Sign In</h4>
      </div>
      <div class="col-sm-5">
        <div class="form-group">
          <input class="form-control" type="text" name="user_name" required, placeholder="User name">
        </div>
      </div>
      <div class="col-sm-5">
        <div class="form-group">
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
      </div>
      <div class="col-sm-8 offset-lg-1">
        <div class="form-group">
          <button class="btn btn-primary submit-btn" name="sign_in">Sign In</button>
        </div>
      </div>
      <div class="col-sm-8 offset-lg-1">
        <a href="signup.php">Create a new Account? Sign Up</a> 
      </div>
    </form>
    <?php 
      if(isset($_POST['sign_in'])){
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $sql_u = "SELECT count(*) FROM login WHERE uname='$user_name'";
        $res_u = mysqli_query($con,$sql_u);
        $count = 0;
        if ($res_u) {
          while ($res=mysqli_fetch_array($res_u)) {
            $count = $res[0];
          }
        }
        if ($count > 0) {
          $query= "SELECT * FROM login WHERE uname='$user_name'";
          $result = mysqli_query($con,$query);
          if ($result){
            while ($res=mysqli_fetch_array($result)) {
              $orginal_password = $res['password'];
              $uid = $res['uid'];
              $role = $res['role'];
            }
            if ($orginal_password != $password){
              echo '<script type ="text/javascript"> alert("Please check the password ....")</script>';
            }
            else {
              echo '<script type ="text/javascript"> alert("Login Successful")</script>';
              if ($role == 'Supplier') {
                echo "<script>location.href='stock.php?a=$uid'</script>";
              }
              else {
                echo "<script>location.href='buy_products.php?a=$uid'</script>";
              }
            }
          }
        }
        else {
          echo '<script type ="text/javascript"> alert("Please check the User Name: '.$user_name.'")</script>';
        }
      }
    ?>
  </div>

</div>

    <div class="sidebar-overlay" data-reff=""></div>

    <script src="assets/js/jquery-3.2.1.min.js"></script>

  <script src="assets/js/popper.min.js"></script>

    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/jquery.slimscroll.js"></script>

    <script src="assets/js/select2.min.js"></script>

    <script src="assets/js/app.js"></script>

  <script src="assets/js/moment.min.js"></script>

  <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

  

</body>





<!-- add-employee24:07-->

</html>
