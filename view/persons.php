<?php
include_once 'db.php';
$result = mysqli_query($con, "SELECT * FROM organization");
$result2 = mysqli_query($con, "SELECT * FROM label");
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
        <?php
        include("persons_modal.php");
        ?>
        <!-- add button grid -->
        <div class="ui grid">
            <div class="left floated five wide column">

                <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Person</button>
            </div>
            <!-- container -->
            <div class="right floated five wide column">

                <div class="item">
                    <label>4 persons</label>
                </div>
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
                <th class="two wide">Organization</th>
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
        <tbody>
            <tr>
                <td>
                    <div class="ui checkbox">
                        <input type="checkbox" name="example">
                        <label></label>
                    </div>
                </td>
                <td>
                    <p></p>
                    <!-- <button class="right attached ui button" onclick="clickOnPN('p')">Edit</button> -->
                </td>

                <td>
                    <!-- <span><button class="right attached ui button">Edit</button></span></td> -->
                <td>

                </td>

            </tr>

        </tbody>
    </table>
    </div>
    </div>
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