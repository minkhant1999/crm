<?php
include_once 'db.php';
$result = mysqli_query($con, "SELECT * FROM product");
$result2 = mysqli_query($con, "SELECT * FROM category");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" type="text/css" href="./dist/semantic.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./dist/semantic.js" defer></script>
</head>


<body>
    <?php
    include("header.php");
    ?>
    <!-- <button type="button" class="fa fa-plus" data-toggle="modal" data-target="#myModal">Product</button> -->

    <!-- Modal -->
    <div class="ui basic modal">
        <form class="ui form" method="post" action="add_product.php">
            <div class="field">
                <h2><label>Product name</label></h2>
                <input type="text" name="product_name">
            </div>
            <div class="field">
                <h2><label>Product code</label></h2>
                <input type="text" name="product_code">
            </div>
            <div class="field">
                <h2><label>Category</label></h2>
                <select>
                    <?php
                    while ($row = mysqli_fetch_array($result2)) :; ?>

                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

                    <?php endwhile; ?>
                </select>

            </div>
            <div class="field">
                <h2><label>Unit</label></h2>
                <input type="text" name="unit">
            </div>
            <div class="field">
                <h2><label>Unit price</label></h2>
                <input type="text" name="unit_price">
                <input type="text" name="currency" placeholder="$">
            </div>
            <!-- append custom field here -->
            <div class="field">
                <select>
                    <option value="">Visibility</option>
                    <option value="0">Owner's only</option>
                    <option value="1">Ower's visibility groups</option>
                    <option value="2">Entire Company</option>
                    <option value="3">Ower's groups and sub-groups</option>
                </select>
            </div>
            <button class="ui button" type="submit" name="save">SAVE</button>
        </form>

    </div>
    <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Product</button>
    <!-- retrieve data with table from product table -->
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="ui celled table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Product code</th>
            </tr>
        </thead>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
        <tbody></tbody>
        <tr>
            <td><?php echo $row["product_name"]; ?></td>
            <td><?php echo $row["product_code"]; ?></td>
            <td></td>
        </tr>
        <?php
                $i++;
            }
            ?>
    </table>
    <?php
    } else {
        echo "No product here";
    }
    ?>


    <!-- <div class="ui cards">

        <template>
            <div class="card">
                <div class="content">
                    <div class="header"></div>
                    <div class="meta"></div>
                    <div class="description"></div>
                </div>
            </div>
        </template>

        <script src="./products.js"></script>
    </div> -->

</body>

</html>