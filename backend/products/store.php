<?php
include '../../config.php';

#query insert product
$product_name = $_POST['product_name'];
$slug = strtolower(str_replace(" ","-", $_POST['product_name']));
$category = $_POST['category'];
$price = $_POST['price'];
$deskripsi = $_POST['deskripsi'];
$berat = $_POST['berat'];
$stok = $_POST['stok'];

mysqli_query($config,"INSERT INTO products VALUES(NULL, '$product_name', '$slug', '$category', '$price','$deskripsi','$berat', '$stok')");

// query INSERT gambar
$query = mysqli_query($config, "SELECT products_id FROM products ORDER BY products_id  DESC LIMIT 1");
$result = mysqli_fetch_array($query);
$products_id  = $result['products_id'];

$folderUpload = "../../images/products/";


# periksa apakah folder tersedia
if (!is_dir($folderUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($folderUpload, 0777, $rekursif = true);
}

$files = $_FILES;
$jumlahFile = count($files['listGambar']['name']);

for ($i = 0; $i < $jumlahFile; $i++) {
    $namaFile = $files['listGambar']['name'][$i];
    $lokasiTmp = $files['listGambar']['tmp_name'][$i];

    $namaBaru = uniqid() . '-' . $namaFile;
    $lokasiBaru = "{$folderUpload}/{$namaBaru}";
    $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiBaru);

    # jika proses berhasil
    if ($prosesUpload) {
        mysqli_query($config,"INSERT INTO product_galleries VALUES (NULL, '$products_id', '$namaBaru')");
		header("location:index.php?alert=simpan");
    } else {
        header("location:index.php?alert=gagal");
    }
}

// 		

