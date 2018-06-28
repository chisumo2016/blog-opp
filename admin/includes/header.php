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
            <a class="nav-link" href="create_post.php">Add New Post</a>
            <a class="nav-link" href="add_category.php">Add New Category</a>
            <a class="nav-link  float-right" href="../index.php">View Blog</a>
            <a class="nav-link pull-right" href="logout.php">Logout</a>
        </nav>
    </div>
</div>


<div class="container">

    <div class="row">

        <div class="col-sm-12 blog-main">
            <br>
            <?php
                if(isset($_GET['msg'])){

                    echo "<div class='alert alert-success'>" .$_GET['msg'] ."</div>";
                }

             ?>
            <table class="table table-striped">

                <thead>
                <tr align="center">
                    <td colspan="4"><h1>Manage My Post</h1></td>
                </tr>


                <tr>
                    <th scope="col">Post ID</th>
                    <th scope="col">Post Title</th>
                    <th scope="col">Post Description</th>
                    <th scope="col">Post Author</th>
                    <th scope="col">Post Date</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row =$posts->fetch_array()) : ?>
                    <tr>
                        <th scope="row"><?php echo $row['id'];?></th>
                        <td>
                            <a href="edit_post.php?id=<?php echo $row['id'];?>">
                                <?php echo $row['title'];?>
                            </a>
                        </td>
                        <td><?php echo $row['description'];?></td>
                        <td><?php echo $row['author'];?></td>
                        <td><?php echo formatDate($row['date']);?></td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>

            <br>
            <table class="table table-striped">

                <thead>
                <tr align="center">
                    <td colspan="4"><h1>Manage Your Categories</h1></td>
                </tr>


                <tr>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category  Name</th>

                </tr>
                </thead>
                <tbody>
                <?php while($row1 = $cats->fetch_array()) :  ?>
                    <tr>
                        <th scope="row"><?php echo $row1['id'];?></th>
                        <td>
                            <a href="edit_category.php?id=<?php echo $row1['id'];?>">
                                <?php echo $row1['name'];?>
                            </a>
                        </td>

                    </tr>
                <?php endwhile ; ?>

                </tbody>
            </table>

        </div><!-- /.blog-main -->

        <?php include "../includes/footer.php";?>