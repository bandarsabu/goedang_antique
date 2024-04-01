<?php
    include '../../config.php';

    $products_id = $_POST['products_id'];
    $rand = rand();
    $ekstensi =  array('svg','png','jpg','jpeg','gif');
    $filename = $_FILES['photos']['name'];
    $ukuran = $_FILES['photos']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        header("location:index.php?alert=gagal_ekstensi");
    }else{
        if($ukuran < 1044070){		
            $x = $rand.'_'.$filename;
            move_uploaded_file($_FILES['photos']['tmp_name'], '../../images/products/'.$rand.'_'.$filename);
            mysqli_query($config,"INSERT INTO product_galleries VALUES (NULL, '$products_id', '$x')");
            echo '
            <script>
                history.back();
            </script>
            ';
        }else{
            echo '
            <script>
                history.back();
            </script>
            ';
        }
    }

