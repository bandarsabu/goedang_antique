<?php
include '../../config.php';
$provinces_id = $_GET['provinces_id'];
mysqli_query($config, "DELETE FROM provinces WHERE provinces_id='$provinces_id'");
header('Location:index.php');

?>