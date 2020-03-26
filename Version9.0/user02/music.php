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
    <title>Vibing Music</title>
    <link rel='icon' type='image/ico' href='images/favicon.ico'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href='CSS/user02CSS.css'>
    
    <style>
        body {
            background-image: url(images/musicBg.jpg);
            background-size: cover;
        }

        .para {
            padding: 10px;
            font-weight: bold;
            background-color: dodgerblue;
            border-radius: 10px;
            font-family: fantasy;
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

    <h1 style='color:#dddddd; background-color:#555555; margin-top:0px; padding-top: 15px;'>Music you can Vibe to</h1>
    <div class='bodyStuff'>
        <p class='para'>Here, you can find music that interestes you and helps you start to vibe. This could be calming or upbeat, depending on your preference. Have fun listening!</p>
        <div class='row'>
            <div class='col-md-6'>
                <h2 class='center para'>Chill Music</h2>
                <table class='music'>
                    <thead>
                        <tr>
                            <th>Song Name</th>
                            <th>Artist</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Sunkissed</td>
                        <td>khai dreams</td>
                        <td><iframe class='emb' src="https://open.spotify.com/embed/track/4efZXKOFm1rk22FDjScLbE" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>
                    </tr>

                    <tr>
                        <td>Lately</td>
                        <td>Forrest.</td>
                        <td><iframe class='emb' src="https://open.spotify.com/embed/track/5awvelCGpDQHwgZem0ira9" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>

                    <tr>
                        <td>24/7/365</td>
                        <td>Surfaces</td>
                        <td><iframe class='emb' src="https://open.spotify.com/embed/track/0ClnfM4PI0wjlCVTJc9lP7" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media" mouseenter='bottom();'></iframe></td>
                </table>
            </div>


            <div class='col-md-6'>
                <h2 class='center para'>Lofi Music</h2>
                <table class='music'>
                    <thead>
                        <tr>
                            <th>Song Name</th>
                            <th>Artist</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Sleepy Afternoon</td>
                        <td>Jordy Chandra</td>
                        <td><iframe class='emb' src="https://open.spotify.com/embed/track/3GQ10xpNuiMZsax5ZN9Rxn" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>
                    </tr>

                    <tr>
                        <td>With You, What to Do</td>
                        <td>nord.</td>
                        <td><iframe class='emb' src="https://open.spotify.com/embed/track/6TTucqQjvPJHSS9fP87jIl" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>

                    <tr>
                        <td>Comforting You</td>
                        <td>WYS</td>
                        <td><iframe class='emb' src="https://open.spotify.com/embed/track/4MuNaeIxOBvfJqmIUoX5aU" width="100%" height="80" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe></td>
                </table>
            </div>
        </div>
    </div>

    <div id='footer' class='pull-down'>
        <p>Made by <a href='https://www.google.com/' target="_blank">Seth Bercich</a> in Web Development</p>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='JS/user02Java.js'></script>
    <script>$('#music').addClass('active')</script>
</body>

</html>
