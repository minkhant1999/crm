<div class="ui basic modal">
    <form class="ui form" method="post" action="">
        <div class="field">
            <h2><label>Name</label></h2>
            <input type="text" name="name">
        </div>
        <div class="field">
            <h2><label>Organization</label></h2>
            <select name="organization_id">
                <?php
                while ($row = mysqli_fetch_array($result2)) :; ?> <option value="<?php echo $row[0]; ?>">
                    <?php echo $row[1]; ?></option>

                <?php endwhile; ?>
            </select>

        </div>
        <div class="field">
            <h2><label>Label</label></h2>
            <select name="organization_id">
                <?php
                while ($row = mysqli_fetch_array($result2)) :; ?> <option value="<?php echo $row[0]; ?>">
                    <?php echo $row[1]; ?></option>

                <?php endwhile; ?>
            </select>

        </div>
        <div class="field">
            <h2><label>Phone</label></h2>
            <input type="text" name="unit">
        </div>
        <div class="field">
            <h2><label>Email</label></h2>
            <input type="text" name="unit_price">
            <input type="text" name="currency" placeholder="$">
        </div>
        <div class="field">
            <h2><label>Owner</label></h2>
            <input type="text" name="unit">
        </div>
        <!-- append custom field here -->
        <div class="field">
            <select name="visibility">
                <?php
                while ($row = mysqli_fetch_array($result3)) :; ?>
                <option value="<?php echo $row[0]; ?>">
                    <?php echo $row[1]; ?></option>

                <?php endwhile; ?>
            </select>
        </div>
        <button class="ui button" type="submit" name="save">SAVE</button>
    </form>

</div>