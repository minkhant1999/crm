<?php
include_once 'db.php';
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $organization_id = $_POST['organization_id'];
    $label_id = $_POST['label_id'];
    $number = $_POST['number'];
    $phone_type_id = $_POST['phone_type_id'];
    $email = $_POST['email'];
    $email_type_id = $_POST['email_type_id'];
    $owner_id = $_POST['owner_id'];
    $visibility_group_id = $_POST['visibility_group_id'];
    $sql = "INSERT INTO people (name,organization_id,label_id,number,phone_type_id,email,email_type_id,owner_id,visibility_group_id) VALUES ('$name','$organization_id','$label_id','$number','$phone_type_id','$email','$email_type_id','$owner_id'.'$visibility_group_id')";
    $sql2 = "INSERT INTO category (category_name) VALUE ('$category_name')";
    if (mysqli_query($con, $sql) && mysqli_query($con, $sql2)) {

        echo ("New person created successfully !");
        header('location: persons.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($con);
    }
    mysqli_close($con);
}