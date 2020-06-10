<?php
include 'db.php';
session_start();
if (isset($_SESSION['email'])) {
    header('location: deals.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="https://etherio.github.io/cdn/semantic/semantic.css" />
    <script src="https://etherio.github.io/cdn/jquery/jquery.min.js"></script>
    <script src="https://etherio.github.io/cdn/semantic/semantic.js" defer></script>
    <style type="text/css">
    body {
        background-color: #DADADA;
    }

    body>.grid {
        height: 100%;
    }

    .image {
        margin-top: -100px;
    }

    .column {
        max-width: 450px;
    }
    </style>

</head>

<body>
    <?php
    include "menu1.php";
    ?>
    <div class="ui divider"></div>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <img src="assets/images/logo.png" class="image">
                <div class="content">
                    Create your account
                </div>
            </h2>
            <form method="post" action="user_registration_script.php">
                <!--Name-->
                <div class="form-group">
                    <input type="text" class="form-control" name="first_name" placeholder="Name" required="true">
                </div>
                <!--Name-->
                <div class="form-group">
                    <input type="text" class="form-control" name="last_name" placeholder="Name" required="true">
                </div>
                <!--email-->
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required="true"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                </div>
                <!--password-->
                <div class="form-group">
                    <input type="password" class="form-control" name="password"
                        placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}">
                </div>
                <!--Sign up botton-->
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Sign Up">
                </div>
            </form>
            <div class="ui message">
                Already have account? <a href="index.php">Log in</a>
            </div>
        </div>
    </div>


</body>

</html>