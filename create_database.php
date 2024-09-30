<?php
// Database connection parameters
$dbHost = 'db'; // Use the service name defined in docker-compose.yml
$dbUser = 'root'; // MySQL root username
$dbPass = 'root'; // MySQL root password
$dbName = 'easymeds'; // Database name to use

// Create connection
$con = mysqli_connect($dbHost, $dbUser, $dbPass) or die("Unable to connect");

// Create Database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbName";
$retval = mysqli_query($con, $sql);

if ($retval) {
    echo "<script>alert('Database Created Successfully')</script>";
} else {
    echo "<script>alert('Database already exists')</script>";
}

// Select the database
mysqli_select_db($con, $dbName);

// Create login table
$query = "CREATE TABLE IF NOT EXISTS `login` (
    `uid` VARCHAR(10) PRIMARY KEY,
    `uname` VARCHAR(30) NOT NULL,
    `password` VARCHAR(30) NOT NULL,
    `full_name` VARCHAR(100) NOT NULL,
    `role` VARCHAR(20) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone_no` VARCHAR(15) NOT NULL,
    `address` VARCHAR(200) NOT NULL,
    `gender` VARCHAR(50) NOT NULL
)";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    echo "<script>alert('Created Successfully Login Table')</script>";
} else {
    echo "<script>alert('Login Table already exists')</script>";
}

// Create stock table
$query = "CREATE TABLE IF NOT EXISTS `stock` (
    `stock_id` VARCHAR(20) NOT NULL PRIMARY KEY,
    `uid` VARCHAR(20) NOT NULL,
    `medicine_name` VARCHAR(100) NOT NULL,
    `manufacturer_name` VARCHAR(100) NOT NULL,
    `stock_quantity` VARCHAR(10) NOT NULL,
    `value` VARCHAR(15) NOT NULL,
    `date_of_expiry` VARCHAR(20) NOT NULL
)";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    echo "<script>alert('Created Successfully stock table')</script>";
} else {
    echo "<script>alert('Stock Table already exists')</script>";
}

// Create cart table
$query = "CREATE TABLE IF NOT EXISTS `cart` (
    `uid` VARCHAR(20) NOT NULL,
    `seller_uid` VARCHAR(20) NOT NULL,
    `stock_id` VARCHAR(20) NOT NULL,
    `medicine_name` VARCHAR(100) NOT NULL,
    `quantity` VARCHAR(10) NOT NULL,
    `price` VARCHAR(10) NOT NULL
)";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    echo "<script>alert('Created Successfully cart table')</script>";
} else {
    echo "<script>alert('Cart Table already exists')</script>";
}

// Create billing table
$query = "CREATE TABLE IF NOT EXISTS `billing` (
    `billing_no` VARCHAR(20) NOT NULL,
    `uid` VARCHAR(50) NOT NULL,
    `seller_uid` VARCHAR(20) NOT NULL,
    `stock_id` VARCHAR(20) NOT NULL,
    `date` VARCHAR(20) NOT NULL,
    `medicine_name` VARCHAR(100) NOT NULL,
    `quantity` VARCHAR(10) NOT NULL,
    `price` VARCHAR(10) NOT NULL,
    `individual_cost` VARCHAR(20) NOT NULL
)";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    echo "<script>alert('Created Successfully billing table')</script>";
} else {
    echo "<script>alert('Billing Table already exists')</script>";
}

// Close the database connection
mysqli_close($con);
?>
