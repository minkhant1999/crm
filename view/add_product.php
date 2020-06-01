<?php
include_once 'db.php';
if (isset($_POST['save'])) {
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $category_id = $_POST['category_id'];
    $unit = $_POST['unit'];
    $unit_price = $_POST['unit_price'];
    $currency = $_POST['currency'];
    $sql = "INSERT INTO product (product_name,product_code,category_id,unit,unit_price,currency)
	 VALUES ('$product_name','$product_code','$category_id','$unit','$unit_price','$currency')";

    if (mysqli_query($con, $sql)) {
        echo "New product created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($con);
    }
    mysqli_close($con);
}