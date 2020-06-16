<?php
require_once "db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visibility groups</title>
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
    <? include "menu.php"; ?>
    <div class="ui divider">
        <?php include("visibility_groups_modal.php"); ?>


        <?php include "visibility_groups_modal.php"; ?>

        <div class="ui container segment very padded raised ">
            <h2 class="ui header">Manage Users</h2>
            <div class="ui top attached tabular menu">
                <a href="users.php" class="item" data-tab="first">Users</a>
                <a href="permissions.php" class="item" data-tab="second">Permission sets</a>
                <a href="visibility-groups.php" class="item active" data-tab="third">Visibility groups</a>
                <a href="teams.php" class="item" data-tab="third">Teams</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="third">
                <div class="column">
                    <div class="ui three column grid">
                        <div class="first column">
                            <label for="first">Groups</label>
                            <div class="ui divider"></div>
                            <a href="" class="item">Default group</a>

                            <div>
                                <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Add group
                                    or
                                    sub-group</button>
                            </div>
                        </div>
                        <div class="second column">
                            <label for="second">Users</label>
                            <div class="ui divider"></div>
                        </div>
                        <div class="third column">
                            <label for="third">Who can see items created by users in this group?</label>
                            <div class="ui divider"></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
</body>

</html>