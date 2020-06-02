<?php
header("Content-Type:application/json");
if (isset($_GET['save']) && $_GET['save'] != "") {
    include('db.php');
    $product_id = $_GET['product_id'];
    $result = mysqli_query($con, "SELECT * FROM `product` WHERE product_id=$product_id");
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $product_code = $row['product_code'];
        $category_id = $row['category_id'];
        $unit = $row['unit'];
        $unit_price = $row['unit_price'];
        $currency = $row['currency'];
        $response_code = $row['response_code'];
        $response_desc = $row['response_desc'];
        response($product_id, $product_code, $category_id, $unit, $unit_price, $currency);
        mysqli_close($con);
    } else {
        response(NULL, NULL, NULL, NULL, 200, "No Record Found");
    }
} else {
    response(NULL, NULL, NULL, NULL, 400, "Invalid Request");
}

function response($product_id, $product_code, $category_id, $unit, $unit_price, $currency)
{
    $response['product_id'] = $product_id;
    $response['product_code'] = $product_code;
    $response['category_id'] = $category_id;
    $response['unit'] = $unit;
    $response['unit_price'] = $unit_price;
    $response['currency'] = $currency;

    $json_response = json_encode($response);
    echo $json_response;
}