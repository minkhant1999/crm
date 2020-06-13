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
}
?>
<div class="ui basic modal">
    <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="field">
            <h2><label>Group name</label></h2>
            <input type="text" name="visibility_group_name" value="<?php echo $visibility_group_name ?>">
        </div>
        <div class="field">
            <h2><label>Parent group</label></h2>
            <select></select>
        </div>
        <!-- append custom field here -->
        <button class="ui button" type="submit" name="save">SAVE</button>
    </form>

</div>