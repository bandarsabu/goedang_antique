<?php
include '../../config.php';

#query insert product
$products_id = $_POST['products_id'];
$product_name = $_POST['product_name'];
$slug = strtolower(str_replace(" ","-", $_POST['product_name']));
$category = $_POST['category'];
$price = $_POST['price'];
$deskripsi = $_POST['deskripsi'];
$berat = $_POST['berat'];
$stok = $_POST['stok'];

mysqli_query($config,"UPDATE products SET product_name='$product_name', slug='$slug', categories_id='$category', price='$price', description='$deskripsi', weight='$berat', stock='$stok' WHERE products_id='$products_id'");

header('location:index.php');


