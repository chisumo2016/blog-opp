<?php
include "../libs/config.php";
include "../libs/Database.php";
include "../function/functions.php";

//Create an instance
$db = new Database();

//Getting the ID First

$id = $_GET['id'];

$query = "SELECT * FROM categories WHERE id = $id ";

$cats = $db->select($query);

$single = $cats->fetch_array();



//update Inserting  post

if(isset($_POST['update']))

{

    // Creating local variables fro text
    $category_name          = $_POST['category_name'];

    //Validating
    if($category_name =='' ){

        echo "Please Enter Category";

    }else{

        //Updating
        $query = "UPDATE  categories SET name ='$category_name'  WHERE id = '$id'";

        $run = $db->update($query);

    }
}

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

            <form action="edit_category.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="#">Category Name :</label>
                    <input type="text" class="form-control" name="category_name"  value="<?php echo $single['name']; ?>" aria-describedby="emailHelp" placeholder="Enter Post Title">

                </div>


                <button type="submit" name="update" class="btn btn-success">Update Category</button>
                <a href="index.php" class="btn btn-success">Cancel</a>
                <a href="delete_category.php?id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
            </form>

        </div>

        </div>
        </div><!-- /.blog-main -->
    <br>
<?php include "../includes/footer.php";?>