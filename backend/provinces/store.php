<?php
include '../../config.php';


$provinces_name = $_POST['provinces_name'];
$shipping_cost = $_POST['shipping_cost'];

mysqli_query($config,"INSERT INTO provinces VALUES(NULL, '$provinces_name', '$shipping_cost')");

header('Location:index.php');