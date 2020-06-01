<?php
$url = 'localhost';
$username = 'root';
$password = '';
$conn = mysqli_connect($url, $username, $password, "achievement crm");
if (!$conn) {
    die('Could not Connect My Sql:');
}
$result = mysqli_query($conn, "INSERT into custom_product");
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
    <!-- Modal -->
    <div class="ui basic modal">
        <form class="ui form" action="" method="post">
            <h4 class="ui dividing header">Add Product Field</h4>
            <div class="field">
                <h2><label>Field name</label></h2>
                <input type="text" name="name">
            </div>
            <div class="field">
                <h2><label>Field type</label></h2>
                <input type="text" name="field_type">
            </div>
            <div class="field">
                <h2><label>Field properties</label></h2>
            </div>
            <div class="field">
                <label>Detail view</label>
                <input type="checkbox" name="detail_view" value="detail_view"></input>
            </div>
            <div class="field">
                <label>Add view</label>
                <input type="checkbox" name="add_view" value="add_view">
                </input>
            </div>
            <button class="ui button" type="submit" name="save">SAVE</button>
        </form>
    </div>
    <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Add product field</button>
</body>

</html>