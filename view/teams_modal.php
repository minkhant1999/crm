<?php
require_once "db.php";

$team_name = $team_manager = $team_description = $team_members = "";
$team_name_err = $team_manager_err = $team_description_err = $team_members_err = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $post = array_replace([
//         'team_name' => null,
//         'team_manager' => null,
//         'team_description' => null,
//         'team_members' => null,
//         'team_owner' => 'me',
//     ], $_POST);

//     extract($post);
//     unset($post);

if (empty(trim($team_name))) {
    $team_name_err = "Enter team name";
} else {
    $team_name = trim($team_name);
}

if (empty(trim($team_manager))) {
    $team_manager_err = "Enter manager name";
} else {
    $team_manager = trim($team_manager);
}

if (empty(trim($team_description))) {
    $team_description_err = "Choose parent group";
} else {
    $team_description = trim($team_description);
}

// Check input errors before inserting in database
if (empty($team_name_err) && empty($team_manager_err) && empty($team_description_err)) {

    // Prepare an insert statement
    $sql = "INSERT INTO team (team_name,team_manager,team_description) VALUES (?,?,?)";

    if ($stmt = mysqli_prepare($con, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "sis", $param_group_name, $param_parent_group, $param_description);

        // Set parameters
        $param_team_name = $team_name;
        $param_team_manager = $team_manager;
        $param_description = $team_description;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect to login page
            header("location:teams.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}
// echo '<pre>Your :', json_encode(get_defined_vars(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), '</pre>';

// Close connection
mysqli_close($con);

?>
<div class="ui basic modal">
    <form class="ui form" method="post" action="<?php echo _($_SERVER["PHP_SELF"]); ?>">
        <div class="field">
            <h2><label>Team name</label></h2>
            <input type="text" name="team_name" value="<?php echo $team_name ?>">
        </div>
        <div class="field">
            <h2><label>Team manager</label></h2>
            <select name="team_manager">
                <?php
                $team_query = "SELECT first_name,last_name FROM user";
                $result = mysqli_query($con, $team_query);
                /* associative array */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                echo "<option value='" . $row["first_name"] . "'>" . $row["last_name"] . "</option>";
                ?>
            </select>
        </div>
        <div class="field">
            <h2><label>Team description</label></h2>
            <input type="text" name="team_description" value="<?= $team_description ?>">
        </div>
        <div class="field">
            <h2><label>Team members</label></h2>
            <input type="radioc" name="team_members" value="<?= $team_members ?>">
        </div>
        <!-- append custom field here -->
        <button class="ui button" type="submit" name="save">SAVE</button>
    </form>

</div>