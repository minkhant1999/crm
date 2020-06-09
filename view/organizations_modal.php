<div class="ui basic modal">
    <form class="ui form" method="post" action="add_organizations.php">
        <div class="field">
            <h2><label>Name</label></h2>
            <input type="text" name="organization_name">
        </div>
        <div class="field">
            <h2><label>Label</label></h2>
            <select name="label_id">
                <?php
                while ($row = mysqli_fetch_array($result)) :; ?> <option value="<?php echo $row[0]; ?>">
                    <?php echo $row[1]; ?></option>

                <?php endwhile; ?>
            </select>

        </div>
        <div class="field">
            <h2><label>Owner</label></h2>
            <input type="text" name="owner_id">
        </div>
        <div class="field">
            <h2><label>Address</label></h2>
            <input type="text" name="address">
        </div>
        <div class="field">
            <h2><label>Visible to</label></h2>
            <select name="visibility_group_id">
                <?php
                while ($row = mysqli_fetch_array($result2)) :; ?>
                <option value="<?php echo $row[0]; ?>">
                    <?php echo $row[1]; ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <!-- append custom field here -->

        <button class="ui button" type="submit" name="save">SAVE</button>
    </form>

</div>