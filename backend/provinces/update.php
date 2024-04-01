<?php
include '../../config.php';

$provinces_id = $_POST['provinces_id'];
$provinces_name = $_POST['provinces_name'];
$shipping_cost = $_POST['shipping_cost'];

mysqli_query($config,"UPDATE provinces SET provinces_name='$provinces_name', shipping_cost='$shipping_cost' WHERE provinces_id='$provinces_id'");

header('Location:index.php');