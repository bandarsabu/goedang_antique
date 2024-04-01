<?php
include '../../config.php';
$categories_id = $_GET['categories_id'];
mysqli_query($config, "DELETE FROM categories WHERE categories_id='$categories_id'");
header('Location:index.php');

?>