<?php
require_once "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" type="text/css" href="https://etherio.github.io/cdn/semantic/semantic.css" />
    <script src="https://etherio.github.io/cdn/jquery/jquery.min.js"></script>
    <script src="https://etherio.github.io/cdn/semantic/semantic.js" defer></script>
    <style>
    .ui.table th:nth-child(1),
    .ui.table td:nth-child(1) {
        width: 40%;
    }

    .ui.table th:nth-child(2),
    .ui.table td:nth-child(2),
    .ui.table th:nth-child(3),
    .ui.table td:nth-child(3) {
        width: 20%;
    }

    /* .ui.table th:nth-child(4),
    .ui.table td:nth-child(4) {
        width: 30%;
    } */

    .ui.tag button.basic {
        padding: 5px 10px;
    }
    </style>
</head>

<body>
    <div class="ui fluid container">

        <?php include "header.php"; ?>
        <div class="ui container segment very padded raised ">
            <h2 class="ui header">Manage Users</h2>
            <div class="ui top attached tabular menu">
                <a href="users.php" class="item active" data-tab="first">Users</a>
                <a href="permissions.php" class="item" data-tab="second">Permission sets</a>
                <a href="visibility-groups.php" class="item" data-tab="third">Visibility groups</a>
                <a href="teams.php" class="item" data-tab="third">Teams</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">
                <div class="ui tag">
                    <button class="ui button basic active">Activated</button>
                    <button class="ui button basic">Deactivated</button>
                    <a href="add_users.php">
                        <button class="ui button primary right floated">Add users</button>
                    </a>
                </div>
                <div class="ui table">

                    <table class="ui very basic collapsing celled table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Visibility group</th>
                                <th>Permission set</th>
                                <th>Last login</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($con, "SELECT * FROM user");
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                    <h4 class="ui image header">
                                        <img src="https://semantic-ui.com/images/avatar2/small/lena.png"
                                            class="ui mini rounded image">
                                        <div class="content">
                                            <?= $row['first_name'] ?>
                                            <?= $row['last_name'] ?>
                                            <div class="sub header">
                                                <?= $row['email'] ?>
                                            </div>
                                        </div>
                                    </h4>
                                </td>
                                <td> <?= $row['visibility_group'] ?></td>
                                <td><?= $row['permission_set'] ?></td>
                                <td><?= $row['last_login'] ?></td>
                                <td><a href="">Statistic</a>
                            </tr>
                        </tbody>
                        <?php
                            }
                    ?>
                    </table>

                </div>
            </div>
        </div>
</body>

</html>