<?php 
include '../../config.php';

$categories_id = $_POST['categories_id'];
$name_category = $_POST['name_category'];
$slug = strtolower(str_replace(" ","-", $_POST['name_category']));

$rand = rand();
$ekstensi =  array('svg','png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($_FILES['foto']['error'] === 4) {
    mysqli_query($config, "UPDATE categories SET name_category='$name_category', slug='$slug' WHERE categories_id ='$categories_id'");
    
    echo "
    <script>
        alert('Update Berhasil');
        window.location.replace('index.php');
    </script>
    ";
} else {
    
    if(!in_array($ext,$ekstensi) ) {
        header("location:index.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 1044070){		
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], '../../images/categories/'.$rand.'_'.$filename);
            mysqli_query($config, "UPDATE categories SET name_category='$name_category', slug='$slug', photo='$xx' WHERE categories_id ='$categories_id'");
            header("location:index.php?alert=berhasil");
        }else{
            header("location:index.php?alert=gagak_ukuran");
        }
    }
}