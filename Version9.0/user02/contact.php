<?php 
session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<html lang="en">
<!--Version 7.0 
	Name: Seth Bercich
	Date Completed:
    -->

<head>
    <title>Vibing Contact Information</title>
    <link rel='icon' type='image/ico' href='images/favicon.ico'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='CSS/user02CSS.css'>
    <style>
        body {
            background-image: url(images/contactBg.jpg);
        }

        h1 {
            color: black;
        }

        h2{
            background-color:rgba(50,50,50, 0.5);
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 30px;
        }
        
        .colum {
            border: 10px solid white;
            border-left: 5px solid white;
            border-right: 5px solid white;
            height: 250px;
            margin: 0px;
            border-radius: 15px;
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

    <h1>Contact Information</h1>
    <div class='bodyStuff'>
        <h2>These are the ways you can get in contact with us. We will be sure to get back to you in 1-2 business days.</h2>
        <table class='contact'>
            <thead>
                <tr>
                    <td class='tw'><span class='fa fa-twitter-square pull-left'></span>Twitter</td>
                    <td class='fb'><span class='fa fa-facebook-square pull-left'></span>Facebook</td>
                    <td class='yt'><span class='fa fa-youtube-square pull-left'></span>Youtube</td>
                    <td class='em'><span class='fa fa-envelope pull-left'></span>Email</td>
                </tr>
            </thead>

            <div style='font-size:"1.5em";'>
                <tr>
                    <td class='tw'>@ItsAwesomeToVibe</td>
                    <td class='fb'>VibingIsAwesome</td>
                    <td class='yt'>ItsAwesomeToVibe</td>
                    <td class='em'>vibing@vibe.org</td>
                </tr>
                <tr>
                    <td class='tw'><a href='https://www.twitter.com' target='_blank'>Twitter Link</a></td>
                    <td class='fb'><a href='https://www.facebook.com' target='_blank'>Facebook Link</a></td>
                    <td class='yt'><a href='https://www.youtube.com' target='_blank'>Youtube Link</a></td>
                    <td class='em'><a href='mailto:vibing@vibe.org' target='_blank'>Send Email</a></td>
                </tr>
            </div>
        </table>
    </div>

    <div id='footer' class='pull-down'>
        <p>Made by <a href='https://www.google.com/' target="_blank">Seth Bercich</a> in Web Development</p>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='JS/user02Java.js'></script>
    <script>$('#contact').addClass('active')</script>
</body>

</html>
