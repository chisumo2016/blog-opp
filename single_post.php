<?php
include "libs/config.php";
include "libs/Database.php";
include "function/functions.php";

//Get pecific post

$id = $_GET['id'];

//Create an instance
$db = new Database();

$query ="SELECT * FROM posts WHERE id ='$id'";

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

    <title>Blog </title>


    <!-- Bootstrap core CSS -->
    <link href="styles/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="styles/css/blog.css" rel="stylesheet">
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="index.php">Home</a>
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Service</a>
            <a class="nav-link" href="#">Post</a>
            <a class="nav-link" href="#">Contact</a>
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

<div class="col-sm-8 blog-main">

    <?php $row = $posts->fetch_array()  ?>

        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'] ;?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']) ;?> by <a href="#"><?php echo $row['author'] ;?></a></p>

            <img style="float: left; margin-right: 20px; margin-bottom: 10px;" src='images/<?php echo $row['image'] ;?>' width=400" height="300" alt="">

            <p style="text-align: justify"><?php echo $row['description'] ;?></p>

            <hr>


        </div><!-- /.blog-post -->
<!---->
<!---->
<!--    <nav class="blog-pagination">-->
<!--        <a class="btn btn-outline-primary" href="#">Previous</a>-->
<!--        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>-->
<!--    </nav>-->

</div>

<?php
include "includes/sideba.php";
include "includes/footer.php";
?>
