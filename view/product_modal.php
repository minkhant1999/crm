<div class="ui basic modal">
    <form class="ui form" method="post" action="add_product.php">
        <div class="field">
            <h2><label>Product name</label></h2>
            <input type="text" name="product_name">
        </div>
        <div class="field">
            <h2><label>Product code</label></h2>
            <input type="text" name="product_code">
        </div>
        <div class="field">
            <h2><label>Category</label></h2>
            <select name="category_name">
                <?php
                while ($row = mysqli_fetch_array($result2)) :; ?> <option value="<?php echo $row[0]; ?>">
                    <?php echo $row[1]; ?></option>

                <?php endwhile; ?>
            </select>

        </div>
        <div class="field">
            <h2><label>Unit</label></h2>
            <input type="text" name="unit">
        </div>
        <div class="field">
            <h2><label>Unit price</label></h2>
            <input type="text" name="unit_price">
            <input type="text" name="currency" placeholder="$">
        </div>
        <!-- append custom field here -->
        <div class="field">
            <select name="visibility_group_id">
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