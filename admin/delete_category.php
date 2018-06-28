<?php
include "../libs/config.php";
include "../libs/Database.php";
include "../function/functions.php";

//Create a new object
$db = new Database();

//Delete a post

if(isset($_GET['id'])){

    $id = $_GET['id']; // url
    $query = "DELETE FROM categories WHERE id = '$id'";

    $run= $db->delete($query);
}