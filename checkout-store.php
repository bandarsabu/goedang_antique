<?php
session_start();
include 'config.php';


$users_id = $_SESSION['id'];
$date_transaction = date('Y-m-d h:m:s');
$shipping_price = $_POST['shipping_price'];
$total_price = $_POST['total_price'];
$unique_code = $_POST['unique_code'];
$transactions_status = "UNPAID"; // 

mysqli_query($config, "INSERT INTO transactions VALUES(NULL, '$users_id', '$date_transaction', '$shipping_price', '$total_price','$unique_code','$transactions_status', '')");

$queryIDTransactions = mysqli_query($config, "SELECT transactions_id FROM transactions WHERE users_id='$users_id' ORDER BY transactions_id DESC");
$row = mysqli_fetch_row($queryIDTransactions);
$trans_id = $row[0];

$queryProduct = mysqli_query($config, "SELECT products.products_id, price, quantity  FROM carts  JOIN products ON carts.products_id=products.products_id WHERE users_id='$users_id'");
while($data = mysqli_fetch_array($queryProduct)) {
    $products_id = $data['products_id'];
    $price = $data['price'];
    $quantity = $data['quantity'];
    
     // update data product
    $quan = mysqli_query($config,"SELECT stock FROM products WHERE products_id='$products_id'");
    $rowQuan = mysqli_fetch_row($quan);
    $stock= $rowQuan[0];

    if($quantity > $stock) {
        header('Location:checkout.php');
        break;

    }

    if($quantity <= $stock) {
        $stock -= $quantity;
        mysqli_query($config,"UPDATE products SET stock='$stock' WHERE products_id='$products_id'");
        mysqli_query($config, "INSERT INTO `transaction_items` (`tran_details_id`, `products_id`, `transaction_id`, `price`, `quantity`) 
                    VALUES (NULL, '$products_id', '$trans_id', '$price', '$quantity')");
        mysqli_query($config, "DELETE FROM carts WHERE users_id='$users_id'");

       
    } 
    
    header('Location:success.php?transaction_id='.$trans_id);

    
}





// BELUM BAYAR | PROSES | DIBATALKAN | DIKIRIM | DITERIMA | DIKEMBALIKAN
// UNPAID | PROCESS | CANCELED | SHIPPING | RECEIVED | RETURN

// INSERT INTO `transaction_items` (`tran_details_id`, `products_id`, `transaction_id`, `price`, `shipping_status`, `resi`) 
// VALUES (NULL, '1', '1', '20000', 'PENDING', '');