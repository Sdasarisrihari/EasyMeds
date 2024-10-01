<!-- This code displays the bill with what all the items the customer has purchase it have an ui of the copany image and address and all other details required. This can be printed or download as pdf also -->
<?php 
require 'dbconfig/config.php';
$uid = $_GET['a'];
$billing_no=$_GET['b']; 
$total = 0;
$count=0;
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

<script>
function printContent(el){
var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
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
                            <a href="buy_products.php?a=<?php echo $uid ?>"><i class="fa fa-dashboard"></i> <span>Main Page</span></a>
                        </li>
                        <li>
                            <a href="order_history.php?a=<?php echo $uid ?>"><i class="fa fa-hospital-o"></i> <span>Previous Orders</span></a>
                        </li>
                        <li>
                            <a href="cart.php?a=<?php echo $uid ?>"><i class="fa fa-cube"></i> <span>Cart</span></a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="page-wrapper">
            <div class="content">

                <div class="row">

                    <div class="col-sm-5 col-4">

                        <h4 class="page-title">Bill</h4>

                    </div>

                    <div class="col-sm-7 col-8 text-right m-b-30">

                        <div class="btn-group btn-group-sm">

                           

                            <button onClick="printContent('content_to_print');" class="btn btn-white">PDF</button>

                            <button onClick="printContent('content_to_print');" class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>

                        </div>

                    </div>

                </div>

                <div class="row" id="content_to_print">

                    <div class="col-md-12">

                        <div class="card-box">

                            <h4 class="payslip-title">Billing</h4>

                            <div class="row">

                                <div class="col-sm-6 m-b-20">

                                    <img src="assets/img/logo.jpeg" class="inv-logo" alt="">

                                    <ul class="list-unstyled mb-0">

                                        <li><strong>Easy Med</strong></li>

                                        <li>Address Saint Louis MO</li>

                                        <li>Mob: XXXXXXXXXX, XXXXXXXXXX</li>

                                    </ul>

                                </div>
                                <?php
                                $query="select * from billing where billing_no='$billing_no'";  
                                $query_run = mysqli_query($con,$query);  

                                    while($row=mysqli_fetch_array($query_run)){   
                                        $date=$row["date"];
                                }
                                ?>
                                 <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h4 class="text-uppercase">Bill No: <?php echo $billing_no?></h4>
                                        
                                           <h5> Billing Date: <span><?php echo $date?></span></h5>
                                        
                                    </div>
                                </div>

                            </div>
                            <?php 
                         

                            $query="select * from login where uid='$uid'"; 
                            $query_run = mysqli_query($con,$query); 

                            while($row=mysqli_fetch_array($query_run)){  
                            $full_name=$row["full_name"];
                            $address=$row["address"];
                            $phone_no=$row["phone_no"]; 
                            $email=$row["email"];
                                }
                            ?>
                            <div class="row">

                                <div class="col-lg-12 m-b-20">

                                    <ul class="list-unstyled">

                                        <li>

                                            <h5 class="mb-0"><strong><?php echo $full_name ?></strong></h5></li>

                                        <li>Address: <?php echo $address?></li>

                                        <li>Email: <?php echo $email ?></li>

                                        <li>Phone: <?php echo $phone_no ?></li>

                                    </ul>

                                </div>

                            </div>

                           <div class="row">
                            <div class="col-md-12">
                            <h4><caption> Bill</caption></h4>
                            <div class="table-responsive">
                                <table class="table table-striped custom-table">
                                <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Medicine Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Amount</th>
                                </tr>  
                                
                            </thead>
                                
                                <tbody>
                                <?php
                                    $query="select * from billing where billing_no='$billing_no'";  
                                    $query_run = mysqli_query($con,$query);  

                                    while($row=mysqli_fetch_array($query_run)){  
                                    $medicine_name=$row["medicine_name"]; 
                                    $quantity=$row["quantity"];
                                    $price=$row["price"];
                                    $amount = $row["indiviual_cost"];
                                    $total=$total+$amount;
                                    $count=$count+1;
                                ?>

                                    <tr>
                                        <td> <?php echo $count; ?></td>
                                        <td> <?php echo $medicine_name; ?></td>
                                        <td> <?php echo $quantity; ?></td>
                                        <td> <?php echo $price; ?></td>
                                        <td> <?php echo $amount; ?></td>  
                                    </tr>

                                    <?php } ?>  
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td></td>
                                        <td><b></b></td>
                                        <td><b></b></td>
                                        <td><b><?php echo $total?></b></td>
                                        
                                    </tr>
                                </tfoot>
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