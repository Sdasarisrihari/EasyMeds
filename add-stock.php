<!-- This file is used to add stocks into the database by the supplier so that this data can be visible by the customer. The data is assigned with an unique id to identify each stock -->
<?php
require 'dbconfig/config.php';
$uid = $_GET['a'];
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
	
    <!--[if lt IE 9]>

    <script src="assets/js/html5shiv.min.js"></script>

    <script src="assets/js/respond.min.js"></script>

  <![endif]-->

</head>


<body>
<div class="main-wrapper">
        <div class="header">
      <div class="header-left">
        <a href="dashboard.php" class="logo">
          <img src="assets/img/logo.jpeg" width="35" height="35" alt=""> <span>Easy Meds</span>
        </a>
      </div>
              <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li>
                            <a href="stock.php?a=<?php echo $uid ?>"><i class="fa fa-dashboard"></i> <span>Stock History</span></a>
                        </li>
                        <li>
                            <a href="add-stock.php?a=<?php echo $uid ?>"><i class="fa fa-cube"></i> <span>Add Stocks</span></a>
                        </li>
                        <li>
                            <a href="orders.php?a=<?php echo $uid ?>"><i class="fa fa-hospital-o"></i> <span>Orders</span></a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

    <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <h4 class="page-title">Add Medicine</h4>

                    </div>

                </div>

                <div class="row">

                    <div class="col-lg-8 offset-lg-2">

                        <form action="" method="POST" >

                            <div class="row">

                                <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Medicine Name <span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="product_name" required>

                                    </div>

                                </div>
								 <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Manufacturer Name<span class="text-danger">*</span></label>

                                        <input class="form-control" type="text" name="supplier_name" required>

                                    </div>

                                </div>
								
								<div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Available Quantity<span class="text-danger">*</span></label>

                                        <input class="form-control" type="Number" name="stock_quantity" required>

                                    </div>

                                </div>
								<div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Value(Each)<span class="text-danger">*</span></label>

                                        <input class="form-control" type="Number" name="value" required>

                                    </div>

                                </div>
                                 <div class="col-sm-6">

                                    <div class="form-group">

                                        <label>Expiry Date<span class="text-danger">*</span></label>

                                        <div class="cal-icon">

                                            <input class="form-control datetimepicker" type="text" name="date_of_expiry" required>

                                        </div>

                                    </div>

                                </div>
                            <div class="col-sm-8 offset-lg-1">

                                <button class="btn btn-primary submit-btn" name="add_stock">Add Stock</button>

                            </div>
							
                        </form>

                        <?php

                        if(isset($_POST['add_stock'])){
                            $stock_id ="S-";
                            $medicine_name = $_POST['product_name'];
							$manufacturer_name = $_POST['supplier_name'];
                            $date_of_expiry = $_POST['date_of_expiry'];
							$stock_quantity = $_POST['stock_quantity'];
                            $value = $_POST['value'];
                            $table_name = "stock";
                            $query = "SELECT COUNT(*) FROM ".$table_name."";
                            $result = mysqli_query($con,$query);
                            while ($res=mysqli_fetch_array($result)) {
                                $count = $res[0];
                            }
                            $stock_id = $stock_id.$count;
                            $query = "INSERT INTO  `stock` VALUES ('$stock_id', '$uid','$medicine_name','$manufacturer_name','$stock_quantity','$value','$date_of_expiry');";
                            $query_run = mysqli_query($con,$query);
                            if($query_run){
                                echo '<script type ="text/javascript"> alert("Successful entered Stock with Stock ID: '.$stock_id.'")</script>';
                                echo "<script>location.href='stock.php?a=$uid'</script>";
                            }
                            else{
                                echo '<script type ="text/javascript"> alert("Error adding the data '.mysqli_error($con).'")</script>';
                            }

                        }

                        ?>  

                    </div>

                </div>

            </div>

    <!--Paste code here-->

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

