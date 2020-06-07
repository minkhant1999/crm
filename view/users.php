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
                <a class="item active" data-tab="first">Users</a>
                <a class="item" data-tab="second">Permission sets</a>
                <a class="item" data-tab="third">Visibility groups</a>
                <a class="item" data-tab="third">Teams</a>
            </div>
            <div class="ui bottom attached tab segment active" data-tab="first">
                <div class="ui tag">
                    <button class="ui button basic active">Activated</button>
                    <button class="ui button basic">Deactivated</button>
                    <button class="ui button primary right floated">Add users</button>
                </div>
                <div class="ui table">
                    <table class="ui very basic collapsing celled table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Visibility group</th>
                                <th>Permission set</th>
                                <th>Last login</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h4 class="ui image header">
                                        <img src="https://semantic-ui.com/images/avatar2/small/lena.png"
                                            class="ui mini rounded image">
                                        <div class="content">
                                            Lena
                                            <div class="sub header">users@example.com
                                            </div>
                                        </div>
                                    </h4>
                                </td>
                                <td>
                                    Management
                                </td>
                                <td>Admin Users</td>
                                <td>January 1 1970 00:00:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
</body>

</html>