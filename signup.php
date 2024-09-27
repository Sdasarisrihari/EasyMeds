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
	<script>
	function checkPassword(form) { 
                password = form.password.value; 
                c_password = form.c_password.value; 
  
               
                      
                // If Not same return False.     
                if (password != c_password) { 
                    alert ("\nPassword did not match: Please try again") 
                    return false; 
                } 
  
                // If same return True. 
                else{ 
                    //alert("Password Match: Welcome to Reverb!") 
                    return true; 
                } 
            } 

</script>
    <!--[if lt IE 9]>

    <script src="assets/js/html5shiv.min.js"></script>

    <script src="assets/js/respond.min.js"></script>

  <![endif]-->

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

                <div class="row">

                    <div class="col-lg-8 offset-lg-3">

                        <h4 class="page-title">Sign UP</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8">

                        <form action="" method="POST" onSubmit = "return checkPassword(this)" >

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Full Name<span class="text-danger">*</span></label>

                                        <input class="form-control" pattern="[D]{1}[r]{1}[ ]{1}+" type="text" name="full_name" required>

                                    </div>

                                </div>
								 <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Email <span class="text-danger">*</span></label>

                                        <input class="form-control" type="Email" name="email" required>

                                    </div>

                                </div>
								
								<div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Username <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="user_name" required>

                                    </div>

                                </div>
								<div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Password <span class="text-danger">*</span></label>

                                        <input class="form-control" type="password" name="password" required>

                                    </div>

                                </div>
								<div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Confirm Password <span class="text-danger">*</span></label>

                                        <input class="form-control" type="password" name="c_password" required>

                                    </div>

                                </div>

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Gender</label>

                                        <select class="select" name="gender" >

                                            

                                            <option>Male</option>

                                            <option>Female</option>

                                            <option>Others</option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Phone Number <span class="text-danger">*</span></label>

                                        <input class="form-control" pattern="[1-9]{1}[0-9]{9}" title="Please enter 10 digits" type="text" name="phone" required>

                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Role</label>

                                        <select class="select" name="role" >

                                            <option>Customer</option>

                                            <option>Supplier</option>
                                        </select>
                                    </div>

                                </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">

                                            <label>Address <span class="text-danger">*</span></label>

                                            <textarea class="form-control" type="text" name="address" ></textarea><br>

                                        </div>

                                    </div>
								
							    </div>
                                <div class="m-t-20 text-center">

                                    <button class="btn btn-primary submit-btn" name="sign_up">Sign Up</button>

                                </div>
                                
                                <div class="m-t-20 text-center">
                                    <a href="login.php">Already have an Account? Sign In</a>
                                </div>

                            </div>
                        </form>

                        <?php

                        if(isset($_POST['sign_up'])){

                            $user_id ="U-";
                            $full_name = $_POST['full_name'];
                            $email = $_POST['email'];
                            $user_name = $_POST['user_name'];
							$password = $_POST['password'];
							$confirm_password = $_POST['c_password'];
                            $gender = $_POST['gender'];
                            $phone = $_POST['phone'];
                            $role = $_POST['role'];
                            $address = $_POST['address'];

                            $table_name = "login";

                            $query = "SELECT COUNT(*) FROM login";
                            $result = mysqli_query($con,$query);
                            while ($res=mysqli_fetch_array($result)) {
                                $count = $res[0];
                            }
                            $user_id = $user_id.$count;

							$sql_u = "SELECT * FROM" .$table_name. "WHERE uname='$user_name'";
							$res_u = mysqli_query($con,$sql_u);
                            if ($res_u){
                                if (mysqli_num_rows($res_u) > 0) {
                                $name_error = "Username ".$user_name." is already taken";   
                                echo '<script type ="text/javascript"> alert("Sorry.... : '.$name_error.'")</script>';
                                }
                            }
							else{
                            $query = "INSERT into ".$table_name." values ('$user_id','$user_name','$password','$full_name','$role','$email','$phone','$address','$gender');";

                            $query_run = mysqli_query($con,$query);


                            if($query_run){
                                echo '<script type ="text/javascript"> alert("Successful created account with User Name: '.$user_name.'")</script>';
                            }
                            else{
                                echo '<script type ="text/javascript"> alert("Error creating in your account. Please try later!")</script>';
                            }

                            }

                        }

                        ?>  

                    </div>

                </div>

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
