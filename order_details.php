<?php 
require 'dbconfig/config.php';
$uid = $_GET['a'];
$billing_no = $_GET['b'];
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
                    <img src="assets/img/logo.jpeg" width="100" height="100" > 
                    <p><h3 class="heading"><strong>Easy Med</strong></br>
                    Address Saint Louis MO<br>
                    Mob: XXXXXXXXXX, XXXXXXXXXX</h3></p>
                </div> 
            <div class="col-sm-6 m-b-20">
                 <div class="invoice-details">
                    <h4 class="text-uppercase">Bill No: <?php echo $billing_no?></h4>                
                </div>
            </div>  
            <br>  
            <div class="row">
                <div class="col-md-12">
                    <h4><caption> Order Details</caption></h4>
                    <div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Stock Id</th>
                                    <th>Medicine Name</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                    
                                </tr>  
                            </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT stock_id, medicine_name, quantity, price,indiviual_cost from billing WHERE seller_uid = '$uid' and billing_no = '$billing_no'";
                                    $query_run = mysqli_query($con,$query);
                                    $count = 0;
                                    $total = 0;
                                    while ($row = mysqli_fetch_array($query_run)){
                                        $stock_id = $row['stock_id'];
                                        $medicine_name = $row['medicine_name'];
                                        $quantity = $row['quantity'];
                                        $price = $row['price'];
                                        $amount = $row['indiviual_cost'];
                                        $count = $count+1;
                                        $total = $total+$amount;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $stock_id ?></td>
                                        <td><?php echo $medicine_name; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $quantity*$price; ?></td>
                                    </tr>
                                <?php } ?>
                                </tbody> 
                                <tfoot>
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong><?php echo $total; ?></strong></td>
                                    </tr>
                                </tfoot>
                        </table>    
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