<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" type="text/css" href="https://etherio.github.io/cdn/semantic/semantic.css" />
    <script src="https://etherio.github.io/cdn/jquery/jquery.min.js"></script>
    <script src="https://etherio.github.io/cdn/semantic/semantic.js" defer></script>
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
                    <h2>Add users</h2>
                </div>
                <form class="ui form">
                    <div class="field">
                        <label>Email</label>
                        <input name="empty" type="text">
                    </div>
                    <div class="field">
                        <label>First name</label>
                        <input name="empty" type="text">
                    </div>
                    <div class="field">
                        <label>Last name</label>
                        <input name="empty" type="text">
                    </div>
                    <div class="field">
                        <label>Visibility group</label>
                        <select class="ui dropdown" name="dropdown">
                            <option value="">Unassigned users</option>
                            <option value="male">Management</option>
                            <option value="female">Example</option>
                        </select>
                    </div>
                    <div class="ui submit button">Cancel</div>
                    <div class="ui submit icon button">Confirm and invite users</div>
                    <a class="ui submit">+Add one more user
                    </a>
                    <div class="ui error message"></div>
                </form>
            </div>

        </div>
</body>

</html>