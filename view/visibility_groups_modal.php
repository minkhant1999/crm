<?php
require_once "db.php";

$visibility_group_name = $parent_group = "";
$visibility_group_name_err = $parent_group_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["visibility_group_name"]))) {
        $visibility_group_name_err = "Enter group name";
    } else {
        $visibility_group_name = trim($_POST["visibility_group_name"]);
    }

    if (empty(trim($_POST["parent_group"]))) {
        $parent_group_err = "Choose parent group";
    } else {
        $parent_group = trim($_POST["parent_group"]);
    }

    // Check input errors before inserting in database
    if (empty($visibility_group_name_err) && empty($parent_group_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO visibility_group (visibility_group_name,parent_group) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_group_name, $param_parent_group);

            // Set parameters
            $param_group_name = $visibility_group_name;
            $param_parent_group = $parent_group;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location:visibility-groups.php");
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
?>
<div class="ui basic modal">
    <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="field">
            <h2><label>Group name</label></h2>
            <input type="text" name="visibility_group_name" value="<?php echo $visibility_group_name ?>">
        </div>
        <div class="field">
            <h2><label>Parent</label></h2>
            <input type="text" name="parent_group" value="<?php echo $parent_group ?>">
        </div>
        <!-- <div class="field">
            <h2><label>Parent group</label></h2>
            <select name="parent_group" value="<">
                <option>
                    None
                </option>
            </select>
        </div> -->
        <!-- append custom field here -->
        <button class="ui button" type="submit" name="save">SAVE</button>
    </form>

</div>