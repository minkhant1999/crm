<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" type="text/css" href="https://etherio.github.io/cdn/semantic/semantic.css" />
    <script src="https://etherio.github.io/cdn/jquery/jquery.min.js"></script>
    <script src="https://etherio.github.io/cdn/semantic/semantic.js" defer></script>
    <style type="text/css">
    body {
        background-color: #DADADA;
    }

    body>.grid {
        height: 100%;
    }

    .image {
        margin-top: -100px;
    }

    .column {
        max-width: 450px;
    }
    </style>
    <!-- <script>
    $(document)
        .ready(function() {
            $('.ui.form')
                .form({
                    fields: {
                        email: {
                            identifier: 'email',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Please enter your e-mail'
                                },
                                {
                                    type: 'email',
                                    prompt: 'Please enter a valid e-mail'
                                }
                            ]
                        },
                        password: {
                            identifier: 'password',
                            rules: [{
                                    type: 'empty',
                                    prompt: 'Please enter your password'
                                },
                                {
                                    type: 'length[6]',
                                    prompt: 'Your password must be at least 6 characters'
                                }
                            ]
                        }
                    }
                });
        });
    </script> -->
</head>

<body>
    <?php
    include "menu1.php";
    ?>
    <div class="ui divider"></div>

    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <h2 class="ui teal image header">
                <img src="assets/images/logo.png" class="image">
                <div class="content">
                    Log-in to your account
                </div>
            </h2>
            <form class="ui large form" method="POST" action="login_submit.php">
                <div class="ui stacked segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="text" name="email" placeholder="E-mail address">
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="ui fluid large teal submit button">Login</div>
                </div>

                <div class="ui error message"></div>

            </form>

            <div class="ui message">
                New to us? <a href="signup.php">Sign Up</a>
            </div>
        </div>
    </div>


</body>

</html>