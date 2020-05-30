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
    <form class="ui form" action="" method="post">
        <h4 class="ui dividing header">Add Product Field</h4>
        <div class="field">
            <label>Field name (required)</label>
            <input type="text" name="name">
            <label>Field type (required)</label>

            <div class="ui selection dropdown">
                <input type="text" name="field_name">
            </div>
            <input type="submit" name="save" value="save">
    </form>
    <?php
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $field_type = $_POST['field_type'];
        $city_name = $_POST['city_name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO custom_product (name,field_type,city_name,email)
            VALUES ('$name','$field_type','$city_name','$email')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully !";
        } else {
            echo "Error: " . $sql . "
            " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    ?>
    </div>

</body>

</html>