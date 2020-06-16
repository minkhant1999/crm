<?php
include_once 'db.php';
$table = 'category';
if (isset($_POST['save'])) {
    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    //$category_name = $_POST['category_name'];
    $new_category = $_POST['new_category'];
    if ($_POST['category_name'] == 'other') {
        $category_name = $_POST['new_category'];
    } else {
        $category_name = $_POST['category_name'];
    }
    $unit = $_POST['unit'];
    $unit_price = $_POST['unit_price'];
    $currency = $_POST['currency'];
    $visible_to = $_POST['owner_visibility_name'];

    if ($new_category != null) {
        $sqlcategory = "INSERT INTO category(category_name) VALUES ('$new_category')";

        if (mysqli_query($con, $sqlcategory)) {

            $getcategoryIDsql = "SELECT (category_id) FROM category WHERE (category_name) = ('$new_category')";

            if ($result = mysqli_query($con, $getcategoryIDsql)) {
                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        $new_category = $row['category_id'];
                    }


                    $sql = "INSERT INTO product (product_name,product_code,category_id,unit,unit_price,currency,visible_to) VALUES ('$product_name','$product_code','$new_category','$unit','$unit_price','$currency','$visible_to')";
                    if (mysqli_query($con, $sql)) {
                        echo ("New product created successfully !");
                        header('location: produt.php');
                    } else {
                        echo "Error: " . $sql . "
                            " . mysqli_error($con);
                    }
                }
                mysqli_free_result($result);
            } else {

                echo "ERROR: Could not able to execute " . mysqli_error($con);
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        $sql = "INSERT INTO product (product_name,product_code,category_id,unit,unit_price,currency,visible_to) VALUES ('$product_name','$product_code','$category_name','$unit','$unit_price','$currency','$visible_to')";
        if (mysqli_query($con, $sql)) {
            echo ("New product created successfully !");
            header('location: index.php');
        } else {
            echo "Error: " . $sql . "
                    " . mysqli_error($con);
        }
    }

    mysqli_close($con);

    //$sql2 = "INSERT INTO category (category_name) VALUE ('$category_name')";

}