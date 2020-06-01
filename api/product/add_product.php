<?php
include_once 'config/db.php';
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $product_code = $_POST['product_code'];
    $category_id = $_POST['category_id'];
    $unit = $_POST['unit'];
    $price = $_POST['price'];
    $currency = $_POST['currency'];
    $sql = "INSERT INTO product (name,product_code,category_id,unit,price,currency)
	 VALUES ('$name','$product_code','$category_id','$unit','$price','$currency')";
    if (mysqli_query($conn, $sql)) {
        echo "New product created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}