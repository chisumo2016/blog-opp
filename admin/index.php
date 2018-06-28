
<?php
session_start();

if (!isset($_SESSION['email'])){
    header('Location: login.php');
}
else{
include "includes/header.php";
include "includes/footer.php";

}

