<?php
include_once 'db.php';
if (isset($_POST['save'])) {
    $organization_name = $_POST['organization_name'];
    $label_id = $_POST['label_id'];
    $owner_id = $_POST['owner_id'];
    $address = $_POST['address'];
    $visibility_group_id = $_POST['visibility_group_id'];
    $sql = "INSERT INTO organization (organization_name,label_id,owner_id,address,visibility_group_id) VALUES ('$organization_name','$label_id','$owner_id','$address','$visibility_group_id')";
    if (mysqli_query($con, $sql)) {

        echo ("New product created successfully !");
        header('location: organizations.php');
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($con);
    }
    mysqli_close($con);
}