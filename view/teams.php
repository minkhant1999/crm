<?php
require_once "db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams</title>
    <link rel="stylesheet" type="text/css" href="https://etherio.github.io/cdn/semantic/semantic.css" />
    <script src="https://etherio.github.io/cdn/jquery/jquery.min.js"></script>
    <script src="https://etherio.github.io/cdn/semantic/semantic.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        <?php include("teams_modal.php"); ?>


        <?php include "menu.php"; ?>
        <div class="ui container segment very padded raised ">
            <h2 class="ui header">Manage Users</h2>
            <div class="ui top attached tabular menu">
                <a href="users.php" class="item" data-tab="first">Users</a>
                <a href="permissions.php" class="item" data-tab="second">Permission sets</a>
                <a href="visibility-groups.php" class="item" data-tab="third">Visibility groups</a>
                <a href="teams.php" class="item active" data-tab="third">Teams</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="third">
                <div class="column">
                    <div class="ui one column grid">
                        <div class="column">
                            <label for="first">Teams</label>
                            <div>
                                <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">+Add
                                    team</button>
                            </div>
                            <div class="ui divider"></div>
                            <div class="ui container">
                                <!-- fetch results from database -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</body>

</html>