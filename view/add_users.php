<?php
require_once 'db.php';
$list = mysqli_query($con, "SELECT * FROM visibility_group");


// Define variables and initialize with empty values
$first_name = $last_name = $email = $visibility_group = "";
$first_name_err = $last_name_err = $email_err = $visibility_group_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate first name
    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = "Please enter a first name.";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // Validate last name
    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter a last name.";
    } else {
        $last_name = trim($_POST["last_name"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE email = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate password
    if (empty(trim($_POST["visibility_group"]))) {
        $visibility_group_err = "Please select a visibility group.";
    } else {
        $visibility_group = trim($_POST["visibility_group"]);

        // Check input errors before inserting in database
        if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($visibility_group_err)) {

            // Prepare an insert statement
            $sql = "INSERT INTO user (first_name,last_name,email,visibility_group) VALUES (?, ?, ?, ?)";

            if ($stmt = mysqli_prepare($con, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $param_first_name, $param_last_name, $param_email, $param_visibility_group);

                // Set parameters
                $param_first_name = $first_name;
                $param_last_name = $last_name;
                $param_email = $email;
                $param_visibility_group = $visibility_group;

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header("location: users.php");
                } else {
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

        // Close connection
        mysqli_close($con);
    }
}
?>
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

        <?php include "menu.php"; ?>
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
                <form class="ui form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="field">
                        <label>Email</label>
                        <input name="email" type="email" value="<?php echo $email; ?>">
                    </div>
                    <div class="field">
                        <label>First name</label>
                        <input name="first_name" type="text" value="<?php echo $first_name; ?>">
                    </div>
                    <div class="field">
                        <label>Last name</label>
                        <input name="last_name" type="text" value="<?php echo $last_name; ?>">
                    </div>
                    <div class="field">
                        <label>Visibility group</label>
                        <select type="select" name="visibility_group" value="<?php echo $visibility_group; ?>">
                            <?php
                            while ($row = mysqli_fetch_array($list)) :; ?>
                            <option value="<?php echo $row[0]; ?>">
                                <?php echo $row[1]; ?></option>

                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="ui submit button">Cancel</div>
                    <input type="submit" class="ui submit icon button" value="Confirm and invite users">
                    <div class="ui error message"></div>
                </form>
            </div>

        </div>
</body>

</html>