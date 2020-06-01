<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Product.php';
include_once '../../view/index.php';
// php trick
if (isset($_GET['order_id']) && $_GET['order_id'] != "") {
  include('db.php');
  $order_id = $_GET['order_id'];
  $result = mysqli_query($con, "SELECT * FROM `transactions` WHERE order_id=$order_id");
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $amount = $row['amount'];
    $response_code = $row['response_code'];
    $response_desc = $row['response_desc'];
    response($order_id, $amount, $response_code, $response_desc);
    mysqli_close($con);
  } else {
    response(NULL, NULL, 200, "No Record Found");
  }
} else {
  response(NULL, NULL, 400, "Invalid Request");
};
// php trick end//
if (isset($_POST['save'])) {
  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connectMySQL();

  // Instantiate blog post object
  $product = new Product($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  $product->name = $data->name;
  $product->product_code = $data->product_code;
  $product->category = $data->category;
  $product->prices = $data->prices;
  $product->active_flag = $data->active_flag;
  $product->visible_to = $data->visible_to;
  $product->unit = $data->unit;
  $product->tax = $data->tax;

  // Create new product
  if ($product->create()) {
    echo json_encode(
      array('message' => 'Product Created')
    );
  } else {
    echo json_encode(
      array('message' => 'Product Not Created')
    );
  }
}