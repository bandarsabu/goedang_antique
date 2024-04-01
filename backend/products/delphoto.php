<?php
include '../../config.php';
$galleries_id = $_GET['galleries_id'];
mysqli_query($config, "DELETE FROM product_galleries WHERE galleries_id='$galleries_id'");
// $_SERVER[HTTP_REFERER];
// header("location:javascript://history.go(-1)");
// header("location:javascript://history.back()");
?>

<script>
    history.back();
</script>