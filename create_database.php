<!-- This file is just used to create all the required database and tables. -->
<?php

$con = mysqli_connect("localhost","root","") or die("Unable to connet");
$sql = 'CREATE Database easymeds';
$retval = mysqli_query($con,$sql);

if($retval){
	echo "<script>alert('Database Created Sucessfully')</script>";
}
else{
	echo "<script>alert('Database already exists')</script>";
}

$query = "CREATE TABLE `easymeds`.`login` (`uid` VARCHAR(10),PRIMARY KEY (`uid`),`uname` VARCHAR(30) NOT NULL, `password` VARCHAR(30) NOT NULL ,`full_name` VARCHAR(100) NOT NULL , `role` VARCHAR(20) NOT NULL , `email` VARCHAR(100) NOT NULL , `phone_no` VARCHAR(15) NOT NULL,`address` VARCHAR(200) NOT NULL,`gender` VARCHAR(50) NOT NULL)";
$query_run = mysqli_query($con,$query);

if($query_run){
	echo "<script>alert('Created Sucessfully Login Table')</script>";
}
else{
	echo "<script>alert('Tables already exists')</script>";
}
$query = "CREATE TABLE `easymeds`.`stock` ( `stock_id` VARCHAR(20) NOT NULL ,`uid` VARCHAR(20) NOT NULL ,`medicine_name` VARCHAR(100) NOT NULL , `manufacturer_name` VARCHAR(100) NOT NULL , `stock_quantity` VARCHAR(10) NOT NULL , `value` VARCHAR(15) NOT NULL , `date_of_expiry` VARCHAR(20) NOT NULL , PRIMARY KEY (`stock_id`))";
$query_run = mysqli_query($con,$query);

if($query_run){
	echo "<script>alert('Created Sucessfully stock table')</script>";
}
else{
	echo "<script>alert('Tables already exists')</script>";
}

$query = "CREATE TABLE `easymeds`.`cart` ( `uid` VARCHAR(20) NOT NULL, `seller_uid` VARCHAR(20) NOT NULL,`stock_id` VARCHAR(20) NOT NULL ,`medicine_name` VARCHAR(100) NOT NULL ,`quantity` VARCHAR(10) NOT NULL, `price` VARCHAR(10) NOT NULL)";
$query_run = mysqli_query($con,$query);

if($query_run){
	echo "<script>alert('Created Sucessfully cart table')</script>";
}
else{
	echo "<script>alert('Table already exists')</script>";
}

$query= "CREATE TABLE `easymeds`.`billing` ( `billing_no` VARCHAR(20) NOT NULL ,  `uid` VARCHAR(50) NOT NULL , `seller_uid` VARCHAR(20) NOT NULL, `stock_id` VARCHAR(20) NOT NULL , `date` VARCHAR(20) NOT NULL, `medicine_name` VARCHAR(100) NOT NULL,`quantity` VARCHAR(10) NOT NULL , `price` VARCHAR(10) NOT NULL, `indiviual_cost` VARCHAR(20) NOT NULL )";
$query_run = mysqli_query($con,$query);

if($query_run){
	echo "<script>alert('Created Sucessfully billing table')</script>";
}
else{
	echo "<script>alert('Table already exists')</script>";
}

?>