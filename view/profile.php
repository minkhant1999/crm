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
    <div class="ui fluid container">

        <?php include "header.php"; ?>
        <div class="ui raised very padded text container segment">
            <h2 class="ui header">Personal preferences</h2>
            <div class="ui top attached tabular menu">
                <a class="item active" data-tab="first">Account</a>
                <a class="item" data-tab="second">Your companies</a>
                <a class="item" data-tab="third">API</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">
                General
                <form class="ui form" method="post" action="add_product.php">
                    <div class="field">
                        <h2><label>Your name</label></h2>
                        <input type="text" name="product_name">
                    </div>
                    <div class="field">
                        <h2><label>Product code</label></h2>
                        <input type="text" name="product_code">
                    </div>
            </div>
            <div class="ui bottom attached tab segment" data-tab="second">
                Second
            </div>
            <div class="ui bottom attached tab segment" data-tab="third">
                Third
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">

            </div>
        </div>
</body>

</html>