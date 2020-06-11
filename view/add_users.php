<?php
include_once 'db.php';
if (isset($_POST['save'])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="https://etherio.github.io/cdn/semantic/semantic.css" />
    <script src="https://etherio.github.io/cdn/jquery/jquery.min.js"></script>
    <script src="https://etherio.github.io/cdn/semantic/semantic.js" defer></script>
</head>

<body>
    <div class="ui fluid container">

        <?php include "header.php"; ?>
        <div class="ui container segment very padded raised ">
            <h2 class="ui header">Manage Users</h2>
            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Users</a>
                <a class="item" data-tab="second">Permission sets</a>
                <a class="item" data-tab="third">Visibility groups</a>
                <a class="item" data-tab="third">Teams</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">
                <div class="ui tag">
                    <h2>Add users</h2>
                </div>
                <form class="ui form" method="POST" action="">
                    <div class="field">
                        <label>Email</label>
                        <input name="email" type="text">
                    </div>
                    <div class="field">
                        <label>First name</label>
                        <input name="first_name" type="text">
                    </div>
                    <div class="field">
                        <label>Last name</label>
                        <input name="last_name" type="text">
                    </div>
                    <div class="field">
                        <label>Visibility group</label>
                        <select class="ui dropdown" name="visibility_group_id">
                            <option value="">Unassigned users</option>
                            <option value="male">Management</option>
                            <option value="female">Example</option>
                        </select>
                    </div>
                    <div class="ui submit button">Cancel</div>
                    <div class="ui submit icon button">Confirm and invite users</div>
                    <a class="ui submit">+Add one more user
                    </a>
                    <div class="ui error message"></div>
                </form>
            </div>

        </div>
</body>

</html>