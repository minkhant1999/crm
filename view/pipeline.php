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
    <?php
    include "header.php";
    ?>
    <div class="ui container">
        <!-- buttons -->
        <button class="ui basic button">Pipeline</button>
        <button class="ui basic button">Lists</button>
        <button class="ui basic button">Forecast</button>
        <button class="ui basic button" onclick="$('.ui.basic.modal').modal('show')">Product</button>

        <table class="ui striped table">
            <thead>
                <tr>
                    <th>Lead In</th>
                    <th>Contact Mode</th>
                    <th>Demo Scheduled</th>
                    <th>Proposal Made</th>
                    <th>Negotiations Started</th>
                </tr>
            </thead>
            <tbody>
                <tr class="top aligned">
                    <td>John</td>
                    <td>Approved</td>
                    <td class="top aligned">
                        Notes<br>
                        1<br>
                        2<br>
                    </td>
                </tr>
                <tr>
                    <td>Jamie</td>
                    <td class="bottom aligned">Approved</td>
                    <td>
                        Notes<br>
                        1<br>
                        2<br>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>

</body>

</html>