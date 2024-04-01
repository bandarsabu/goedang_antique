<?php
include '../../config.php';
$products_id = $_GET['products_id'];
mysqli_query($config, "DELETE FROM products WHERE products_id='$products_id'");
header('Location:index.php');

?>

