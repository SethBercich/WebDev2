<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<html lang="en">
<!--Version 9.0 
	Name: Seth Bercich
	Date Completed:
    -->

<head>
    <title>Vibing FAQ</title>
    <link rel='icon' type='image/ico' href='images/favicon.ico'>
    <link rel='stylesheet' href='CSS/user02CSS.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/user02CSS.css">

    <style>
        body {
            background-image: url(images/faqBg.jpg);
        }

        .col-md-12 {
            background-color: rgba(0, 0, 120, 0.2);
        }

    </style>
</head>

<body>
    <div id='menu' class='menu'>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <button class="menuButton">
                <span class="fa fa-list"></span>
            </button>

            <div class="menuCollapse" id="inputMenu">
            </div>
            
            <div class="navbar-nav ml-auto">
                <p id="identity" style="margin-bottom: 0px; font-size: 0.9em;"><?php echo htmlspecialchars($_SESSION["name"]); ?> as <?php echo htmlspecialchars($_SESSION["personType"]); ?></p>
            </div>
        </nav>
    </div>

    <h1>Frequently asked Questions</h1>
    <div class='bodyStuff'>
        <div class='row center'>
            <div class='col-md-12'>
                <dl>
                    <dt>What is the definition of Vibe?</dt>
                    <dd>
                        <p>The mood or character of a place, situation, or piece of music.<br>
                            This also applies to people.</p>
                    </dd>

                    <dt>How do I know if I have a good vibe?</dt>
                    <dd>
                        <p>If you enjoy life and have lots of fun, you have a good vibe.</p>
                    </dd>

                    <dt>What if I can't vibe?</dt>
                    <dd>
                        <p>Everybody can vibe. You just need to find the right place or thing that helps you vibe.</p>
                    </dd>
                </dl>
            </div>
        </div>
    </div>

    <div id='footer' class='pull-down'>
        <p>Made by <a href='https://www.google.com/' target="_blank">Seth Bercich</a> in Web Development</p>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='JS/user02Java.js'></script>
    <script>$('#faq').addClass('active')</script>
</body>

</html>
