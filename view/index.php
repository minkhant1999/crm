<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "achievement crm");
if (!$conn) {
    die('Could not Connect My Sql:');
}
$result = mysqli_query($conn, "SELECT * FROM product");
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
    <div class="ui attached stackable menu">
        <div class="ui container"><a class="item"><i class="home icon"></i>Home
            </a><a class="item"><i class="grid layout icon"></i>Browse </a><a class="item"><i
                    class="mail icon"></i>Messages </a>
            <div class="ui simple dropdown item">More <i class="dropdown
                        icon"></i>
                <div class="menu">
                    <a class="item"><i class="edit icon"></i>Edit Profile</a>
                    <a class="item"><i class="globe icon"></i>Choose Language</a>
                    <a href="setting.html" class="item"><i class="settings icon"></i>Account Settings</a>
                </div>
            </div>
            <div class="right item">
                <div class="ui input"><input type="text" placeholder="Search..."></div>
            </div>
        </div>
    </div>
    <!-- <button type="button" class="fa fa-plus" data-toggle="modal" data-target="#myModal">Product</button> -->

    <!-- Modal -->
    <div class="ui basic modal">
        <form class="ui form">
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
                <input type="text" name="category_id">
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