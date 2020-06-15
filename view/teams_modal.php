<?php
require_once "db.php";

$team_name = $team_manager = $team_description = "";
$team_name_err = $team_manager_err = $team_description_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty(trim($_POST["team_name"]))) {
        $team_name_err = "Enter team name";
    } else {
        $team_name = trim($_POST["team_name"]);
    }

    if (empty(trim($_POST["team_manager"]))) {
        $team_manager_err = "Enter manager name";
    } else {
        $team_manager = trim($_POST["team_manager"]);
    }

    if (empty(trim($_POST["team_description"]))) {
        $team_description_err = "Choose parent group";
    } else {
        $team_description = trim($_POST["team_description"]);
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

    // Close connection
    mysqli_close($con);
}
?>
<div class="ui basic modal">
    <form class="ui form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="field">
            <h2><label>Team name</label></h2>
            <input type="text" name="team_name" value="<?php echo $team_name ?>">
        </div>
        <div class="field">
            <h2><label>Team manager</label></h2>
            <select name="team_manager" class="ui dropdown" id="select">
                <option value="">--- Select ---</option>
                <?  
                mysql_connect ("localhost","root","");  
                mysql_select_db ("achievement crm");  
                $select="achievement crm";  
                if (isset ($select)&&$select!=""){  
                $select=$_POST ['team_manager'];  
            }  
            ?>
                <?  
                $list=mysql_query("select * from user order by id asc");  
            while($row_list=mysql_fetch_assoc($list)){  
                ?>
                <option value="<? echo $row_list['id']; ?>" <? if($row_list['id']==$select){ echo "selected" ; } ?>>
                    <?echo $row_list['first_name'];?>
                </option>
                <?  
                }  
                ?>
            </select>
        </div>
        <div class="field">
            <h2><label>Team description</label></h2>
            <input type="text" name="team_description" value="<?php echo $team_description ?>">
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