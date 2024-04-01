<?php
    include '../../config.php';

    $transactions_id = $_POST['transaction_id'];
    $transactions_status = $_POST['status'];

    if($_POST['resi'] == "") {
        mysqli_query($config, "UPDATE transactions SET transaction_status='$transactions_status' WHERE transactions_id='$transactions_id'");
    } else {
        $resi = $_POST['resi'];
        mysqli_query($config, "UPDATE transactions SET transaction_status='$transactions_status', resi='$resi' WHERE transactions_id='$transactions_id'");
    }

    header("location:javascript://history.go(-1)");