<!-- The prodcuts added to the cart are displayed if user wishes to buy them then they can generate a bill so that the supplier is notified -->
<?php
require 'dbconfig/config.php';
$total = 0;
$uid = $_GET['a'];
?>


<!DOCTYPE html>
<html lang="en">


<!-- index22:59-->
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
					<img src="assets/img/logo.jpeg" width="100" height="100" > 
					<p><h3 class="heading"><strong>Easy Med</strong></br>
					Address Saint Louis MO<br>
					Mob: XXXXXXXXXX, XXXXXXXXXX</h3></p>
                </div>   
            <br>  
			<div class="row">
                <div class="col-md-12">
					<h4><caption> Cart</caption></h4>
					<div class="table-responsive">
                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th>Sl.No</th>
                                    <th>Medicine Name</th>
                                    <th>Quantity</th>
									<th>Amount</th>
									
                                </tr>  
                            </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM cart where uid = '$uid';";
                                    $query_run = mysqli_query($con,$query);
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($query_run)){
                                        $stock_id = $row['stock_id'];
                                        $medicine_name = $row['medicine_name'];
                                        $quantity = $row['quantity'];
                                        $price = $row['price'];
                                        $count = $count+1;
                                        $total = $total+$quantity*$price;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
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
										<td><strong><?php echo $total; ?></strong></td>
									</tr>
								</tfoot>
                        </table>    
					</div>	
                </div>
				
            </div> 
            <form action="" method="POST">
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn" name="create">Generate Bill</button>
                </div>
            </form> 
            <form action="" method="POST">
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary float-right btn-rounded" name="clear">CLEAR</button>
                </div>
            </form>
            <?php
                if(isset($_POST['clear'])){
                        $query="DELETE from cart";
                        $query_run = mysqli_query($con,$query);
                }
            ?>

            <?php
                if(isset($_POST['create'])){
                    $date = date("d/m/Y");
                    $query = "SELECT count(distinct(billing_no)) FROM billing";
                    $result = mysqli_query($con,$query);
                    while ($res=mysqli_fetch_array($result)) {
                        $id = $res[0];
                    }
                    $billing_no = "B-".$id;

                    $query1 = "SELECT * FROM cart;";
                    $query_run1 = mysqli_query($con,$query1);
                    while ($row = mysqli_fetch_array($query_run1)){
                        $r_stock_id = $row['stock_id'];
                        $r_seller_uid = $row['seller_uid'];
                        $r_medicine_name = $row['medicine_name'];
                        $r_quantity = $row['quantity'];
                        $r_price = $row['price'];
                        $indiviual_cost = $r_quantity*$r_price;
                        $query = "INSERT into billing values('$billing_no','$uid', '$r_seller_uid', '$r_stock_id', '$date','$r_medicine_name','$r_quantity','$r_price','$indiviual_cost')";
                        $query_run = mysqli_query($con,$query);

                        $query_stock = "UPDATE stock SET stock_quantity = CAST(CAST(stock_quantity AS INT) - CAST('$r_quantity' AS INT) as VARCHAR(10)) WHERE stock_id = '$r_stock_id'";
                        $query_run_stock = mysqli_query($con,$query_stock);

                    }
                    echo "<script>location.href='bill.php?a=$uid&b=$billing_no'</script>";

                    $query="DELETE from cart";
                    $query_run = mysqli_query($con,$query);
                }
            ?>  
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
