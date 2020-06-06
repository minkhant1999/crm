<?php
include_once 'db.php';
$result = mysqli_query($con, "SELECT * FROM product");
$result2 = mysqli_query($con, "SELECT * FROM category");
$result3 = mysqli_query($con, "SELECT * FROM owner_visibility_group");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" type="text/css" href="./dist/semantic.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./dist/semantic.js" defer></script>
</head>


<body>
    <div class="ui fluid container">
        <?php
        include("header.php");
        ?>
        <!-- Modal -->
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
        <!-- add button grid -->
        <div class="ui grid">
            <div class="left floated five wide column">
                <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Product</button>
            </div>

            <!-- container -->
            <div class="right floated five wide column">
                <label>4 products</label>
                <!-- middle dropdown -->
                <div class="ui dropdown">
                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <div class="item">
                            <div class="item">
                                <div class="ui search">
                                    <div class="ui icon input">
                                        <input class="prompt" type="text" placeholder="Search owner or filter">
                                        <i class="search icon"></i>
                                    </div>
                                    <div class="results"></div>
                                </div>
                                <div class="ui container">
                                    <a class="item" data-tab="first"><i class="star icon"></i>Favourites</a>
                                    <a class="item" data-tab="second"><i class="user icon"></i>Owners</a>
                                    <a class="item" data-tab="third"><i class="filter icon"></i>Filters</a>
                                </div>
                                <div class="ui bottom attached tab segment" data-tab="first">
                                    First
                                </div>
                                <div class="ui bottom attached tab segment" data-tab="second">
                                    Second
                                </div>
                                <div class="ui bottom attached tab segment" data-tab="third">
                                    Third
                                </div>
                                <script>
                                $('.tab .item')
                                    .tab();
                                </script>
                            </div>
                        </div>
                        <div class="item">Choice 2</div>
                        <div class="item">
                            <button class="ui labeled icon button">
                                <i class="filter icon"></i>
                                Add new filter
                            </button>
                        </div>
                    </div>
                </div>

                <!-- right side setting -->
                <div class="ui compact menu">
                    <div class="ui simple dropdown item">
                        ...
                        <!-- <i class="setting icon"></i> -->
                        <div class="menu">
                            <!-- modal -->
                            <?php include "export_results_modal.php" ?>
                            <div class="item" onclick="$('.ui.result.modal').modal('show')">
                                Export filter results...
                            </div>
                            <div class=" item">Data import...</div>
                            <div class="item">Choice 3</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- retrieve data with table from product table -->
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>

    <table class="ui celled table">
        <thead>
            <tr>
                <!-- checkbox column -->
                <th class="one wide">
                    <div class="ui checkbox">
                        <input type="checkbox" name="example">
                        <label></label>
                    </div>
                </th>
                <th class="two wide">Name</th>
                <th class="two wide">Product code</th>
                <th class="right aligned">
                    <div class="ui compact menu">
                        <div class="ui simple dropdown item">
                            <i class="setting icon"></i>
                            <div class="menu">
                                <div class="ui left aligned container">

                                    <div class="ui search">
                                        <label>
                                            <h3><span>Choose columns</span></h3>
                                        </label>
                                        <div class="ui icon input">
                                            <input class="prompt" type="text" placeholder="Search owner or filter">
                                            <i class="search icon"></i>
                                        </div>
                                        <div class="results"></div>
                                    </div>
                                    <div class="ui justified container">
                                        <label>Visible</label>
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="fruit" checked="" tabindex="0" class="hidden">
                                                <label>Name</label>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="fruit" checked="" tabindex="0" class="hidden">
                                                <label>Product code</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ui justified container">
                                        <label>Not visible</label>
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="fruit" checked="" tabindex="0" class="hidden">
                                                <label>Tax</label>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="fruit" checked="" tabindex="0" class="hidden">
                                                <label>Unit</label>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="ui radio checkbox">
                                                <input type="radio" name="fruit" checked="" tabindex="0" class="hidden">
                                                <label>Category</label>
                                            </div>
                                        </div>
                                        <div class="ui justified container">
                                            <div class="field">
                                                <button class="ui labeled icon button">
                                                    Default
                                                </button>
                                                <button class="ui labeled icon button">
                                                    Cancel
                                                </button>
                                                <button class="ui labeled icon button" style="color:green;">
                                                    Save
                                                </button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                </th>
            </tr>
        </thead>
        <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
        <tbody>
            <tr>
                <td>
                    <div class="ui checkbox">
                        <input type="checkbox" name="example">
                        <label></label>
                    </div>
                </td>
                <td>
                    <p><?= $row["product_name"]; ?></p>
                    <!-- <button class="right attached ui button" onclick="clickOnPN('p')">Edit</button> -->
                </td>

                <td><?= $row["product_code"]; ?>
                    <!-- <span><button class="right attached ui button">Edit</button></span></td> -->
                <td>

                </td>

            </tr>

        </tbody>
        <?php
                $i++;
            }
            ?>
    </table>
    </div>
    <?php
    } else {
        echo "No product here";
    }
    ?>
    <script>
    function clickOnPN(name) {
        $('p').empty()
    }
    </script>


    <!-- <div class="ui cards">

        <template>
            <div class="card">
                <div class="content">
                    <div class="header"></div>
                    <div class="meta"></div>
                    <div class="description"></div>
                </div>
            </div>
        </template>

        <script src="./products.js"></script>
    </div> -->

</body>

</html>