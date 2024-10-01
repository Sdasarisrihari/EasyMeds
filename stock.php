<!-- This disaplyas all the particualr suppliers stock so thatg he can have a track on the stocks and fill up if required. -->
<?php 
require 'dbconfig/config.php';
$uid = $_GET['a'];
?>

<script type="text/javascript">
    visible = 1; //var that keeps track of which table is visible (1 or 2)
    function change_table() {
        t1 = document.getElementById("stock1");
        t2 = document.getElementById("stock2");
        if(visible == 1) {
            visible = 2;
            t1.style.display = 'none';
            t2.style.display = 'block';
        } 
        else {
            visible = 1;
            t1.style.display = 'block';
            t2.style.display = 'none';
        }
    }
</script>

<!DOCTYPE html>
<html lang="en">


<!-- add-employee24:07-->
<head>
    
    <meta charset="utf-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
    
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

<div class="main-wrapper">
       
        <div class="header">
      
     <div class="header-left">
        <a href="dashboard.php" class="logo">
          <img src="assets/img/logo.jpeg" width="35" height="35" alt=""> <span>Easy Meds</span>
        </a>
      </div>
    
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

                    <div class="col-sm-4 col-3">

                        <h4 class="page-title">Pharmacy Stock</h4>

                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20">
                    
                    <a href="add-stock.php?a=<?php echo $uid ?>" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Stock</a>
                
                </div>

<!--                 <div class="col-sm-12 col-9 text-right m-b-20">
                   
                    <a href="stock_history.php" class="btn btn-primary float-right btn-rounded">Stock History</a>
                
                </div> -->
                    
                </div>
                
                <form action="" method="POST">
                
                <div class="row filter-row">
                
                <div class="col-sm-6 col-md-3">
                
                    <div class="form-group form-focus">
                
                        <label class="focus-label">Manufacturer Name</label>
                
                        <input type="text" class="form-control floating" name = "manf_name">
                
                    </div>
                
                </div>
                
                <div class="col-sm-6 col-md-3">
                
                    <div class="form-group form-focus">
                
                        <label class="focus-label">Medicine Name</label>
                
                        <input type="text" class="form-control floating" name = "medicine_name">
                
                    </div>
                
                </div>
                
                <div class="col-sm-6 col-md-3">
                
                    <div class="form-group form-focus select-focus">
                
                        <label class="focus-label">Filter Type</label>
                
                        <select class="select floating" name = "filter_type">
                            <option>Manufacturer Name</option>
                            <option>Medicine Name</option>
                        </select>
                
                    </div>
                
                </div>
                
                <div class="col-sm-6 col-md-3">
                
                    <button class="btn btn-success btn-block" name="search">SEARCH</button>
                
                </div>
            
            </div>
            
            </form>
            
                <div class="row">

                    <div class="col-md-12">

						<div class="table-responsive">

                            <table class="table table-striped custom-table" id="stock1">

                                <thead>

                                    <tr>
                                        <th style="min-width:100px;">Medicine Name</th>
                                        <th style="min-width: 100px;">Manufacturer Name</th>
                                        <th>Quantity</th>
                                        <th>Value(Each)</th>
                                        <th>Expiry Date</th>
                                    </tr>

                                </thead>

                                <tbody>

                                <?php 

                                $query = "SELECT * FROM stock where uid = '$uid'";
                                $query_run = mysqli_query($con,$query);
                                $count = 0;
                                while ($row = mysqli_fetch_array($query_run)){
                                    $r_medicineName = $row['medicine_name'];
                                    $r_quantity = $row['stock_quantity'];
                                    $r_value = $row['value'];
                                    $r_manufacturerName = $row['manufacturer_name'];
                                    $r_expiryDate = $row['date_of_expiry'];
                                    $count = $count + 1;
                                    ?>

                                    <tr>
                                        <td> <?php echo $r_medicineName; ?></td>
                                        <td> <?php echo $r_manufacturerName; ?></td>
                                        <td> <?php echo $r_quantity; ?></td>
                                        <td> <?php echo $r_value; ?></td>
                                        <td> <?php echo $r_expiryDate; ?></td>
                                    </tr>

                                    <?php } 
                                    if($count == 0){
                                        echo '<script type ="text/javascript"> alert("You do not have any stock.. Please go ahead and add few products......")</script>';
                                    }?>	
                                </tbody>
                            </table>

                            <?php 
                            if(isset($_POST['search'])){?>

                                <script type="text/javascript">change_table()</script>

                                <table class="table table-striped custom-table" id="stock2">

                                <thead>

                                    <tr>
                                        <th style="min-width:100px;">Medicine Name</th>
                                        <th style="min-width: 100px;">Manufacturer Name</th>
                                        <th>Quantity</th>
                                        <th>Value(Each)</th>
                                        <th>Expiry Date</th>
                                    </tr>

                                </thead>

                                <tbody>

                                <?php
                                    $manufacturer_name = $_POST['manf_name'];
                                    $medicine_name =$_POST['medicine_name'];
                                    $filter_type = $_POST['filter_type'];

                                    if ($filter_type == "Manufacturer Name"){
                                        $query = "SELECT * FROM stock where uid = '$uid' and manufacturer_name LIKE '%$manufacturer_name%';";
                                    }
                                    if ($filter_type == "Medicine Name"){
                                        $query = "SELECT * FROM stock where uid = '$uid' and medicine_name LIKE '%$medicine_name%';";
                                    }
                                    $query_run = mysqli_query($con,$query);


                                $count= 0;
                                while ($row = mysqli_fetch_array($query_run)){
                                    $r_medicineName = $row['medicine_name'];
                                    $r_quantity = $row['stock_quantity'];
                                    $r_value = $row['value'];
                                    $r_manufacturerName = $row['manufacturer_name'];
                                    $r_expiryDate = $row['date_of_expiry'];
                                    $count = $count + 1;
                                    ?>
                                    <tr>
                                        <td> <?php echo $r_medicineName; ?></td>
                                        <td> <?php echo $r_manufacturerName; ?></td>
                                        <td> <?php echo $r_quantity; ?></td>
                                        <td> <?php echo $r_value; ?></td>
                                        <td> <?php echo $r_expiryDate; ?></td>
                                    </tr>
                               <?php 
                                   }
                                    if($count == 0){
                                        echo '<script type ="text/javascript"> alert("You do not have any stock.. Please go ahead and add few products......")</script>';
                                    }
                                    } 
                                   ?>

                                </tbody>
                            </table>
						</div>

                    </div>

                </div>

            </div>
           
        </div>
    
    </div>
    
    <div class="sidebar-overlay" data-reff=""></div>
    
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	
    <script src="assets/js/popper.min.js"></script>
    
    <script src="assets/js/bootstrap.min.js"></script>
    
    <script src="assets/js/jquery.dataTables.min.js"></script>
    
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    
    <script src="assets/js/jquery.slimscroll.js"></script>
    
    <script src="assets/js/select2.min.js"></script>
    
    <script src="assets/js/moment.min.js"></script>
    
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    
    <script src="assets/js/app.js"></script>
</body>


<!-- employees23:22-->
</html>