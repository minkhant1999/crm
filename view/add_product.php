<?php
include_once 'db.php';
if (isset($_POST['save'])) {
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $category_name = $_POST['category_name'];
    $unit = $_POST['unit'];
    $unit_price = $_POST['unit_price'];
    $currency = $_POST['currency'];
    $visible_to = $_POST['visibility'];
    $sql = "INSERT INTO product (product_name,product_code,unit,unit_price,currency,visibility) VALUES ('$product_name','$product_code','$unit','$unit_price','$currency','$visible_to')";
    $sql2 = "INSERT INTO category (category_name) VALUE ('$category_name')";
    if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {

        echo ("New product created successfully !");
        header('location: index.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($con);
    }
    mysqli_close($con);
}