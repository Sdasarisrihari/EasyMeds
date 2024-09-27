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
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="bill">
                                <thead>
                                    <tr>
                                        <th>Bill Number</th>
                                        <th>Billing date</th>
                                        <th>Amount</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 

                                $query = "SELECT SUM(indiviual_cost) AS value_sum,billing_no,date from billing WHERE seller_uid = '$uid' GROUP BY billing_no ";

                                $query_run = mysqli_query($con,$query);

                                while ($row = mysqli_fetch_array($query_run)){

                                    $bill_no = $row['billing_no'];
                                    $date = $row['date'];
                                    $total=$row['value_sum'];
                                    ?>
                                    <tr>
                                        <td> <?php echo $bill_no; ?></td>
                                        <td> <?php echo $date; ?></td>
                                        <td> <?php echo $total; ?></td>
                                        
                                        <td class="text-right">

                                            <div class="dropdown dropdown-action">
                                               
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                               
                                                <div class="dropdown-menu dropdown-menu-right">
                                               
                                                    <a class="dropdown-item" href="order_details.php?a=<?php echo $uid?>&b=<?php echo $bill_no?>"> View Details</a>
                                               
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                
                            </table>
                            <?php 
                            if(isset($_POST['search'])){?>

                                <script type="text/javascript">change_table()</script>

                                <table class="table table-striped custom-table" id="bill1">

                                <thead>

                                <tr>
                                        <th>Bill Number</th>
                                        <th>Billing date</th>
                                        <th>Amount</th>
                                        <th class="text-right">Action</th>
                                    </tr>

                                </thead>

                                <tbody>

                                <?php 
                                    $date =$_POST['date'];   
                                    $query = "SELECT SUM(amount) AS value_sum, billing_no,patient_id from billing GROUP BY billing_no where date='$date'";

                                    $query_run = mysqli_query($con,$query);

                                while ($row = mysqli_fetch_array($query_run)){

                                    $bill_no = $row['billing_no'];
                                    $patient_id = $row['patient_id'];
                                    $date = $row['date'];
                                    $total=$row['value_sum'];

                                    ?>
                                    <td> <?php echo $bill_no; ?></td>
                                        <td> <?php echo $patient_id; ?></td>
                                        <td> <?php echo $full_name; ?></td>
                                        <td> <?php echo $date; ?></td>
                                        <td> <?php echo $total; ?></td>
                                        
                                        <td class="text-right">

                                            <div class="dropdown dropdown-action">
                                               
                                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                               
                                                <div class="dropdown-menu dropdown-menu-right">
                                               
                                                    <a class="dropdown-item" href="view-bill.php?a=<?php echo $bill_no?>"> View Details</a>
                                               
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                       <?php } } ?>

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