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
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
            </script>

            <script type="text/javascript">
            function ShowHideDiv() {
                var category_name = document.getElementById("category_name");
                var dvnewcategory = document.getElementById("dvnewcategory");
                dvnewcategory.style.display = ddlPassport.value == "other" ? "block" : "none";
            }

            $(function() {
                $("#category_name").change(function() {
                    if ($(this).val() == "other") {
                        $("#dvnewcategory").show();
                    } else {
                        $("#dvnewcategory").hide();
                    }
                });
            });
            </script>

            <h2><label>Category</label></h2>
            <select name="category_name" id="category_name" onchange="ShowHideDiv()">

                <?php
                /* while ($row = mysqli_fetch_array($result2)){
                
                echo "<option value='" . $row['category_id'] ."' >" . $row['category_name'] ."</option>";
               }

               ?>
                ;*/

                while ($row = mysqli_fetch_array($result2)) {
                echo "<option value=\"{$row['category_id']}\"> {$row['category_name']}</option>";
                // echo "<button type="edit">"edit"</button>";
                $row++;
                }
                ?>
                <option value="other">other</option>
            </select>
            <div id="dvnewcategory" style="display: none">
                <input type="text" name="new_category" id="new_category">
                <br>
            </div>


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
            <select name="owner_visibility_name">
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