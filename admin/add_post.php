<?php
include "../libs/config.php";
include "../libs/Database.php";
include "../function/functions.php";

//Create an instance
$db = new Database();

$query ="SELECT * FROM posts order by id ASC ";

//Posts
$posts = $db->select($query);

//Categories

$query ="SELECT * FROM categories ";

$cats = $db->select($query);



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


<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main">

            <form action="add_post.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="#">Post Title :</label>
                    <input type="email" class="form-control" name="post_title"  aria-describedby="emailHelp" placeholder="Enter Post Title">

                </div>

                <div class="form-group">
                    <label for="#">Post Description :</label>
                    <textarea class="form-control" name="post_description"  rows="3" placeholder="Enter Description"></textarea>
                </div>

                <div class="form-group">
                    <label for="#">Select Category :</label>
                    <select class="form-control" name="cat">
                        <option>Select Category</option>

                    </select>

                </div>

                <div class="form-group">
                    <label for="#">Post Author :</label>
                    <input type="email" class="form-control" name="post_author"  aria-describedby="emailHelp" placeholder="Enter Post Author">

                </div>

                <div class="form-group">
                    <label for="#">Post Image :</label>
                    <input type="file" class="form-control-file" name="post_image" >
                </div>

                <div class="form-group">
                    <label for="#">Tags :</label>
                    <input type="text" class="form-control" name="post_tag"  aria-describedby="emailHelp" placeholder="Enter Tag">

                </div>

                <button type="submit" name="submit" class="btn btn-success">Add Post</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>

        </div>
        </div><!-- /.blog-main -->
    <br>
<?php include "../includes/footer.php";?>