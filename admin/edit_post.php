<?php
include "../libs/config.php";
include "../libs/Database.php";
include "../function/functions.php";

//Create an instance
$db = new Database();

//Getting the ID First

$id = $_GET['id'];

$query = "SELECT * FROM posts WHERE id = $id ";

$posts = $db->select($query);

$single = $posts->fetch_array();

//Select Categories

$query = "SELECT * FROM categories ";

$cats = $db->select($query);

//Inserting  post

if(isset($_POST['submit']))

{

    // Creating local variables fro text
    $post_title          = $_POST['post_title'];
    $post_description    = $_POST['post_description'];
    $cat_id              = $_POST['cat_id'];
    $post_author         = $_POST['post_author'];
    $post_tags           = $_POST['post_tag'];

    //Creating variables for image

    $post_image      = $_FILES['post_image']['name'];
    $image_tmp       = $_FILES['post_image']['tmp_name'];

    //Validating
    if($post_title=='' || $post_description== '' || $cat_id=='' || $post_author== '' || $post_tags == '' ){

        echo "Please fill in all the fields";

    }else{
        //Move the image into the folder
        move_uploaded_file($image_tmp, "../images/$post_image");

        //Inserting
        $query = "INSERT INTO posts (category_id, title, description, author, image, tags)
                   VALUES('$cat_id', '$post_title', '$post_description', '$post_author', '$post_image', '$post_tags')";


        $run = $db->insert($query);
//        if($db->insert($query) == 'success') {
//            echo  "posted";
//        } else  {
//            echo  "error posting";
//        }
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

            <form action="create_post.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="#">Post Title :</label>
                    <input type="text" class="form-control" name="post_title"  value="<?php echo $single['title']; ?>" aria-describedby="emailHelp" placeholder="Enter Post Title">

                </div>

                <div class="form-group">
                    <label for="#">Post Description :</label>
                    <textarea class="form-control" name="post_description"  rows="3" placeholder="Enter Description"><?php echo $single['description']; ?></textarea>
                </div>

                <div class="form-group">
                    <label for="#">Select Category :</label>
                    <select class="form-control" name="cat_id">
                        <option value="">Select Category</option>
                        <?php while($row = $cats->fetch_array()) :?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                        <?php endwhile; ?>
                    </select>

                </div>

                <div class="form-group">
                    <label for="#">Post Author :</label>
                    <input type="text" class="form-control" name="post_author"  value="<?php echo $single['author']; ?>" aria-describedby="emailHelp" placeholder="Enter Post Author">

                </div>

                <div class="form-group">
                    <label for="#">Post Image :</label>
                    <input type="file" class="form-control-file" name="post_image" >
                    <img src="../images/<?php echo $single['image'];?>"  width="100" height="100" alt="">
                </div>

                <div class="form-group">
                    <label for="#">Tags :</label>
                    <input type="text" class="form-control" name="post_tag" value="<?php echo $single['tags']; ?>" aria-describedby="emailHelp" placeholder="Enter Tag">

                </div>
                blog/images

                <button type="submit" name="update" class="btn btn-success">Update Post</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>

        </div>

        </div>
        </div><!-- /.blog-main -->
    <br>
<?php include "../includes/footer.php";?>