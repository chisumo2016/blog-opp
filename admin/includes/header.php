<?php
include "../libs/config.php";
include "../libs/Database.php";
include "../function/functions.php";

//Create an instance
$db = new Database();

$query ="SELECT * FROM posts order by id DESC";

$posts = $db->select($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Admin Panel </title>


    <!-- Bootstrap core CSS -->
    <link href="../styles/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../styles/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="index.php">DashBoard</a>
            <a class="nav-link" href="#">Add New Post</a>
            <a class="nav-link" href="#">Add New Category</a>
            <a class="nav-link  float-right" href="../index.php">View Blog</a>
            <a class="nav-link pull-right" href="logout.php">Logout</a>
        </nav>
    </div>
</div>

<div class="blog-header">
    <div class="container">
        <h1 class="blog-title">Blog </h1>
        <p class="lead blog-description">All  About PHP and news </p>
    </div>
</div>

<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main">


        </div><!-- /.blog-main -->