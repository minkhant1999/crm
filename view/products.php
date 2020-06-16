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
<style>
body {
    padding: 1em;
}

.ui.menu {
    margin: 3em 0em;
}

.ui.menu:last-child {
    margin-bottom: 110px;
}
</style>

<body>
    <?php
    include("menu.php");
    ?>
    <div class="ui divider"></div>
    <!-- Modal -->
    <?php
    include("product_modal.php");
    ?>
    <div class="ui two column grid" style="height: 80px;">
        <div class="ui column">
            <p><button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Product</button></p>
        </div>
        <div class="column">
            <div class="ui three column grid">
                <div class="first column">
                    <label>4 products</label>
                </div>
                <div class="second column">
                    <div class="ui menu">
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
                    </div>
                </div>
                <div class="third column">

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

    </div>
    <div class="ui divider"></div>

    <!-- retrieve data with table from product table -->
    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>

    <table class="ui compact celled table">
        <thead>
            <tr>
                <!-- checkbox column -->
                <th class="left aligned" style="height:50px;">
                    <div class="ui checkbox">
                        <input type="checkbox" name="example">
                        <label></label>
                    </div>
                </th>
                <th class="left aligned" style="height:50px;">Name</th>
                <th class=" left aligned" style="height:50px;">Product code</th>
                <th class="one wide right aligned">
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