<?php 
$homeurl = "http://localhost/FinalProject";
?>
<link rel="stylesheet" href="<?php echo $homeurl; ?>/css/all.min.css">
<link rel="stylesheet" href="<?php echo $homeurl; ?>/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $homeurl; ?>/css/style.css">
<?php
include 'database/connection.php';
session_start();
if(!isset($_SESSION['Login']))
{
    header("location:index.html");
}
?>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand text-white weight-bold" href="admin.php">FAMILY RESTAURANT</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mx-auto" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link text-white " href="<?php echo $homeurl; ?>/Admin/home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white " href="<?php echo $homeurl; ?>/Admin/category/category.php"> Category <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white " href="<?php echo $homeurl; ?>/Admin/user/user.php"> Users <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white " href="<?php echo $homeurl; ?>/Admin/dish/dish.php"> Dish <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white " href="<?php echo $homeurl; ?>/Admin/contact/contactUs.php">Contact US<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-white " href="<?php echo $homeurl; ?>/Admin/logout.php">Logout <span class="sr-only">(current)</span></a>
        </li>
        </ul>
    </div>
    </nav>
</div>