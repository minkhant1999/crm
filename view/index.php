<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/reset.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/site.css">

    <link rel="stylesheet" type="text/css" href="semantic/dist/components/container.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/grid.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/header.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/image.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/menu.css">

    <link rel="stylesheet" type="text/css" href="semantic/dist/components/divider.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/dropdown.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/segment.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/button.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/list.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/icon.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/sidebar.css">
    <link rel="stylesheet" type="text/css" href="semantic/dist/components/transition.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<script>
$('.ui.basic.button')
    .ui.modal('show');
</script>

<body>
    <div class="ui attached stackable menu">
        <div class="ui container"><a class="item"><i class="home icon"></i>Home </a><a class="item"><i
                    class="grid layout icon"></i>Browse </a><a class="item"><i class="mail icon"></i>Messages </a>
            <div class="ui simple dropdown item">More <i class="dropdown icon"></i>
                <div class="menu"><a class="item"><i class="edit icon"></i>Edit Profile</a><a class="item"><i
                            class="globe icon"></i>Choose Language</a><a class="item"><i
                            class="settings icon"></i>Account Settings</a></div>
            </div>
            <div class="right item">
                <div class="ui input"><input type="text" placeholder="Search..."></div>
            </div>
        </div>
    </div>
    <button type="button" class="fa fa-plus" data-toggle="modal" data-target="#myModal">Product</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</body>


</html>